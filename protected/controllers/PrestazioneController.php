<?php

class PrestazioneController extends Controller
{
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
			'postOnly + delete', // we only allow deletion via POST request
		);
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','AggiornaPrezzo','deleteFondo','addFondo','nuovoFondo','grigliaFondi'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionGrigliaFondi(){
        if(!$this->isNullOrEmpty($_POST["id_prestazione"]))
        {
            $modelBase = $this->loadModel($_POST["id_prestazione"]);
            $model=new PrestazioneAllegati($modelBase);
            $this->renderPartial('_fondi',array(
                'model'=>$model,
            ), false,true);
        }
    }

    public function actionNuovoFondo ( )
    {
        if(!$this->isNullOrEmpty($_POST["id_prestazione"]))
        {
            $modelBase = $this->loadModel($_POST["id_prestazione"]);
            $model=new PrestazioneAllegati($modelBase);
            $this->renderPartial('_nuovoFondo',array(
                'model'=>$model,
            ), false,true);
        }
    }
    //associo un nuovo fondo alla prestazione
    public function actionAddFondo ()
    {
        if (isset($_POST["PrestazioneAllegati"]["id_prestazione"]) &&
            isset($_POST["FondoPrestazione"]["id_fondo"]) &&
            isset($_POST["PrestazioneAllegati"]["prezzo"]) )
        {
            $fondoPrestazione = new FondoPrestazione();
            $fondoPrestazione->id_fondo = $_POST["FondoPrestazione"]["id_fondo"];
            $fondoPrestazione->id_prestazione = $_POST["PrestazioneAllegati"]["id_prestazione"];
            $fondoPrestazione->prezzo = $_POST["PrestazioneAllegati"]["prezzo"];

            if ( !$fondoPrestazione->save())
               echo ("Impossibile salvare il fondo-prestazione");
            else
                echo "true";
        }
    }

    //elimina associazione fondo-prestazione corrente
    public function actionDeleteFondo($id){
    //    $id = $_POST["id"];
        if (!$this->isNullOrEmpty($id))
        {
            $fondoPrestazione = FondoPrestazione::model()->findByPk($id);
            $fondoPrestazione->delete();
            echo "1";
        }

    }

    public function actionAggiornaPrezzo(){
        if (! $this->isNullOrEmpty($_POST["id_fondo_prestazione"]) && ! $this->isNullOrEmpty($_POST["prezzo"]))
        {
            $fondoPrestazione = FondoPrestazione::model()->findByPk($_POST["id_fondo_prestazione"]);
            if ($fondoPrestazione==null){
                throw new CHttpException(404,'Fondo Prestazione non trovato');
            }
            if( isset ( $fondoPrestazione ))
            {
                $fondoPrestazione->prezzo = $_POST["prezzo"];
                if($fondoPrestazione->save())
                    echo $fondoPrestazione->prezzo;
            }
        }
    }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Prestazione();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Prestazione']))
		{
			$model->attributes=$_POST['Prestazione'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_prestazione));
		}

		$this->render( 'create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $modelBase = $this->loadModel($id);
		$model=new PrestazioneAllegati($modelBase);

		// Uncomment the following line if AJAX validation is needed
	    $this->performAjaxValidation($model);

        //caso create
		if(isset($_POST['Prestazione']))
		{
			$model->attributes=$_POST['Prestazione'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_prestazione));
		}
        //caso update
        if (isset($_POST["PrestazioneAllegati"]))
        {
            $prestazione = Prestazione::model()->findByPk( $_POST['PrestazioneAllegati']["id_prestazione"]);
            $prestazione->attributes=$_POST['PrestazioneAllegati'];
            if($prestazione->save())
                $this->redirect(array('update','id'=>$model->id_prestazione));
        }
        if(isset($_POST['AllegatoDto']))
        {
            $allegato = new AllegatoPrestazione();
            $allegato->id_prestazione = $id;
            $allegato->nome =$_POST['AllegatoDto']["nome"];
            $allegato->url =$_POST['AllegatoDto']["url"] ;
            $allegato->estensione =  pathinfo($allegato->url, PATHINFO_EXTENSION) ;
            if(! $allegato->save())
                echo ("error");
            else{
                $modelBase = $this->loadModel($id);
                $model=new PrestazioneAllegati($modelBase);
            }
        }


		$this->render('update',array(
			'model'=>$model,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Prestazione');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prestazione('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prestazione']))
			$model->attributes=$_GET['Prestazione'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Prestazione the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Prestazione::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Prestazione $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prestazione-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
