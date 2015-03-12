<?php

/*
 * 项目处理类
 *
 */

class ProjectClass
{
	
	public $error = '';
	public $errorCode = '';
	
	/**
	 * 创建项目
	 * @param: $_data  array  项目数据 
	 * @return: $id number 项目id
	 */
	public function create(&$_data) {
		$id = 0;
		$infoData = array();
		$infoData['item_title']       = trim($_data['item_title']);
		$infoData['sub_title']        = trim($_data['sub_title']);
		$infoData['number_id']        = trim($_data['number_id']);
		$infoData['category']         = isset($_data['category']) ? $_data['category'] : 'invest';
		$infoData['borrower_user_id']	      = $_data['borrower_user_id'];
		$infoData['company_id']       = $_data['company_id'];
		$infoData['pay_type']         = $_data['pay_type'];
		$infoData['guarantee_type']   = $_data['guarantee_type'];
		$infoData['guarantee_id']     = $_data['guarantee_id'];
		$infoData['evaluation_company_id']=$_data['evaluation_company_id'];
		$infoData['rate_of_interest'] = substr(sprintf('%.3f', $_data['rate_of_interest']), 0, -1);
		$infoData['reward_apr'] = substr(sprintf('%.3f', $_data['reward_apr']), 0, -1);
		$infoData['scale']            = 0;
		$infoData['financing_amount'] = intval($_data['financing_amount']);
		if(isset($_data['credito_amount'])) {
		    $infoData['credito_amount'] = floatval($_data['credito_amount']);
		} else {
		    $infoData['credito_amount'] = $infoData['financing_amount'];
		}
		$infoData['investment']       = $_data['investment'];
		$infoData['over_amount']      = '0';
		$infoData['begin_time']       = $_data['begin_time'];
		$infoData['repayment_time']   = $_data['repayment_time'];
		$begin_time = strtotime($_data['begin_time']);
		$repayment_time = strtotime($_data['repayment_time']);
		$delay = intval((strtotime('midnight', $repayment_time) - strtotime('midnight', $begin_time))/86400) + 1;
		$infoData['delay']            = $delay;
		$infoData['raise_begin_time'] = $_data['raise_begin_time'];
		$infoData['raise_delay']      = $_data['raise_delay'];
		$infoData['credit']           = $_data['credit'];
		$infoData['status']           = '0';
		$infoData['invest_status']    = '0';
		$infoData['item_pic']         = $_data['item_pic'];
		$infoData['description']      = $_data['description'];
		$infoData['capital_opration'] = $_data['capital_opration'];
		$infoData['collateral_info']         = $_data['collateral_info'];
		$infoData['risk_control']     = $_data['risk_control'];
		$infoData['desc_detail']      = $_data['desc_detail'];
		$infoData['isrecommend']      = $_data['isrecommend'];
		$infoData['addtime']          = date('Y-m-d H:i:s');

		$id = $this->_createInfo($infoData);

		if($id > 0) {
			$detailData = array();
			$detailData['item_id'] = $id;
			$detailData['title'] = $infoData['item_title'];
			$detailData['post_time'] = date('Y-m-d H:i:s');
			$this->_createDetail($detailData);
		} else {
			$id = 0;
		}

		return $id;
	}
	
	/*
	 * 创建项目基本信息
	 * @param: $_data  array  项目数据
	 * @return: $id number 项目id
	 */
	protected function _createInfo($_data) {
		$result = 0;
		$model = new ItemInfo();
		
		$model->attributes = $_data;
		//$model->pay_type = '1';
		$model->credit = '';
		$model->item_pic = '';

		if($model->validate() && $model->save()) {
			$result = $model->attributes['id'];
			$this->errorCode = '0000';
		} else {
			$result = 0;
			$this->errorCode = '0001';
			$this->error = $model->getErrors();
		}

		return $result;
	}

	/*
	 * 创建项目详情信息
	 * @param: $_data  array  项目数据
	 * @return: $id number 项目id
	 */
	protected function _createDetail($_data) {
		$result = false;
		$model = new ItemDetails();

		$model->attributes = $_data;

		if($model->validate() && $model->save()) {
			$result = true;
			$this->errorCode = '0000';
		} else {
			$result = false;
			$this->errorCode = '0010';
			$this->error = $model->getErrors();
		}

		return $result;
	}
	
