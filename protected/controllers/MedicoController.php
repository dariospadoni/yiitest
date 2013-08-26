<?php

class MedicoController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','search'),
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
        $user= User::model()->findByPk($id);
        $model = new UserMedico($user);

		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserMedico(null);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserMedico']))
		{
			$user = new User();
            $user->attributes=$_POST['UserMedico'];
            $user->password = crypt($user->password);
            $user->tipo="medico";

            if($user->save())
            {
                $medico = new Medico();
                $medico->attributes=$_POST['UserMedico']['medico'];
                if (isset ($medico->foto) )
                {
                    $medico->foto =  file_get_contents(  $medico->foto);
                    //unlink ($medico->foto);
                }
                $medico->id_user = $user->id_user;
                if ( $medico->save())
                {
                    $this->redirect(array('view','id'=>$medico->id_medico));
                }

            }
		}

        $this->layout='column1';
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
        $user = User::model()->findByPk($id);
        $model = new UserMedico($user);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if(isset($_POST['UserMedico']))
        {
            $user->attributes=$_POST['UserMedico'];

            if($user->save())
            {
                $medico = Medico::model()->find("id_medico=:id_medico",array('id_medico'=>$_POST['UserMedico']['medico']['id_medico'] ));
                $medico->attributes=$_POST['UserMedico']['medico'];
                if (isset ($medico->foto)&& $medico->foto!='' )
                {
                    $medico->foto =  file_get_contents(  $medico->foto);
                    //unlink ($medico->foto);
                }

                if ( $medico->save())
                {
                    $this->redirect(array('view','id'=>$medico->id_user));
                }

            }
        }

        $this->layout='column1';
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
        $model=new UserMedico(null);

        $data =  Array();
        $criteria = new CDbCriteria;
        $criteria->condition = "tipo='medico'";
        $userMedici = User::model()->findAll($criteria);

        foreach ($userMedici as $user)
            array_push($data, new UserMedico($user));


        $dataProvider=new CArrayDataProvider ($data,array(
            'keyField'=>'id_user',
        ));

		$this->render('index',array(
			'model'=>$model,
            'dataProvider'=>$dataProvider,
		));

	}

    public function actionSearch()
    {
        $model=new UserMedico(null);
        $model->unsetAttributes();  // clear any default values

        $data =  Array();

        $criteria = new CDbCriteria;
        $criteria->condition = "tipo='medico'";

        if( $_GET['UserMedico']['nome']!="" )
        {
            $criteria->addSearchCondition( 'nome', $_GET['UserMedico']['nome'], true, 'AND' );
            $model->nome =  $_GET['UserMedico']['nome'];
        }
        if(  $_GET['UserMedico']['cognome']!="" )
        {
            $criteria->addSearchCondition( 'cognome', $_GET['UserMedico']['cognome'], true, 'AND' );
            $model->cognome=  $_GET['UserMedico']['cognome'];
        }

        $userMedici = User::model()->findAll($criteria);

        foreach ($userMedici as $user)
        {
            //ulteriori filtri sulla tabella medico
            $medico = new UserMedico($user);

            if ( isset($_GET['UserMedico']['medico']['specializzazione'])==false ||
                isset($_GET['UserMedico']['medico']['specializzazione']) && $medico->medico->specializzazione==$_GET['UserMedico']['medico']['specializzazione'])
                array_push($data, $medico );

            if ($_GET['UserMedico']['medico']['specializzazione'])
                $model->specializzazione =$_GET['UserMedico']['medico']['specializzazione'];

            array_push($data, $medico );
        }


        $dataProvider=new CArrayDataProvider ($data,array(
            'keyField'=>'id_user',
        ));

        $this->render('index',array(
            'model'=>$model,
            'dataProvider'=>$dataProvider,
        ));

    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Medico( "search");
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Medico']))
			$model->attributes=$_GET['Medico'];


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
		$model=Medico::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='medico-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
