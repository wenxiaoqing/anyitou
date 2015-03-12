<?php

class NoticeController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	//公告列表
	public function actionList($type = 1)
	{
		$where = "";
		if(!empty($type)){ $where = "class_id=".$type;}
		$count = Yii::app()->db->createCommand()
				->select("count(*) as num")
				->from("cms_notice")
				->where($where)
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
                ->from("cms_notice")
				->where($where)
                ->order('notice_id desc')
				->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
				->queryAll();
		$model = new CmsNotice();
		$this->render('list', array( 
			'model' => $model, 
    		'projectArrs' => $projectArrs,
    		'pages' => $pages,
			'type'=>$type
		));
	}

	// 查看公告
	public function actionView()
	{
		$ProjectClass = new NoticeClass();
		$id = intval($_GET['id']);
		//获取项目预告基本信息
		$notice = $ProjectClass->getNoticeById($id);
		if(empty($notice)) {
			$this->redirectMessage('您查看的公告不存在!', 'info', 3, $this->createUrl('list'));
		}
		$this->render('view', array( 
			'model' => $notice,
		));
	}
	//编辑公告
	public function actionUpdate()
	{
		$ProjectClass = new NoticeClass();
		$id = intval($_GET['id']);
		if(isset($_POST['CmsNotice'])) {
			$result = $ProjectClass->noticeupdateInfo($id, $_POST['CmsNotice']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目预告信息成功！';
				$response['url'] = $this->createUrl('update', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目预告信息失败！';
			}
			echo json_encode($response);
			exit();
			
		} else {
			$model = $ProjectClass->getNoticeById($id);
			$this->render('update', array( 
				'model' => $model,
			));
		}
	}

	//创建公告
	public function actionCreate()
	{
		
		if(isset($_POST['CmsNotice'])) {
			$ProjectClass = new NoticeClass();
			$id = $ProjectClass->noticeCreate($_POST['CmsNotice']);

			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('list', array('id' => $id));
				$response['message'] = '创建公告成功！';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建公告失败！';
			}
			echo json_encode($response);
			exit();

		} else {
			$model = new CmsNotice();
			$model->add_date = date("Y-m-d H:i:s",time());
			$this->render('create', array(
							'model' => $model, 
			            ));

		}
	}


	
}
