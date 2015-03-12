<?php

class ClassController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
		$model=new CmsClass;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CmsClass']))
		{
			$model->attributes=$_POST['CmsClass'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->class_id));
		}
		
		$channel_id = Yii::app()->request->getParam('channel_id');
		if(!empty($channel_id)) {
			$model->channel_id = $channel_id;
		}
		
		// 获取所有频道数据
		$CmsChannelModel = new CmsChannel();
		$channelARs = $CmsChannelModel->findAll();
		
		$this->render('create',array(
			'model'=>$model,
			'channelARs' => $channelARs,
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

		if(isset($_POST['CmsClass']))
		{
			$model->attributes=$_POST['CmsClass'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->class_id));
		}
		
		// 获取所有频道数据
		$CmsChannelModel = new CmsChannel();
		$channelARs = $CmsChannelModel->findAll(); 

		$this->render('update',array(
			'model'=>$model,
			'channelARs' => $channelARs,
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
		$dataProvider=new CActiveDataProvider('CmsClass');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CmsClass('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CmsClass']))
			$model->attributes=$_GET['CmsClass'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionGetByChannel()
	{
	    $channelId = intval($_GET['channel_id']);
	    
	    $model = new CmsClass();
	    $attrs = array('channel_id' => $channelId);
	    $classRecords = $model->findAllByAttributes($attrs);
	    
	    $response = $tmparr = array();
	    foreach($classRecords as $record) {
	        $tmparr = array();
	        $tmparr['id'] = $record->id;
	        $tmparr['name'] = $record->name;
	        $response[] = $tmparr;
	    }
	    
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CmsClass the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CmsClass::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CmsClass $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cms-class-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
