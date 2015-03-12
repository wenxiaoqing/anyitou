<?php

class FinanceController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	//公告列表
	public function actionCaseList()
	{
		$count = Yii::app()->db->createCommand()
				->select("count(*) as num")
				->from("financing_case")
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
                ->from("financing_case")
                ->order('recommend desc,id desc')
				->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
				->queryAll();
		$model = new FinanceCase();
		$this->render('caselist', array( 
			'model' => $model, 
    		'projectArrs' => $projectArrs,
    		'pages' => $pages 
		));
	}

	// 查看投资案例
	public function actionCaseView()
	{
		$ProjectClass = new FinanceClass();
		$id = intval($_GET['id']);
		//获取投资案例基本信息
		$notice = $ProjectClass->getCaseById($id);
		if(empty($notice)) {
			$this->redirectMessage('您查看的案例不存在!', 'info', 3, $this->createUrl('caselist'));
		}
		$this->render('caseview', array( 
			'model' => $notice,
		));
	}
	//编辑案例
	public function actionCaseUpdate()
	{
		$ProjectClass = new FinanceClass();
		$id = intval($_GET['id']);
		if(isset($_POST['FinanceCase'])) {
			$result = $ProjectClass->CaseUpdateInfo($id, $_POST['FinanceCase']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新投资信息成功！';
				$response['url'] = $this->createUrl('caseupdate', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新投资案例信息失败！';
			}
			echo json_encode($response);
			exit();
			
		} else {
			$model = $ProjectClass->getCaseById($id);
			$this->render('caseupdate', array( 
				'model' => $model,
			));
		}
	}

	//创建公告
	public function actionCaseCreate()
	{
		
		if(isset($_POST['FinanceCase'])) {
			$ProjectClass = new FinanceClass();
			$id = $ProjectClass->caseCreate($_POST['FinanceCase']);
			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('caselist', array('id' => $id));
				$response['message'] = '创建案例成功！';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建案例失败！';
			}
			echo json_encode($response);
			exit();

		} else {
			$model = new FinanceCase();
			$this->render('casecreate', array(
							'model' => $model, 
			            ));

		}
	}


	
}
