<?php
date_default_timezone_set("PRC");
class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		// 用户数据
		$userModel = $this->loadModel($id);

		// 邀请数据
		$inviteModel = UserFriendRecommend::model()->getInviteInfo($id);
			
		// 资金数据
		$accountModel = UserFunds::model()->findByAttributes(array('user_id' => $id));
		// 资金托管账户数据
		$feaAttr = array('user_id' => $id, 'category' => 1);
		$feaDataModel = UserOtherAccount::model()->findByAttributes($feaAttr);
			
		// 获取奖励账户冻结状态
		$AccountClass = new AccountClass();
		$freezeStatusOfBonusAccount = $AccountClass->getFreezeStatusOfBonusAccount($id);
		
		//获取呼叫记录详情
		$callRecord=new CallRecord('search');
		$callRecord->unsetAttributes();
		$service_id=Yii::app()->user->id;
		$callRecord->service_id=$service_id;
		$callRecord->user_name=$userModel->user_name;
		$callRecord->user_id=$userModel->id;
		//$id=$userModel->id;

		if(isset($_POST['CallRecord']))
		{
			//redis缓存外呼次数
			$user_id=$_POST['CallRecord']['user_id'];
			$value= Yii::app()->cache->get($user_id);
			$value=$value+1;
			Yii::app()->cache->set($user_id,$value);
			$callRecord->attributes=$_POST['CallRecord'];
			if($callRecord->validate())
			{
				if($callRecord->save())
					$this->redirect(array('user/view','id'=>$id));
			}
		}

		$this->render('view',array(
				'model' => $userModel,
				'inviteModel' => $inviteModel,
				'accountModel' => $accountModel,
				'feaDataModel' => $feaDataModel,
				'freezeStatusOfBonusAccount' => $freezeStatusOfBonusAccount,
				'callRecord'=>$callRecord,
		));
	}

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be ed to the 'bankView' page.
	 */

	public function actionBankView($id){
		$bankInfoModel = BankInfo::model()->findByAttributes(array('id'=>$id));
		$this->render('bankView',array(
				'model'=>$bankInfoModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'user_bank_funds' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionBankUpdate($id)
	{
		//$model=$this->loadModel($id);
		$model = UserBankFunds::model()->findByAttributes(array('id' => $id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserBankFunds']))
		{
			$model->attributes=$_POST['UserBankFunds'];
			if($model->save())
				$this->redirect(array('user_bank_funds','id'=>$model->id));
		}

		$this->render('bankUpdate',array(
				'model'=>$model,
		));
	}


	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate()) {
				$model->password = md5($model->password);
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
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
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		} else {
			$dataProvider=new CActiveDataProvider('User');
			$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();
		// clear any default values
		if(isset($_GET['User'])) {
			$model->attributes=$_GET['User'];
		}

		if(isset($_GET['channel'])) {
			$model->channel_key= urldecode($_GET['channel']);
		}
		if(isset($_GET['user_id'])) {
			$model->channel_key= $_GET['user_id'];
		}
		if(isset($_GET['user_name'])) {
			$model->channel_key= urldecode($_GET['user_name']);
		}
		if(isset($_GET['isinvested']) && intval($_GET['isinvested'])) { // 投资过
			$model->invest_num = '>0';
		}
		if(isset($_GET['regtime'])) {
			$model->reg_time= urldecode($_GET['regtime']);
		}
		
		if(Yii::app()->authManager->isAssigned('callout', Yii::app()->user->id)){
			 $forbidden='true';
	   	}else{
		 	 $forbidden='false';
		}
		
		$this->render('admin',array(
				'model'=>$model,
				'forbidden'=>$forbidden,
		));
	
	}

	/**
	 * 短信记录管理
	 */
	public function actionSmsLog()
	{
		$model = new SmsSend('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SmsSend']))
			$model->attributes = $_GET['SmsSend'];

		if(isset($_GET['type'])) {
			$model->type = $_GET['type'];
		}

		$this->render('sms_log',array(
				'model'=>$model,
		));
	}

	/**
	 * 邀请记录
	 */
	public function actionInviteAdmin()
	{
		$model=new UserFriendRecommend('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserFriendRecommend']))
			$model->attributes=$_GET['UserFriendRecommend'];

		$this->render('invite_admin',array(
				'model'=>$model,
		));
	}



	/**
	 * 	银行绑定
	 */
	public function actionUserBankFunds()
	{
		$model=new UserBankFunds('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserBankFunds']))
			$model->attributes=$_GET['UserBankFunds'];
		$this->render('user_bank_funds',array(
				'model'=>$model,
		));

	}

	/**
	 * 处理jquery自动完成请求, 返回匹配的数据
	 *
	 */
	public function actionAutocomplete()
	{
		$term = $_GET['term'];
		$User = new User();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('user_name', $term);
		$criteria->limit = 10;
		$records = $User->findAllByAttributes(array(), $criteria);

		$response = array();
		foreach($records as $record) {
			$tmprow = array();
			$tmprow['value'] = $record->id;
			$tmprow['label'] = $record->user_name;
			$response[] = $tmprow;
		}
		echo json_encode($response);
		exit();
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{

			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * 创建邀请记录
	 *
	 */
	public function actionInviteCreate()
	{
		$model=new UserFriendRecommend;
		if(isset($_POST['UserFriendRecommend']))
		{
			$id=$_POST['UserFriendRecommend']['user_id'];
			$coupon_id=2;
			$post =UserFriendRecommend::model()->findByAttributes(array('user_id'=>$id));
			if($post){
				$model->addError('user_id', '用户已邀请');
				$this->render('inviteCreate',array(
						'model'=>$model,
				));
				return false;
			}
			
			$time = date("Y-m-d,H:i:s");
			$_POST['UserFriendRecommend']['date_time']=$time;
			$model->attributes=$_POST['UserFriendRecommend'];
			$model->recommend_type=$_POST['UserFriendRecommend']['recommend_type'];
			$model->coupon_id=$coupon_id;
			if($model->save()){
				$this->redirect(array('user/InviteAdmin'));

			}
		}
		$this->render('inviteCreate',array(
				'model'=>$model,
		));
	}
}