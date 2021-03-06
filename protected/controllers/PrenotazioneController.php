<?php

class PrenotazioneController extends Controller
{

    public $breadcrumbsOptionsHomeLink ;
    public $searchModel;
    public $specializzazioni;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

    public function actionPrestazioniAssociate($idFondo){
        $res = new JsonResult();
        if(!$this->IsNullOrEmpty($idFondo))
        {

            $data=CHtml::listData($this->GetPrestazioniAssociate($idFondo),'id_prestazione', 'nomePrestazione');
            $options="";
            foreach($data as $value=>$name)
            {
                $options = $options . CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
            $res->success = true;
            $res->data = $options;
        }
        echo json_encode($res);
    }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','prestazioniAssociate','calendar','calendarEvents' ),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model =$this->loadModel($id);
        $paziente= Paziente::model()->findByPk($model->id_paziente);
		$this->render('view',array(
			'model'=>$model,
            'paziente'=> $paziente
		));
	}

    private function GetPrestazioniAssociate($idFondo){
        $criteria = new CDbCriteria();
        $criteria -> select = 't.*,p.nome as nomePrestazione,p.codice as codicePrestazione ';
        $criteria -> join = 'INNER JOIN gmc_prestazione p on p.id_prestazione = t.id_prestazione ';
        $criteria -> join .= 'INNER JOIN gmc_fondo f on f.id_fondo = t.id_fondo ';
        $criteria -> condition = 't.id_fondo= :id_fondo';
        $criteria -> params = array(':id_fondo' => $idFondo);
        return FondoPrestazione::model()->findAll($criteria);
    }

    public function actionCreate( )
    {
        $model =  isset($_SESSION["prenotazione"]) ? $_SESSION["prenotazione"] : new Prenotazione();
        $step = !isset($_GET["step"]) ? -1 : $_GET["step"] ;

        $prestazioni = null;

        $this->breadcrumbsOptionsHomeLink = false;
        $this->performAjaxValidation($model);
        $this->performAjaxValidation(new Paziente());
//
//        if ($step!=-1)
//        {
//            switch ($step)
//            {
//                case 1:
//                    unset($_SESSION['prenotazione']);
//                    break;
//                case 2:
//                    $model->id_prestazione=   null;
//                    $_SESSION["prenotazione"] = $model;
//                    $prestazioni = $this->GetPrestazioniAssociate($model->id_fondo);
//                    break;
//                case 3:
//                    //unset($_SESSION['paziente']);
//                    break;
//            }
//        }

            $step=1;
            if( isset($_POST["Prenotazione"]["id_fondo"]))
            {
                $model->id_fondo = $_POST["Prenotazione"]["id_fondo"];
                $prestazioni = $this->GetPrestazioniAssociate($model->id_fondo);
                $_SESSION["prenotazione"] = $model;
                $step = 2;
            }

            if( isset($_POST["Prenotazione"]["id_prestazione"]))
            {
                $model->id_prestazione = $_POST["Prenotazione"]["id_prestazione"];
                $_SESSION["prenotazione"] = $model;
                $step = 3;
            }

            if( isset($_POST["Paziente"]))
            {
                $_SESSION["paziente"] = $_POST["Paziente"];
                $step = 4;
            }

            if(isset($_POST["confirm"]))
            {
                $idPaziente=null;
                //cerco utente per cf
                $paziente = Paziente::model()->findByAttributes(  array('cf'=>$_SESSION["paziente"]["cf"] ));
                if (isset($paziente))
                {
                    $idPaziente = $paziente->id_paziente;
                }
                else{
                    $paziente = new Paziente();
                    $paziente->attributes = $_SESSION["paziente"];
                    if($paziente->Save())
                        $idPaziente = $paziente->id_paziente;
                    else
                        throw new CException("Impossibile salvare i dati del paziente");
                }

                $prenotazione = new Prenotazione();
                $prenotazione->id_fondo = $_SESSION["prenotazione"]["id_fondo"];
                $prenotazione->id_prestazione = $_SESSION["prenotazione"]["id_prestazione"];
                $prenotazione->id_paziente = $idPaziente;
                $dataCreazione =  new DateTime('now');
                $prenotazione->data_creazione = date( 'Y-m-d H:i:s', $dataCreazione->getTimestamp() ) ;
                $prenotazione->assegnata=0;

                if ($prenotazione->save())
                {

                    unset($_SESSION['prenotazione']);
                    unset($_SESSION['paziente']);
                }
                else {
                    throw new CException("Impossibile salvare la prenotazione");
                }
            }

        $this->layout="column1";
        $this->render('create',array(
            'model'=>$model,
            'step'=>$step,
            'prestazioni' =>$prestazioni,
            'fondi'=>Fondo::model()->findAll()
        ));
    }


    public function actionCalendar (){
        $p =   new Prenotazione("search" );
        $p->unsetAttributes();  // clear any default values
        if (isset($_GET["Prenotazione"])){
            $p->attributes = $_GET["Prenotazione"];
        }
        $this->searchModel = $p;
        $this->layout="searchCalendar";
        $this->render('calendar',array());
    }

    public function actionCalendarEvents($start = 0, $end = 0,  $cognome_paziente=""){

        $criteria = new CDbCriteria( );
        $criteria->addBetweenCondition('UNIX_TIMESTAMP(data_visita)', $start, $end);
        if($_GET["id_prestazione"]!="")
        {
            $criteria->addInCondition('id_prestazione',$_GET["id_prestazione"]);
        }
        if($cognome_paziente!="")
        {
            $criteria->with = array('idPaziente');
            $criteria->addCondition('idPaziente.cognome like "'.$cognome_paziente.'%"');
        }

        $p = Prenotazione::model()->findAll( $criteria );
//
//        $p = new Prenotazione("search" );
//        $p->unsetAttributes();  // clear any default values
//
//        if (isset($_GET["Prenotazione"])){
//            $p->attributes = $_GET["Prenotazione"];
//        }

        $prenotazioni = array();
        foreach($p as $prest)
            array_push($prenotazioni, new PrenotazioneDTO($prest));
        echo CJSON::encode($prenotazioni);

    }


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $paziente= Paziente::model()->findByPk($model->id_paziente);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prenotazione']))
		{
			$model->attributes=$_POST['Prenotazione'];
            if(isset ($model->data_visita))
                $model->data_visita = date( 'Y-m-d H:i:s', strtotime($model->data_visita) ) ;
            $model->id_user = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_prenotazione));
		}
        $prestazioni = $this->GetPrestazioniAssociate($model->id_fondo);

		$this->render('update',array(
			'model'=>$model,
            'paziente'=>$paziente,
            'prestazioni'=>$prestazioni,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

        $p = new Prenotazione("search");
        $p->unsetAttributes();  // clear any default values
        if (isset($_GET["Prenotazione"])){
            $p->attributes = $_GET["Prenotazione"];
        }
        $this->searchModel = $p;
        $this->layout="searchColumn";
        $this->render('index',array(
            'model'=>$p,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prenotazione('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prenotazione']))
			$model->attributes=$_GET['Prenotazione'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Prenotazione::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prenotazione-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
        if(isset($_POST['ajax']) && $_POST['ajax']==='paziente-form')
        {
            $paziente = new Paziente;
            $paziente->attributes = $_POST['Paziente'];
            echo CActiveForm::validate($paziente);
            Yii::app()->end();
        }
	}
}
