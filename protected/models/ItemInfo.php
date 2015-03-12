<?php

/**
 * This is the model class for table "item_info".
 *
 * The followings are the available columns in table 'item_info':
 * @property string $id
 * @property string $item_title
 * @property string $sub_title
 * @property integer $category
 * @property string $company_id
 * @property string $pay_type
 * @property string $guarantee_type
 * @property integer $guarantee_id
 * @property double $rate_of_interest
 * @property double $scale
 * @property string $financing_amount
 * @property string $investment
 * @property string $over_amount
 * @property string $begin_time
 * @property string $repayment_time
 * @property integer $delay
 * @property string $raise_begin_time
 * @property integer $raise_delay
 * @property integer $credit
 * @property integer $status
 * @property integer $invest_status
 * @property string $item_pic
 * @property string $description
 * @property string $capital_opration
 * @property string $collateral_info
 * @property string $risk_control
 * @property string $desc_detail
 * @property integer $isrecommend
 * @property string $addtime
 */
class ItemInfo extends CActiveRecord
{
    
    // 还款方式
    public $paytypeArrs = array(
        '1' => '当日投资，当日计息，每日付息，到期还本',
        '2' => '当日投资，当日计息，按月付息，到期还本',
    );
    // 融资状态
    public $investStatusArrs = array(
    	''=>'',
        '0' => '未开始',
        '1' => '正在融资',
    	'2' => '融资完成',
        '3' => '正在还款',
        '4' => '还款完成',
    );

    // 分类
    public $categoryArrs = array(
    	'chedai' => '安车贷',
		'fangdai' => '安房贷',
        'invest' => '安企贷',
        'reward' => '新手项目',
    );
    
    //是否推荐
    public $isrecommendArrs = array(
    	'1'=>'推荐',	
    	'0'=>'不推荐',
    );
    //项目状态
    public $statusArrs = array(
    		'0' => '不可用',
    		'1' => '可用',
    );
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('item_title, sub_title, category, company_id, pay_type, guarantee_id, rate_of_interest, financing_amount, over_amount, repayment_time, delay, raise_begin_time, raise_delay, credit, invest_status, item_pic', 'required'),
			array('number_id, rate_of_interest, reward_apr, financing_amount, repayment_time, raise_delay ', 'required', 'message'=>'{attribute}不能为空'),
			array('borrower_user_id,evaluation_company_id,guarantee_id, delay, raise_delay, credit, status, invest_status, isrecommend', 'numerical', 'integerOnly'=>true),
			array('category', 'length', 'max'=>20),
			array('rate_of_interest, reward_apr, scale, credito_amount', 'numerical'),
			array('reward_apr', 'default', 'value' => 0), 
			array('item_title, sub_title, number_id, pay_type', 'length', 'max'=>100),
			array('company_id, financing_amount, investment, over_amount', 'length', 'max'=>10),
			array('guarantee_type', 'length', 'max'=>50),
			array('item_pic', 'length', 'max'=>255),
			array('credit, begin_time, raise_begin_time, description, capital_opration, collateral_info, risk_control, desc_detail, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item_title,pay_type, sub_title, category, company_id, pay_type, guarantee_type, guarantee_id, rate_of_interest, scale, financing_amount, investment, over_amount, begin_time, repayment_time, delay, raise_begin_time, raise_delay, credit, status, invest_status, item_pic, description, capital_opration, collateral_info, risk_control, desc_detail, isrecommend, addtime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'company'=>array(self::BELONGS_TO,'FinancingCompany','company_id'),		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'item_title' => '项目名称',
			'sub_title' => '副标题',
		    'number_id' => '项目编号',
			'category' => '项目类型',
			'company_id' => '借款企业',
			'pay_type' => '还款方式',
			'guarantee_type' => '担保方式',
			'guarantee_id' => '担保公司',
			'rate_of_interest' => '年化率',
		    'reward_apr' => '奖励年化率',
			'scale' => '融资进度',
			'financing_amount' => '融资金额',
		    'credito_amount' => '债权金额',
			'investment' => '起投金额',
			'over_amount' => '已投金额',
			'begin_time' => '开始时间',
			'repayment_time' => '还款时间',
			'delay' => '持续时间',
			'raise_begin_time' => '募集开始时间',
			'raise_delay' => '募集持续时间',
			'credit' => '信用等级',
			'status' => '项目状态',
			'invest_status' => '项目状态',
			'item_pic' => '项目图片',
			'description' => '项目简介',
			'capital_opration' => '资金用途', //'资金运转',
			'collateral_info' => '抵押物信息',
			'risk_control' => '风险控制',
			'desc_detail' => '项目详情',
			'isrecommend' => '推荐状态',
			'addtime' => '添加时间',
			'borrower_user_id'=>'借款人',
			'pay_type'=>'还款方式',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('t.id',$this->id);
		$criteria->compare('item_title',$this->item_title,true);
		$criteria->compare('sub_title',$this->sub_title,true);
		$criteria->compare('number_id',$this->sub_title,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('pay_type',$this->pay_type,true);
		$criteria->compare('guarantee_type',$this->guarantee_type,true);
		$criteria->compare('guarantee_id',$this->guarantee_id);
		$criteria->compare('rate_of_interest',$this->rate_of_interest);
		$criteria->compare('scale',$this->scale);
		$criteria->compare('financing_amount',$this->financing_amount,true);
		$criteria->compare('investment',$this->investment,true);
		$criteria->compare('over_amount',$this->over_amount,true);
		$criteria->compare('begin_time',$this->begin_time,true);
		$criteria->compare('repayment_time',$this->repayment_time,true);
		$criteria->compare('delay',$this->delay);
		$criteria->compare('raise_begin_time',$this->raise_begin_time,true);
		$criteria->compare('raise_delay',$this->raise_delay);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('status',$this->status);
		$criteria->compare('invest_status',$this->invest_status);
		$criteria->compare('item_pic',$this->item_pic,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('capital_opration',$this->capital_opration,true);
		$criteria->compare('collateral_info',$this->collateral_info,true);
		$criteria->compare('risk_control',$this->risk_control,true);
		$criteria->compare('desc_detail',$this->desc_detail,true);
		$criteria->compare('isrecommend',$this->isrecommend);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('evaluation_company_id',$this->evaluation_company_id,true);
		$criteria->compare('pay_type',$this->pay_type,true);
		$criteria->with='company';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
     * 
     * 获取所有还款方式
     */
    public function getPayTypes()
    {
        return $this->paytypeArrs;
    }
    
    /**
     * 
     * 获取还款方式
     * @param number $typeid
     */
    public function getPayType($key)
    {
        if(!isset($this->paytypeArrs[$key])) {
            return array();
        }
        return $this->paytypeArrs[$key];
    }
    
    /**
     * 
     * 获取所有融资状态
     */
    public function getInvestStatuses()
    {
        return $this->invest_status;
    }

    /**
     * 
     * 获取融资状态
     * @param number $value
     */
    public function getInvestStatus($key)
    {
        if(!isset($this->investStatusArrs[$key])) {
            return '';
        }
        return $this->investStatusArrs[$key];
    }
	
    /**
     * 项目状态
     */
    
 	public function getStatus($key)
    {
    	if(!isset($this->statusArrs[$key]))
    	{
    		return '';
    	}
        return $this->statusArrs[$key];
    }
}