	/**
	 * 更新项目基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function updateInfo($id, $_data) {
		
		$model = new ItemInfo();
		
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = 'project {$id} is not exist.';
			return false;
		}
		
		$record->item_title       = trim($_data['item_title']);
		$record->sub_title        = trim($_data['sub_title']);
		$record->number_id        = trim($_data['number_id']);
	    if(isset($_data['category']) && $_data['category']) {
		    $record->category = $_data['category'];
		}
	    if(isset($_data['pay_type']) && $_data['pay_type']) {
		    $record->pay_type = $_data['pay_type'];
		}
		$record->borrower_user_id	      = $_data['borrower_user_id'];
		$record->company_id       = $_data['company_id'];
		$record->guarantee_type   = $_data['guarantee_type'];
		$record->guarantee_id     = $_data['guarantee_id'];
		$record->evaluation_company_id = $_data['evaluation_company_id'];
		$record->rate_of_interest = substr(sprintf('%.3f', $_data['rate_of_interest']), 0, -1);
		$record->reward_apr = substr(sprintf('%.3f', $_data['reward_apr']), 0, -1);
		$record->financing_amount = intval($_data['financing_amount']);
		$record->credito_amount = floatval($_data['credito_amount']);
		$record->investment       = $_data['investment'];
		$record->begin_time       = $_data['begin_time'];
		$record->repayment_time   = $_data['repayment_time'];
		$begin_time = strtotime($_data['begin_time']);
		$repayment_time = strtotime($_data['repayment_time']);
		$delay = intval((strtotime('midnight', $repayment_time) - strtotime('midnight', $begin_time))/86400) + 1;
		$record->delay            = $delay;
		$record->raise_begin_time = $_data['raise_begin_time'];
		$record->raise_delay      = $_data['raise_delay'];
		if(isset($_data['credit']) && $_data['credit']) {
		    $record->credit           = $_data['credit'];
		}
		$record->description      = $_data['description'];
		$record->capital_opration = $_data['capital_opration'];
		$record->collateral_info  = $_data['collateral_info'];
		$record->risk_control     = $_data['risk_control'];
		$record->desc_detail      = $_data['desc_detail'];
		$record->guarantee_id     = $_data['guarantee_id'];
		$record->guarantee_type   = $_data['guarantee_type'];
		$record->isrecommend      = $_data['isrecommend'];
		
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
	 * 更新项目基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function updateDetail($id, $_data) {
		$model = new ItemDetails();
		
		$record = $model->findByAttributes(array('item_id' => $id));
		if(empty($record)) {
		    
		    $detailData = array();
			$detailData['item_id']      = $id;
			if(isset($_data['item_title']) && !empty($_data['item_title'])) {
			    $detailData['title']        = $_data['item_title'];
			}
			$detailData['post_time']    = date('Y-m-d H:i:s');
			$detailData['idea_credit']  = $_data['idea_credit'];
			$detailData['idea_home']    = $_data['idea_home'];
			$detailData['idea_market']  = $_data['idea_market'];
			$detailData['idea_risk']    = $_data['idea_risk'];
			$detailData['idea_repay']    = $_data['idea_repay'];
			$detailData['relation_desc'] = $_data['relation_desc'];
			
			$res = $this->_createDetail($detailData);
		    return $res;
			//$this->errorCode = '0001';
			//$this->error = 'detail of project {$id} is not exist.';
			//return false;
		}
		
		$record->idea_credit      = $_data['idea_credit'];
		$record->idea_home        = $_data['idea_home'];
		$record->idea_market      = $_data['idea_market'];
		$record->idea_risk        = $_data['idea_risk'];
		$record->idea_repay       = $_data['idea_repay'];
		$record->relation_desc    = $_data['relation_desc'];
		
		if($record->validate() && $record->save()) {
			$this->errorCode = '0000';
			return true;
			
		} else {
			$this->errorCode = '0001';
			$this->error = $model->getErrors();
			return false;
		}
		return false;
	}
	
	/*
	 * 获取项目基本信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getInfoById($id) {
		$record = ItemInfo::model()->findByPk($id);
		return $record;
	}
	
	/*
	 * 获取项目详细信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getDetailById($id) {
		$record = ItemDetails::model()->findByAttributes(array('item_id' => $id));
		return $record;
	}
	
	public function getInfoModel()
	{
	    return ItemInfo::model();
	}
	
    public function getDetailModel()
	{
	    return ItemDetails::model();
	}
	
	public function verify($id, $status)
	{
	    $record = ItemInfo::model()->findByPk($id);
		if($record) {
			if($status == 1) {
				// 验证是否满足要求
			}
			
			$record->status = $status;
			
			if($record->save()) {
				$this->errorCode = '0000';
				return true;
			} else {
				$this->error = '操作失败';
				$this->errorCode = '1002';
				return false;
			}
		} else {
			$this->error = '项目不存在';
			$this->errorCode = '1001';
			return false;
		}
	}
	
	/**
	 * 
	 * 更改项目封面图片
	 */
	public function updateConver($id, $converUrl)
	{
	    $record = ItemInfo::model()->findByPk($id);
	    if(empty($record)) {
	        $this->error = '项目不存在';
	        return false;
	    }
	    if($converUrl == '') {
	        $this->error = '请选择封面图片';
	        return false;
	    }
	    $record->item_pic = $converUrl;
	    if($record->save()) {
	        return true;
	    } else {
	        $this->error = $record->getErrors();
	        return false;
	    }
	}
	
