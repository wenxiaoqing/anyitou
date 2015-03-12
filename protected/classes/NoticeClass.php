<?php
/*
 * 公告处理类
 */
class NoticeClass
{
	
	public $error = '';
	public $errorCode = '';
	
	/*
	 * 获取公告基本信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getNoticeById($id) {
		$record = CmsNotice::model()->findByPk($id);
		return $record;
	}

	/**
	 * 更新公告基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function noticeupdateInfo($id, $_data) {
		
		$model = new CmsNotice();
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = 'project notice {$id} is not exist.';
			return false;
		}
		$record->title       = trim($_data['title']);
		$record->class_id        = (int)$_data['class_id'];
		$record->hits        = (int)$_data['hits'];
		$record->update_date        = trim($_data['update_date']);
		$record->add_date        = trim($_data['add_date']);
		$record->is_recommend        = (int)($_data['is_recommend']);
		$record->content        = trim($_data['content']);
		$record->status        = (int)$_data['status'];
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
	//创建公告
	public function noticeCreate(&$_data) {
		$id = 0;
		$infoData = array();
		$infoData['title']       = trim($_data['title']);
		$infoData['sub_title']       = trim($_data['title']);
		$infoData['class_id']        = (int)($_data['class_id']);
		$infoData['hits']        = (int)($_data['hits']);
		$infoData['update_date']    = trim($_data['update_date']);
		$infoData['add_date']       = trim($_data['add_date']);;
		$infoData['is_recommend']   = (int)($_data['is_recommend']);
		$infoData['status']   = (int)$_data['status'];
		$infoData['content']   = trim($_data['content']);

		$model = new CmsNotice();

		$model->attributes = $infoData;

		if($model->validate() && $model->save()) {
			$id = $model->attributes['notice_id'];
			$this->errorCode = '0000';
		} else {
			$id = 0;
			$this->errorCode = '0001';
			$this->error = $model->getErrors();
		}

		return $id;
		
	}

}
