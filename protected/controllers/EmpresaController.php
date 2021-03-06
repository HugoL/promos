<?php

class EmpresaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
				'actions'=>array('index','view','verpromos'),
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
	public function actionView($alias)
	{
		$model = $this->loadModelByName($alias);
		
		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionVerpromos($id){	

		$model = $this->loadModel($id);
		$image = Item::model()->find('foreign_id='.$id.' AND model="empresa"');
		//$promos = $this->loadPromos($model->user_id);
		
		$this->render('portalempresa',array('model'=>$model,'image'=>$image
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Empresa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empresa']))
		{
			$model->attributes=$_POST['Empresa'];
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

		if(isset($_POST['Empresa']))
		{
                    $model->attributes=$_POST['Empresa'];
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
		$dataProvider=new CActiveDataProvider('Empresa', 
			array(
	    		'criteria'=>array(
	        		'condition'=>'verificado = 1',
	    		),
			)
		);
		//$this->debug($dataProvider);
		//$empresa = $this->loadModel($dataProvider->id_usuario);
		//$this->debug($dataProvider->id);
		$this->render('index',array(
			'dataProvider'=>$dataProvider
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Empresa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Empresa']))
			$model->attributes=$_GET['Empresa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionPaypal()
	{
		$model=new PaypalForm;
		if(isset($_POST['PaypalForm']))
		{
			$model->attributes=$_POST['PaypalForm'];
			if($model->validate())
			{
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('paypal',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Empresa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Empresa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Empresa no encontrada');
		return $model;
	}
	
	public function loadModelByName($name)
	{
		$attributes = array('nombre_slug'=>$name);
		$model=Empresa::model()->findByAttributes($attributes);
		if($model===null)
			throw new CHttpException(404,'No se encuentra esta empresa...');
		return $model;
	}

	public function loadPromos($id)
	{
		$promos = new CActiveDataProvider('Promocion', array(
				'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>array(
				'condition'=>'user_id='.$id,
				//'params'=>array('estado'=>Promocion::STATUS_ACTIVA),
			),
		));
		if($promos===null)
			throw new CHttpException(404,'Esta empresa no tiene promociones.');
		return $promos;
	}

	public function loadUser($id)
	{
		$promos = new CActiveDataProvider('User', array(
				'pagination'=>array(
				'pageSize'=>10,
			),
			'criteria'=>array(
				'condition'=>'id='.$id,
				//'params'=>array('estado'=>Promocion::STATUS_ACTIVA),
			),
		));
		if($promos===null)
			throw new CHttpException(404,'Esta empresa no tiene promociones.');
		return $promos;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Empresa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresa-form')
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
