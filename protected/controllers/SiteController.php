<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$queryModel=DpQuery::model();
		$userModel=DpUser::model();
		$this->render('index',array('queryModel'=>$queryModel, 'userModel'=>$userModel));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	
	public function actionCreate()
	{
		
		// Uncomment the following line if AJAX validation is needed
		$queryModel=new DpQuery();
		$userModel=new DpUser;
		//$this->performAjaxValidation($queryModel, $userModel);

		if(isset($_POST['DpQuery']) && isset($_POST['DpUser']))
		{
			$queryModel=new DpQuery();
			$userModel=new DpUser;
			$user = $userModel->findByAttributes(array(), 'email=:email', array('email'=>$_POST['DpUser']['email']));
			if(!is_null($user))
			{
				$queryModel->attributes = $_POST['DpQuery'];
				$queryModel->users = $user->id;
			}
			else
			{
				$userModel->attributes = $_POST['DpUser'];
				if($userModel->save())
				{
					$queryModel->attributes = $_POST['DpQuery'];
					$queryModel->users = $userModel->id;
				}
			}	
			if($queryModel->save())
				$this->render('thanks');
			else
				$this->render('index',array('userModel'=>$userModel, 'queryModel'=>$queryModel));
		}
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	protected function performAjaxValidation($userModel, $queryModel)
	{
		//echo 'here';die;
		if(isset($_POST['ajax']) && $_POST['ajax']==='dp-main-form')
		{
			echo CActiveForm::validate($userModel);
			Yii::app()->end();
		}
	}
	public function actionSendMail()
    {   
        $message            = new YiiMailMessage;
           //this points to the file test.php inside the view path
        $message->view = "test";
        //$sid                 = 1;
        //$criteria            = new CDbCriteria();
        //$criteria->condition = "studentID=".$sid."";            
        $studModel1          = "My Mail";//Student::model()->findByPk($sid);        
        $params              = array('myMail'=>$studModel1);
        $message->subject    = 'My TestSubject';
        $message->setBody($params, 'text/html');                
        $message->addTo('gauravpantgenext@gmail.com');
        $message->from = 'jackblanc2@gmail.com';   
        Yii::app()->mail->send($message);       
    }
     public function actionTest()
       {
          $this->render('map');
       }
}
