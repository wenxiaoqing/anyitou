<?php

class CommentController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionList()
	{
		$count = Yii::app()->db->createCommand()
				->select("count(*) as num")
				->from("comment")
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
                ->select("c.*,ii.item_title,ii.invest_status")
                ->from("comment as c")
				->leftJoin("item_info ii",'c.item_id=ii.id')
                ->order('c.status asc,c.id desc')
				->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
				->queryAll();
		$model = new Comment();
		$this->render('list', array( 
			'model' => $model, 
    		'projectArrs' => $projectArrs,
    		'pages' => $pages 
		));
	}

	public function actionUpdate()
	{
		$ProjectClass = new CommentClass();
		$id = intval($_GET['id']);
		if(isset($_POST['Comment'])) {
			$result = $ProjectClass->commentUpdateInfo($id, $_POST['Comment']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '评论审核成功！';
				$response['url'] = $this->createUrl('update', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '评论审核失败！';
			}
			echo json_encode($response);
			exit();
			
		} else {
			$model = $ProjectClass->getCommentById($id);
			$this->render('update', array( 
				'model' => $model,
			));
		}
	}

	
}
