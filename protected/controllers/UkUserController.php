<?php
class UkUserController extends Controller
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
				'actions'=>array('index','view','test','test1'),
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
		$model=new DpUser;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DpUser']))
		{
			$model->attributes=$_POST['DpUser'];
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

		if(isset($_POST['DpUser']))
		{
			$model->attributes=$_POST['DpUser'];
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
		$dataProvider=new CActiveDataProvider('DpUser');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DpUser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DpUser']))
			$model->attributes=$_GET['DpUser'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DpUser the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DpUser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DpUser $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dp-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionTest()
    {
		$headers = array();
$headers[]= 'content-length: 10';// . trim(strlen(print_r($params, true)));
$headers[]= 'Content-Type: application/x-www-form-urlencoded';

		$token = json_decode($_SESSION["_sf2_attributes"]["token"])->access_token;
		$url= "https://www.googleapis.com/plus/v1/disconnect?access_token=".$token;
		//$url= "http://localhost/gplus-quickstart-php/signin.php/disconnect";//ya29.hwBl26sWYOd4NdykDeeZ5mwbI4tGhz77IY-K1Ri-hNYUXAomxtXYNxxN
		// initialize a handle "http://localhost/gplus-quickstart-php/signin.php/people
		$chandle = curl_init();
		// set URL
		curl_setopt($chandle, CURLOPT_URL, $url);
		// return results a s string
		curl_setopt($chandle, CURLOPT_HTTPHEADER, $headers);
		//curl_setopt($chandle,CURLOPT_HEADER,true);
		curl_setopt($chandle, CURLOPT_POST, true);
		// execute the call
		$result = curl_exec($chandle);
		//var_dump(curl_error($chandle));
		curl_close($chandle);
		var_dump($result);
    }
    
    public function actionTest1()
    {
		var_dump($_SESSION);break;
		$token = json_decode($_SESSION["_sf2_attributes"]["token"])->access_token;
		//$url = Yii::app()->getBaseUrl(true)."/gplus-quickstart-php/signin.php/token";
		$url= "https://www.googleapis.com/plus/v1/people/me?access_token=".$token;//ya29.hwBl26sWYOd4NdykDeeZ5mwbI4tGhz77IY-K1Ri-hNYUXAomxtXYNxxN
		// initialize a handle "http://localhost/gplus-quickstart-php/signin.php/people
		$chandle = curl_init();
		// set URL
		curl_setopt($chandle, CURLOPT_URL, $url);
		// return results a s string
		curl_setopt($chandle, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($chandle,CURLOPT_HEADER,true);
		//curl_setopt($chandle, CURLOPT_USERAGENT,  'Codular Sample cURL Request');
		// execute the call
		$result = curl_exec($chandle);
		//var_dump(curl_error($chandle));
		curl_close($chandle);
		var_dump(json_decode($result));
	}
}
