<?php

class UserChannelTypeController extends Controller
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    $model = $this->loadModel($id);
	   $mod=new UserChannelReg();
	   $mod->type=$model->name;
	 
		$this->render('view',array(
			'model' => $model,
			'mod'=>$mod,	
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserChannelType('create');
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['UserChannelType']))
		{
			$name=$_POST['UserChannelType']['name'];
			if(preg_match("/[\x7f-\xff]/", $name))
			{
				$model->addError('name','渠道不能为中文!');
				$this->render('create',array(
						'model'=>$model,
				));
				return false;
			}
			
			$model->attributes=$_POST['UserChannelType'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
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
		$this->performAjaxValidation($model);

		if(isset($_POST['UserChannelType']))
		{
			$name=$_POST['UserChannelType']['name'];
			if(preg_match("/[\x7f-\xff]/", $name))
			{
				$model->addError('name','渠道不能为中文!');
				$this->render('create',array(
						'model'=>$model,
				));
				return false;
			}
			
			$model->attributes=$_POST['UserChannelType'];
		    $updateStatus = false;
			if($model->save()) {
				$updateStatus = true;
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('UserChannelType');
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserChannelType('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserChannelType']))
			$model->attributes=$_GET['UserChannelType'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserChannel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserChannelType::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserChannelType $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-channel-type-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