	/**
	 * 投资状态所有投资状态
	 *
	 */
	public function updateInvestStatus($id, $data)
	{
	    $model = new ItemInfo();
		
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = '项目 {$id} 不存在！.';
			return false;
		}
		
		$record->begin_time       = $data['begin_time'];
		$record->repayment_time   = $data['repayment_time'];
		$record->raise_begin_time = $data['raise_begin_time'];
		$record->raise_delay      = $data['raise_delay'];
		// 项目融资天数
		$begin_time = strtotime($data['begin_time']);
		$repayment_time = strtotime($data['repayment_time']);
		$delay = intval((strtotime('midnight', $repayment_time) - strtotime('midnight', $begin_time))/86400) + 1;
		$record->delay = $delay;
		
		$invest_status = intval($data['invest_status']);
		if($invest_status == 1) {
		    $record->invest_status = $invest_status;
		} else {
		    $record->invest_status = '0';
		}
		
		if($record->validate() && $record->save()) {
			$this->errorCode = '0000';
			return true;
		} else {
			$this->errorCode = '1000';
			$this->error = $record->getErrors();
			return false;
		}
	}

	/*
	 * 获取项目预告基本信息By项目ID
	 * @param: $id number
	 * @return: $record CActiveRecord
	 */
	public function getNoticeById($id) {
		$record = CmsNoticeInvest::model()->findByPk($id);
		return $record;
	}

	/**
	 * 更新项目预告基本信息
	 * @param: $_data array
	 * @return: boolean
	 */
	public function noticeupdateInfo($id, $_data) {
		
		$model = new CmsNoticeInvest();
		$record = $model->findByPk($id);
		if(empty($record)) {
			$this->errorCode = '0001';
			$this->error = 'project notice {$id} is not exist.';
			return false;
		}
		$record->title       = trim($_data['title']);
		$record->guarantee        = trim($_data['guarantee']);
		$record->amount        = trim($_data['amount']);
		$record->type        = 1;
		$record->add_date        = date('Y-m-d',time());
		$record->rate        = trim($_data['rate']);
		$record->time_limit        = trim($_data['time_limit']);
		$record->finance_time        = trim($_data['finance_time']);
		$record->status        = (int)$_data['status'];
		$record->desc        = trim($_data['desc']);
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
	//创建项目预告
	public function noticeCreate(&$_data) {
		$id = 0;
		$infoData = array();
		$infoData['title']       = trim($_data['title']);
		$infoData['guarantee']        = trim($_data['guarantee']);
		$infoData['amount']        = trim($_data['amount']);
		$infoData['type']         = 1;
		$infoData['add_date']       = date('Y-m-d',time());
		$infoData['rate']         = trim($_data['rate']);
		$infoData['time_limit']   = trim($_data['time_limit']);
		$infoData['finance_time']     = strtotime(trim($_data['finance_time']));
		$infoData['status']   = (int)$_data['status'];
		$infoData['desc']   = trim($_data['desc']);

		$model = new CmsNoticeInvest();

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
