    <?php

class PromocionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	
	private $_model;

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
				'actions'=>array('create','update','delete'),
				//'users'=>array(Yii::app()->getModule('user')->user()->username),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Manages all models.
	 */
    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $this->_model=new Promocion('search');

        $this->_model->unsetAttributes();  // clear any default values
        if(isset($_GET['Promocion']))
            $this->_model->attributes=$_GET['Promocion'];

        $this->render('admin',array(
            'model'=>$this->_model,
        ));
    }
    
    public function actionAdmin()
    {
            $this->_model=new Promocion('search');

            $this->_model->unsetAttributes();  // clear any default values
            if(isset($_GET['Promocion']))
                    $this->_model->attributes=$_GET['Promocion'];

            $this->render('admin',array(
                    'model'=>$this->_model,
            ));
    }
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//$dataProvider=new CActiveDataProvider('Promocion');
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
            $model=new Promocion;
            $model->scenario = "insert";

            $this->performAjaxValidation(array($model));

            if(isset($_POST['Promocion'])){
                $model->attributes=$_POST['Promocion'];

                $this->setCamposSecundarios($model);

                if($model->save()){
                    Yii::app()->user->setFlash('success',UserModule::t("Promotion created."));
                    //$this->redirect(array('mispromociones'));
                    $this->redirect(Yii::app()->getModule('user')->promocionesUrl);
                }
                else{
                    Yii::app()->user->setFlash('error',UserModule::t("Error creating the promotion."));
                }
            }
            $this->render('create',array(
                    'model'=>$model,
            ));	}
	
/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id=null)
	{
            
            //adsgh;
            $this->_model=$this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation(array($this->_model));

            if(isset($_POST['Promocion']))
            {
                $this->_model->attributes=$_POST['Promocion'];
                if($this->_model->save())
                        Yii::app()->user->setFlash('success',UserModule::t("Promotion updated."));
                else
                        Yii::app()->user->setFlash('error',UserModule::t("Error updating the promotion."));
                
                $this->redirect(array('update','id'=>$this->_model->id));
            }

            $this->render('update',array(
                    'model'=>$this->_model,
            ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id){
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        

    private function setCamposSecundarios($model=null){
        if(isset($model)){
            //$this->_model->user_id = Yii::app()->user->id;
            $model->estado = 1;
            $model->titulo_slug = UserModule::getSlug($model->titulo) ;
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

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Promocion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
            //$user_id = Yii::app()->user->id;
            //$this->_model=Promocion::model()->findByPk(array($id,$user_id));
            $this->_model=Promocion::model()->findByPk($id);
            if($this->_model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $this->_model;
    }

    public function loadUser()
    {
            if(Yii::app()->user->id)
                    $user=Yii::app()->controller->module->user();
            else
                    throw new CHttpException(404,'Sorry, we cannot process your request. Try again
                            later.');

            return $user;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
            // ajax validator
            if(isset($_POST['ajax']) && $_POST['ajax']==='promociones-form')
            {
                echo UActiveForm::validate($validate);
                Yii::app()->end();
            }
    }

    /**
     * Register Script
     * Esta función es para gestionar el jquery de las vistas para que se muestren los cmapos según
     * el valor seleccionado en el combo SuperUser(tipo de usuario). Está copiado y pegado de profileFields.
     */
    public function registerScript() {
            $basePath=Yii::getPathOfAlias('application.modules.user.views.asset');
            $baseUrl=Yii::app()->getAssetManager()->publish($basePath);
            $cs = Yii::app()->getClientScript();
            $cs->registerCoreScript('jquery');
            $cs->registerCssFile($baseUrl.'/css/redmond/jquery-ui.css');
            $cs->registerCssFile($baseUrl.'/css/style.css');
            $cs->registerScriptFile($baseUrl.'/js/jquery-ui.min.js');
            $cs->registerScriptFile($baseUrl.'/js/form.js');
            $cs->registerScriptFile($baseUrl.'/js/jquery.json.js');

            $widgets = self::getWidgets();

            $js = "
                    $('#buttonStateful').click(function() {
                        var btn = $(this);
                        btn.button('loading'); // call the loading function
                        setTimeout(function() {
                            btn.button('reset'); // call the reset function
                }, 3000);

                function loading() {
                    }

                    "
        ;
    }

	
	
}