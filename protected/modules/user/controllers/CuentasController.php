<?php

class CuentasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = 'column1';
	public $defaultAction = 'home';

	private $model;
	private $cuentas;

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
				'actions'=>array('index','view','home','verCuenta'),
				'users'=>array('*'),
			),		
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','usuarioCuenta','verCuentas'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionHome(){
		$model = $this->loadUser();

		$dataProvider=new CActiveDataProvider('Cuentas');
		$this->render('home',array(
			'dataProvider'=>$dataProvider,'model'=>$model,
		));
	}

	public function actionVercuentas(){
		$model = $this->loadUser();

		$this->render('cuentas',array('model'=>$model));
	}

	public function loadUser()
	{
		if($this->model===null)
		{
			if(Yii::app()->user->id)
				$this->model=Yii::app()->controller->module->user();
			if($this->model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->model;
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
		$model=new Cuentas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cuentas']))
		{
			$model->attributes=$_POST['Cuentas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cuentas']))
		{
			$model->attributes=$_POST['Cuentas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Cuentas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cuentas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cuentas']))
			$model->attributes=$_GET['Cuentas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionVerCuenta($id){		
		$this->render('_viewCuenta',array(
			'data'=>$this->loadModel($id),
		));
	}


	public function actionUsuarioCuenta($user_id = null) {
		//Asigno a un usuario un tipo de cuenta. Esta acción solo tiene que estar disponible para el Administrador.
		if(isset($_POST['Profile'])){
			$atributos=$_POST['Profile'];			
			$profile = Profile::model()->find('user_id=:id',array(':id'=>$_POST['Profile']['user_id']));
			if(!empty($profile)){
				$profile->tipocuenta =$_POST['Profile']['tipocuenta'];
				if($profile->update()){
					Yii::app()->user->setFlash('success', "Bono asignado!");
				}else{
					Yii::app()->user->setFlash('error', "No se han guardado los cambios");
				}
			}			

			$this->render('usuarioCuenta', array('model' => $profile));
		}else{			
			$profile = Profile::model()->find('user_id=:user_id',array(':user_id'=>$user_id));
			$this->render('usuarioCuenta', array('model' => $profile));
		}
	}
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cuentas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cuentas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cuentas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cuentas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/* Used to debug variables*/
    protected function Debug($var){
        $bt = debug_backtrace();
        $dump = new CVarDumper();
        $debug = '<div style="display:block;background-color:gold;border-radius:10px;border:solid 1px brown;padding:10px;z-index:10000;"><pre>';
        $debug .= '<h4>function: '.$bt[1]['function'].'() line('.$bt[0]['line'].')'.'</h4>';
        $debug .=  $dump->dumpAsString($var);
        $debug .= "</pre></div>\n";
        Yii::app()->params['debugContent'] .=$debug;
    }

}
