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
				'minLength'=>5,
    			'maxLength'=>5,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','login','captcha','error',),
				'users'=>array('*'), 
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('updatepwd', 'logout'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function init()
	{
		$this->defaultAction = 'index';
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		} else {
			$this->render('index');
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = "error";
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		
		// display the login form
		$this->layout = "login";
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
	
	/**
	 * update password
	 */
	public function actionUpdatepwd()
	{
		$user_id = Yii::app()->user->id;
		
		$ManagerUserClass = new ManagerUserClass();
		$user = $ManagerUserClass->getById($user_id);
		
		if( Yii::app()->request->getParam('confirm') == true) {
			$response = array();
			$oldpassword  = Yii::app()->request->getParam('oldpassword');
			$newpassword  = Yii::app()->request->getParam('newpassword');
			$newpassword2 = Yii::app()->request->getParam('newpassword2');
			
			$result = $ManagerUserClass->updatePassword(
						$user_id,
						$oldpassword,
						$user->password,
						$newpassword,
						$newpassword2
					);
					
			if($result == true) {
				$response['status'] = true;
				$response['info'] = '修改成功！';
			} else {
				$response['status'] = false;
				$response['info'] = '修改失败！';
				$response['error'] = $ManagerUserClass->error;
			}
			$response['code'] = $ManagerUserClass->errorCode;
			
			$this->echoJson($response);
		} else {
			$this->render('update_pwd',array(
				'user' => $user,
			));
		}

	}
}