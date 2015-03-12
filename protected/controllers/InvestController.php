<?php

class InvestController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	//故事列表
	public function actionStoriesList()
	{
		$count = Yii::app()->db->createCommand()
				->select("count(*) as num")
				->from("invest_stories")
				->queryRow();
		if ($count)
			$rowCount = $count['num'];
		else 
			$rowCount = 0;
		$criteria = new CDbCriteria();
		$pages = new CPagination($rowCount);
		$pages->pageSize = 10;
		$pages->applyLimit($criteria);
		$projectArrs = Yii::app()->db->createCommand()
                ->select("*")
                ->from("invest_stories")
                ->order('recommend desc,id desc')
				->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
				->queryAll();
		$model = new InvestStories();
		$this->render('storieslist', array( 
			'model' => $model, 
    		'projectArrs' => $projectArrs,
    		'pages' => $pages 
		));
	}

	//技巧列表
	public function actionSkillList()
	{
		$count = Yii::app()->db->createCommand()
				->select("count(*) as num")
				->from("invest_skill")
				->queryRow();
		if ($count)
			$rowCount = $count['num'];
		else 
			$rowCount = 0;
		$criteria = new CDbCriteria();
		$pages = new CPagination($rowCount);
		$pages->pageSize = 10;
		$pages->applyLimit($criteria);
		$projectArrs = Yii::app()->db->createCommand()
                ->select("*")
                ->from("invest_skill")
                ->order('recommend desc,id desc')
				->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
				->queryAll();
		$model = new InvestSkill();
		$this->render('skilllist', array( 
			'model' => $model, 
    		'projectArrs' => $projectArrs,
    		'pages' => $pages 
		));
	}

	// 查看投资故事
	public function actionStoriesView()
	{
		$ProjectClass = new InvestClass();
		$id = intval($_GET['id']);
		//获取投资故事基本信息
		$notice = $ProjectClass->getStoriesById($id);
		if(empty($notice)) {
			$this->redirectMessage('您查看的故事不存在!', 'info', 3, $this->createUrl('storieslist'));
		}
		$this->render('storiesview', array( 
			'model' => $notice,
		));
	}
	// 查看投资技巧
	public function actionSkillView()
	{
		$ProjectClass = new InvestClass();
		$id = intval($_GET['id']);
		//获取投资技巧基本信息
		$notice = $ProjectClass->getSkillById($id);
		if(empty($notice)) {
			$this->redirectMessage('您查看的技巧不存在!', 'info', 3, $this->createUrl('skilllist'));
		}
		$this->render('skillview', array( 
			'model' => $notice,
		));
	}
	//编辑故事
	public function actionStoriesUpdate()
	{
		$ProjectClass = new InvestClass();
		
		var_dump($ProjectClass);exit;
		$id = intval($_GET['id']);
		if(isset($_POST['InvestStories'])) {
			$result = $ProjectClass->StoriesUpdateInfo($id, $_POST['InvestStories']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新投资故事信息成功！';
				$response['url'] = $this->createUrl('storieslist', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新投资故事信息失败！';
			}
			echo json_encode($response);
			exit();
			
		} else {
			$model = $ProjectClass->getStoriesById($id);
			$this->render('storiesupdate', array( 
				'model' => $model,
			));
		}
	}

	//编辑技巧
	public function actionSkillUpdate()
	{
		$ProjectClass = new InvestClass();
		$id = intval($_GET['id']);
		if(isset($_POST['InvestSkill'])) {
			$result = $ProjectClass->SkillUpdateInfo($id, $_POST['InvestSkill']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新投资技巧信息成功！';
				$response['url'] = $this->createUrl('skilllist', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新投资技巧信息失败！';
			}
			echo json_encode($response);
			exit();
			
		} else {
			$model = $ProjectClass->getSkillById($id);
			$this->render('skillupdate', array( 
				'model' => $model,
			));
		}
	}

	//创建故事
	public function actionStoriesCreate()
	{
		
		if(isset($_POST['InvestStories'])) {
			$ProjectClass = new InvestClass();
			$id = $ProjectClass->storiesCreate($_POST['InvestStories']);
			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('storieslist', array('id' => $id));
				$response['message'] = '创建故事成功！';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建故事失败！';
			}
			echo json_encode($response);
			exit();

		} else {
			$model = new InvestStories();
			$this->render('storiescreate', array(
							'model' => $model, 
			            ));

		}
	}
	//创建技巧
	public function actionSkillCreate()
	{
		
		if(isset($_POST['InvestSkill'])) {
			$ProjectClass = new InvestClass();
			$id = $ProjectClass->skillCreate($_POST['InvestSkill']);
			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('skilllist', array('id' => $id));
				$response['message'] = '创建技巧成功！';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建技巧失败！';
			}
			echo json_encode($response);
			exit();

		} else {
			$model = new InvestSkill();
			$this->render('skillcreate', array(
							'model' => $model, 
			            ));

		}
	}

	public function actionLoans()
	{
	    $model=new BackgroundLoansLog('search');
		$model->unsetAttributes();
		if(isset($_GET['BackgroundLoansLog']))
			$model->attributes = $_GET['BackgroundLoansLog'];

		$this->render('loans_log',array(
			'model'=>$model,
		));
		$this->render('loans_log');
	}

	public function actionRecords()
	{
	    $model = new UserInvest('search');
		$model->unsetAttributes();
		if(isset($_GET['UserInvest'])) {
			
			$model->attributes = $_GET['UserInvest'];
		    if(isset($_GET['UserInvest']['username'])) {
    		    $model->username = $_GET['UserInvest']['username'];
    		}
		    if(isset($_GET['UserInvest']['realname'])) {
    		    $model->realname = $_GET['UserInvest']['realname'];
    		}
    		if(isset($_GET['UserInvest']['item_title'])) {
    			$model->item_title = $_GET['UserInvest']['item_title'];
    		}
    		if(isset($_GET['UserInvest']['type'])) {
    			$model->type = $_GET['UserInvest']['type'];
    		}
		}
		
		if(isset($_GET['type']))
		{
			$model->type=$_GET['type'];
		}
		
	    if(isset($_GET['item_id'])) {
            $model->item_id = $_GET['item_id'];
        }

		$this->render('records',array(
			'model'=>$model,
		));
	}

	public function actionRepayment()
	{
	    $model=new ItemRepaymentLog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ItemRepaymentLog'])) {
		    $model->attributes=$_GET['ItemRepaymentLog'];
		}
		if(isset($_GET['user_id'])) {
		    $model->user_id = $_GET['user_id'];
		}
	    if(isset($_GET['item_id'])) {
		    $model->item_id = $_GET['item_id'];
		}

		$this->render('repayment_log',array(
			'model'=>$model,
		));
	}
	
    public function actionInvestmentCoupon()
	{
	    $model=new UserCouponLog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserCouponLog']))
			$model->attributes=$_GET['UserCouponLog'];
		
		$this->render('investment_coupon_admin',array(
			'model'=>$model,
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
