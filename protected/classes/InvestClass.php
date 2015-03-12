<?php
/*
 * 投资处理类
 */
class InvestClass
{
	
	public $error = '';
	public $errorCode = '';
	
	/*
	 * 获取投资故事基本信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getStoriesById($id) {
		$record = InvestStories::model()->findByPk($id);
		return $record;
	}
	/*
	 * 获取投资技巧基本信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getSkillById($id) {
		$record = InvestSkill::model()->findByPk($id);
		return $record;
	}

	/**
	 * 更新故事基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function storiesUpdateInfo($id, $_data) {
		
		$model = new InvestStories();
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = 'invest Stories {$id} is not exist.';
			return false;
		}
		$record->title       = trim($_data['title']);
		$record->content        = trim($_data['content']);
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
	/**
	 * 更新技巧基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function skillUpdateInfo($id, $_data) {
		
		$model = new InvestSkill();
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = 'invest Skill {$id} is not exist.';
			return false;
		}
		$record->title       = trim($_data['title']);
		$record->content        = trim($_data['content']);
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
	//创建故事
	public function storiesCreate(&$_data) {
		$id = 0;
		$infoData = array();
		$infoData['title']       = trim($_data['title']);
		$infoData['content']   = trim($_data['content']);
		$infoData['sendtime']       = date('Y-m-d H:i:s',time());
		$infoData['recommend']   = (int)($_data['recommend']);
		$infoData['status']   = (int)$_data['status'];

		$model = new InvestStories();
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

	//创建技巧
	public function skillCreate(&$_data) {
		$id = 0;
		$infoData = array();
		$infoData['title']       = trim($_data['title']);
		$infoData['content']   = trim($_data['content']);
		$infoData['sendtime']       = date('Y-m-d H:i:s',time());
		$infoData['recommend']   = (int)($_data['recommend']);
		$infoData['status']   = (int)$_data['status'];

		$model = new InvestSkill();
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
