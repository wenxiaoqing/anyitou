<?php

/**
 * This is the model class for table "item_info".
 *
 * The followings are the available columns in table 'item_info':
 * @property string $id
 * @property string $item_title
 * @property string $sub_title
 * @property string $number_id
 * @property string $category
 * @property string $company_id
 * @property string $pay_type
 * @property string $guarantee_type
 * @property integer $guarantee_id
 * @property double $rate_of_interest
 * @property double $reward_apr
 * @property double $scale
 * @property string $financing_amount
 * @property string $investment
 * @property string $over_amount
 * @property string $request_amount
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
 * @property string $addtime
 * @property integer $isrecommend
 */
class ItemInfos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemInfos the static model class
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
			array('item_title, sub_title, number_id, company_id, pay_type, guarantee_id, financing_amount, over_amount, repayment_time, delay, raise_begin_time, raise_delay, credit, invest_status, item_pic', 'required'),
			array('guarantee_id, delay, raise_delay, credit, status, invest_status, isrecommend', 'numerical', 'integerOnly'=>true),
			array('rate_of_interest, reward_apr, scale', 'numerical'),
			array('item_title, sub_title, pay_type', 'length', 'max'=>100),
			array('number_id, guarantee_type', 'length', 'max'=>50),
			array('category', 'length', 'max'=>6),
			array('company_id, financing_amount, investment, over_amount', 'length', 'max'=>10),
			array('request_amount', 'length', 'max'=>11),
			array('item_pic', 'length', 'max'=>255),
			array('begin_time, description, capital_opration, collateral_info, risk_control, desc_detail, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item_title, sub_title, number_id, category, company_id, pay_type, guarantee_type, guarantee_id, rate_of_interest, reward_apr, scale, financing_amount, investment, over_amount, request_amount, begin_time, repayment_time, delay, raise_begin_time, raise_delay, credit, status, invest_status, item_pic, description, capital_opration, collateral_info, risk_control, desc_detail, addtime, isrecommend', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'item_title' => 'Item Title',
			'sub_title' => 'Sub Title',
			'number_id' => 'Number',
			'category' => 'Category',
			'company_id' => 'Company',
			'pay_type' => 'Pay Type',
			'guarantee_type' => 'Guarantee Type',
			'guarantee_id' => 'Guarantee',
			'rate_of_interest' => 'Rate Of Interest',
			'reward_apr' => 'Reward Apr',
			'scale' => 'Scale',
			'financing_amount' => 'Financing Amount',
			'investment' => 'Investment',
			'over_amount' => 'Over Amount',
			'request_amount' => 'Request Amount',
			'begin_time' => 'Begin Time',
			'repayment_time' => 'Repayment Time',
			'delay' => 'Delay',
			'raise_begin_time' => 'Raise Begin Time',
			'raise_delay' => 'Raise Delay',
			'credit' => 'Credit',
			'status' => 'Status',
			'invest_status' => 'Invest Status',
			'item_pic' => 'Item Pic',
			'description' => 'Description',
			'capital_opration' => 'Capital Opration',
			'collateral_info' => 'Collateral Info',
			'risk_control' => 'Risk Control',
			'desc_detail' => 'Desc Detail',
			'addtime' => 'Addtime',
			'isrecommend' => 'Isrecommend',
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
		$criteria->compare('number_id',$this->number_id,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('pay_type',$this->pay_type,true);
		$criteria->compare('guarantee_type',$this->guarantee_type,true);
		$criteria->compare('guarantee_id',$this->guarantee_id);
		$criteria->compare('rate_of_interest',$this->rate_of_interest);
		$criteria->compare('reward_apr',$this->reward_apr);
		$criteria->compare('scale',$this->scale);
		$criteria->compare('financing_amount',$this->financing_amount,true);
		$criteria->compare('investment',$this->investment,true);
		$criteria->compare('over_amount',$this->over_amount,true);
		$criteria->compare('request_amount',$this->request_amount,true);
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
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('isrecommend',$this->isrecommend);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}