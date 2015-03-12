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
 * @property string $anaiysis
 * @property string $risk_control
 * @property string $desc_detail
 * @property integer $isrecommend
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
			array('item_title, sub_title, category, company_id, pay_type, guarantee_id, rate_of_interest, reward_apr, financing_amount, over_amount, repayment_time, delay, raise_begin_time, raise_delay, credit, invest_status, item_pic', 'required'),
			array('category, guarantee_id, delay, raise_delay, credit, status, invest_status, isrecommend', 'numerical', 'integerOnly'=>true),
			array('rate_of_interest, reward_apr, scale', 'numerical'),
			array('reward_apr', 'default', 'value' => 0.5), 
			array('item_title, sub_title, pay_type', 'length', 'max'=>100),
			array('company_id, financing_amount, investment, over_amount', 'length', 'max'=>10),
			array('guarantee_type', 'length', 'max'=>50),
			array('item_pic', 'length', 'max'=>255),
			array('begin_time', 'default', 'value' => date('Y-m-d')),
			array('begin_time, description, capital_opration, risk_control, desc_detail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item_title, sub_title, category, company_id, pay_type, guarantee_type, guarantee_id, rate_of_interest, scale, financing_amount, investment, over_amount, begin_time, repayment_time, delay, raise_begin_time, raise_delay, credit, status, invest_status, item_pic, description, capital_opration, risk_control, desc_detail, isrecommend', 'safe', 'on'=>'search'),
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
			'company'=>array(self::HAS_ONE,'FinancingCompany','id'),		
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
			'category' => '类别',
			'company_id' => '企业ID',
			'pay_type' => '还款方式',
			'guarantee_type' => '担保方式',
			'guarantee_id' => '担保公司ID',
			'rate_of_interest' => '年化率',
			'scale' => '融资进度',
			'financing_amount' => '融资金额',
			'investment' => '起投金额',
			'over_amount' => '已投金额',
			'begin_time' => '开始时间',
			'repayment_time' => '还款时间',
			'delay' => '持续时间',
			'raise_begin_time' => '募集开始时间',
			'raise_delay' => '募集持续时间',
			'credit' => '信用等级',
			'status' => '状态',
			'invest_status' => '投资状态',
			'item_pic' => '项目图片',
			'description' => '项目简介',
			'capital_opration' => '资金用途', //'资金运转',
			//'anaiysis' => 'Anaiysis',
			'risk_control' => '风险控制',
			'desc_detail' => '项目详情',
			'isrecommend' => '推荐状态',
			'addtime' => '添加时间',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('item_title',$this->item_title,true);
		$criteria->compare('sub_title',$this->sub_title,true);
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
		//$criteria->compare('anaiysis',$this->anaiysis,true);
		$criteria->compare('risk_control',$this->risk_control,true);
		$criteria->compare('desc_detail',$this->desc_detail,true);
		$criteria->compare('isrecommend',$this->isrecommend);
		$criteria->with = 'company';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}