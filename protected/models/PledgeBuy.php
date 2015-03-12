<?php

/**
 * This is the model class for table "pledge_buy".
 *
 * The followings are the available columns in table 'pledge_buy':
 * @property string $id
 * @property string $user_id
 * @property string $project_id
 * @property string $trade_no
 * @property integer $status
 * @property integer $loan_status
 * @property integer $repayment_status
 * @property string $amount
 * @property string $interest
 * @property string $repayed_capital
 * @property string $payed_interest
 * @property string $buytime
 * @property string $response_data
 */
class PledgeBuy extends CActiveRecord
{
    
    public $username = '';
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PledgeBuy the static model class
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
		return 'pledge_buy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('response_data', 'required'),
			array('status, loan_status, repayment_status', 'numerical', 'integerOnly'=>true),
			array('user_id, project_id', 'length', 'max'=>11),
			array('trade_no', 'length', 'max'=>50),
			array('amount, interest, repayed_capital, payed_interest', 'length', 'max'=>10),
			array('buytime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, project_id, trade_no, status, loan_status, repayment_status, amount, interest, repayed_capital, payed_interest, buytime, response_data', 'safe', 'on'=>'search'),
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
		    "user"   =>  array(self::BELONGS_TO, 'User', 'user_id'),
		    "project"   =>  array(self::BELONGS_TO, 'PledgeProject', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => '用户ID',
		    'username' => '用户名',
			'project_id' => '项目ID',
			'trade_no' => '订单号',
			'status' => '状态',
			'loan_status' => '放款状态',
			'repayment_status' => '还款状态',
			'amount' => '认购金额',
			'interest' => '预期收益',
			'repayed_capital' => '已还本金',
			'payed_interest' => '已付利息',
			'buytime' => '认购时间',
			'response_data' => '响应数据',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('trade_no',$this->trade_no,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('loan_status',$this->loan_status);
		$criteria->compare('repayment_status',$this->repayment_status);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('interest',$this->interest,true);
		$criteria->compare('repayed_capital',$this->repayed_capital,true);
		$criteria->compare('payed_interest',$this->payed_interest,true);
		$criteria->compare('buytime',$this->buytime,true);
		$criteria->compare('response_data',$this->response_data,true);
		$criteria->with = array('user');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}