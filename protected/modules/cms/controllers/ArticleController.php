<?php

class ArticleController extends Controller
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
		// 创建文章模型
		$model = new CmsArticle;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['CmsArticle']))
		{
			$response = array();
			$model->attributes=$_POST['CmsArticle'];
			if(!isset($_POST['CmsArticle']['add_date']) || empty($_POST['CmsArticle']['add_date'])) {
				$model->add_date = date('Y-m-d H:i:s');
			}
			$model->add_userid = Yii::app()->user->id;
			if($model->validate() && $model->save()) {
				$id = $model->attributes['article_id'];
				$response['status'] = true;
				$response['code'] = '0000';
				$response['url'] = $this->createUrl('update', array('id' => $id));
				$response['message'] = '创建文章成功！';
			} else {
				$response['status'] = false;
				$response['code'] = '0001';
				$response['error'] = $model->getErrors();
				$response['message'] = '创建项目失败！';
			}
			
			$this->echoJson($response);
		}
		
		// 获取频道数据
		$channelModel = new CmsChannel();
		$channelARs = $channelModel->findAll();
		
		$channel_id = Yii::app()->request->getParam('channel_id');
		if(!empty($channel_id)) {
			$model->channel_id = $channel_id;
		} elseif(!empty($channelARs)) {
			$channel_id = $channelARs[0]->channel_id;
		}
		
		// 获取分类数据
		$classModel = new CmsClass();
		$classARs = $classModel->findAllByAttributes(array('channel_id' => $channel_id));
		
		$this->render('create',array(
				'model'=>$model,
				'channelARs' => $channelARs,
				'classARs' => $classARs,
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

		if(isset($_POST['CmsArticle']))
		{
			$model->attributes=$_POST['CmsArticle'];
			if(!isset($_POST['CmsArticle']['update_date']) || empty($_POST['CmsArticle']['update_date'])) {
				$model->update_date = date('Y-m-d H:i:s');
			}
			$model->update_userid = Yii::app()->user->id;
			if($model->validate() && $model->save()) {
				$id = $model->attributes['article_id'];
				$response['status'] = true;
				$response['code'] = '0000';
				$response['url'] = $this->createUrl('update', array('id' => $id));
				$response['message'] = '修改文章成功！';
			} else {
				$response['status'] = false;
				$response['code'] = '0001';
				$response['error'] = $model->getErrors();
				$response['message'] = '修改项目失败！';
			}
			
			$this->echoJson($response);
		}

		// 获取频道数据
		$channelModel = new CmsChannel();
		$channelARs = $channelModel->findAll();
		
		// 获取分类数据
		$classModel = new CmsClass();
		$classARs = $classModel->findAllByAttributes(array('channel_id' => $model->channel_id));
		
		$this->render('create',array(
				'model'=>$model,
				'channelARs' => $channelARs,
				'classARs' => $classARs,
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
		$dataProvider=new CActiveDataProvider('CmsArticle');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CmsArticle('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CmsArticle']))
			$model->attributes=$_GET['CmsArticle'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CmsArticle the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CmsArticle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CmsArticle $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cms-article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
