<?php
/*
 * 投资处理类
 */
class FinanceClass
{
	
	public $error = '';
	public $errorCode = '';
	
	/*
	 * 获取融资案例基本信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getCaseById($id) {
		$record = FinanceCase::model()->findByPk($id);
		return $record;
	}

	/**
	 * 更新案例基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function caseUpdateInfo($id, $_data) {
		
		$model = new FinanceCase();
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = 'Finance case {$id} is not exist.';
			return false;
		}
		$record->title       = trim($_data['title']);
		$record->desc        = trim($_data['desc']);
		$record->recommend        = (int)($_data['recommend']);
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
	//创建案例
	public function caseCreate(&$_data) {
		$id = 0;
		$infoData = array();
		$infoData['title']       = trim($_data['title']);
		$infoData['desc']   = trim($_data['desc']);
		$infoData['sendtime']       = date('Y-m-d H:i:s',time());
		$infoData['recommend']   = (int)($_data['recommend']);
		$infoData['status']   = (int)$_data['status'];

		$model = new FinanceCase();
		$model->attributes = $infoData;
		if($model->validate() && $model->save()) {
			$id = $model->attributes['id'];
			$this->errorCode = '0000';
		} else {
			$id = 0;
			$this->errorCode = '0001';
			$this->error = $model->getErrors();
		}

		return $id;
		
	}

}
