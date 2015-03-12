<?php

class ItemInfoForm extends CFormModel
{
	public $id;
	public $item_title;
	public $sub_title;
	public $number_id;
	public $category;
	public $company_id;
	public $pay_type;
	public $guarantee_type;
	public $guarantee_id;
	public $rate_of_interest;
	public $scale;
	public $financing_amount;
	public $investment;
	public $over_amount;
	public $begin_time;
	public $repayment_time;
	public $delay;
	public $raise_begin_time;
	public $raise_delay;
	public $credit;
	public $status;
	public $invest_status;
	public $item_pic;
	public $description;
	public $capital_opration;
	public $collateral_info;
	public $risk_control;
	public $desc_detail;
	public $isrecommend;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that login and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			//array('item_title, company_id, financing_amount, rate_of_interest, repayment_time, raise_delay', 'required', 'message'=>'{attribute}不能为空'),
			array('item_title, sub_title, number_id, category, company_id, pay_type, guarantee_id, rate_of_interest, financing_amount, repayment_time, raise_delay, credit', 'required','message'=>'{attribute}不能为空'),
			array('category, guarantee_id, delay, raise_delay, credit, status, invest_status, isrecommend, over_amount, delay, invest_status', 'numerical', 'integerOnly'=>true),
			array('rate_of_interest, scale', 'numerical'),
			array('item_title, sub_title, pay_type', 'length', 'max'=>100),
			array('company_id, financing_amount, investment, over_amount', 'length', 'max'=>10),
			array('guarantee_type', 'length', 'max'=>50),
			array('item_pic', 'length', 'max'=>255),
			array('begin_time, description, capital_opration, collateral_info, risk_control, desc_detail', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'item_title' => '项目名称',
			'sub_title' => '副标题',
		    'number_id' => '项目编号',
			'company_id' => '企业id',
			'financing_amount' => '融资金额',
			'investment' => '起投金额',
			'rate_of_interest' => '年化收益率',
			'repayment_time' => '还款时间',
			'invest_status' => '投资状态',
			'raise_delay' => '募集持续时间',
			'item_pic' => '项目图片',
			'description' => '项目简介',
			'capital_opration' => '资金运转',
			'collateral_info' => '抵押物信息',
			'risk_control' => '风险控制',
			'desc_detail' => '项目详情',
			'isrecommend' => '推荐状态',
		);
	}

	/**
	 * Logs in the user using the given login and password in the model.
	 * @return boolean whether login is successful
	 */
	public function create()
    {
		$data = array();
		$data['item_title']       = trim($this->attributes['item_title']);
		$data['sub_title']        = trim($this->attributes['sub_title']);
		$data['number_id']        = trim($this->attributes['number_id']);
		$data['category']         = $this->attributes['category'];
		$data['user_id']	      = $this->attributes['user_id'];
		$data['company_id']       = $this->attributes['company_id'];
		$data['pay_type']         = $this->attributes['pay_type'];
		$data['guarantee_type']   = $this->attributes['guarantee_type'];
		$data['guarantee_id']     = $this->attributes['guarantee_id'];
		$data['rate_of_interest'] = substr(sprintf('%.3f', $this->attributes['rate_of_interest']), 0, -1);
		$data['scale']            = 0;
		$data['financing_amount'] = intval($this->attributes['rate_of_interest']);
		$data['investment']       = $this->attributes['investment'];
		$data['over_amount']      = '0';
		//$data['begin_time']       = $this->attributes['begin_time'];
		$data['repayment_time']   = $this->attributes['repayment_time'];
		$data['delay']            = '0';
		$data['raise_begin_time'] = '0';
		$data['raise_delay']      = $this->attributes['raise_delay'];
		$data['credit']           = $this->attributes['credit'];
		$data['status']           = '0';
		$data['invest_status']    = '0';
		$data['item_pic']         = $this->attributes['item_pic'];
		$data['description']      = $this->attributes['description'];
		$data['capital_opration'] = $this->attributes['capital_opration'];
		$data['collateral_info']         = $this->attributes['collateral_info'];
		$data['risk_control']     = $this->attributes['risk_control'];
		$data['desc_detail']      = $this->attributes['desc_detail'];
		$data['isrecommend']      = '0';
		$data['addtime']          = date('Y-m-d H:i:s');

		$ProjectClass = new ProjectClass();

		return $ProjectClass->create($data);
	}
	
}