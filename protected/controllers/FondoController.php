<?php

class FondoController extends Controller
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
		);
	}

    public function actionPrestazioniNonAssociate(){
        $res = new JsonResult();
        if(!$this->IsNullOrEmpty($_POST["id_fondo"]))
        {
            $model = $this->loadModel($_POST["id_fondo"]);
            $data=CHtml::listData($model->prestazioniNonAssociate,'id_prestazione', 'nome');
            $options="";
            foreach($data as $value=>$name)
            {
                $options = $options. CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
            $res->success = true;
            $res->data = $options;
        }
        echo json_encode($res);
    }

    public function actionAssociaPrestazione(){
        $res = new JsonResult();
        if (isset($_POST["FondoPrestazione"]["id_prestazione"]) &&
            isset($_POST["Fondo"]["id_fondo"]) &&
            isset($_POST["FondoPrestazione"]["prezzo"]) )
        {
            $fondoPrestazione = new FondoPrestazione();
            $fondoPrestazione->id_fondo = $_POST["Fondo"]["id_fondo"];
            $fondoPrestazione->id_prestazione = $_POST["FondoPrestazione"]["id_prestazione"];
            $fondoPrestazione->prezzo = $_POST["FondoPrestazione"]["prezzo"];

            if ( !$fondoPrestazione->save())
            {
                $res->msg = "Impossibile salvare il fondo-prestazione";
                $res->success =false;
            }
            else
            {
                $res->success =true;
            }
            echo json_encode($res);
        }
    }

    public function actionDisassociaPrestazione($id){
        $res = new JsonResult();
        if (!$this->isNullOrEmpty($id))
        {
            $fondoPrestazione = FondoPrestazione::model()->findByPk($id);
            if( $fondoPrestazione->delete())
            {
                $res->success=true;
            }
            else
            {
                $res->success=false;
            }
            echo json_encode($res);
        }
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
				'actions'=>array('admin','delete','disassociaPrestazione','associaPrestazione','prestazioniNonAssociate'),
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
		$model=new Fondo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fondo']))
		{
			$model->attributes=$_POST['Fondo'];


            if (!$this->IsNullOrEmpty ($model->logo) )
            {
                $nomeFile = pathinfo($model->logo)['basename'];

                $model->logo=  file_get_contents(  $model->logo);

                unlink ($_SERVER['DOCUMENT_ROOT'] .   Yii::app()->baseUrl . '/php/fileUpload/files/'.$nomeFile);
                unlink ($_SERVER['DOCUMENT_ROOT'] .   Yii::app()->baseUrl . '/php/fileUpload/files/thumbnail/'.$nomeFile);
            }
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_fondo));
		}

		$this->render('create',array(
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
		$model=$this->loadModel($id);
        $logo = $model->logo;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fondo']))
		{
			$model->attributes=$_POST['Fondo'];

            if (!$this->IsNullOrEmpty($model->logo) )
            {
                $nomeFile = pathinfo($model->logo)['basename'];
                $model->logo=  file_get_contents(  $model->logo);
                unlink ($_SERVER['DOCUMENT_ROOT'] .   Yii::app()->baseUrl . '/php/fileUpload/files/'.$nomeFile);
                unlink ($_SERVER['DOCUMENT_ROOT'] .   Yii::app()->baseUrl . '/php/fileUpload/files/thumbnail/'.$nomeFile);
            }
            else
                $model->logo=$logo;

			if($model->save())
				$this->redirect(array('view','id'=>$model->id_fondo));
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

        // we only allow deletion via POST request
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Fondo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Fondo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Fondo']))
			$model->attributes=$_GET['Fondo'];

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
		$model=Fondo::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='fondo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
