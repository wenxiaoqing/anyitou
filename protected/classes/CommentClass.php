<?php
/*
 * 公告处理类
 */
class CommentClass
{
	
	public $error = '';
	public $errorCode = '';
	
	/*
	 * 获取公告基本信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getCommentById($id) {
		$record = Comment::model()->findByPk($id);
		return $record;
	}

	/**
	 * 更新公告基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function CommentUpdateInfo($id, $_data) {
		
		$model = new Comment();
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = 'project comment {$id} is not exist.';
			return false;
		}
		$record->message       = trim($_data['message']);
		$record->repay        = trim($_data['repay']);
		$record->status        = (int)$_data['status'];
		$record->repaytime        = date('Y-m-d H:i:s',time());
		if($record->validate() && $record->save()) {
			$this->errorCode = '0000';
			return true;
			
		} else {
			$this->errorCode = '0001';
			$this->error = $record->getErrors();
			return false;
		}
		
		return false;
	}

}
