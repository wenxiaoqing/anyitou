<?php

/**
 * This is the model class for table "pledge_project".
 *
 * The followings are the available columns in table 'pledge_project':
 * @property string $id
 * @property string $user_id
 * @property integer $status
 * @property integer $loan_status
 * @property integer $repayment_status
 * @property string $apply_amount
 * @property double $apr
 * @property string $repayment_time
 * @property string $transaction_amount
 * @property integer $collection_days
 * @property string $applytime
 * @property string $confirm_time
 * @property string $verifytime
 * @property string $verify_remark
 */
class PledgeProject extends CActiveRecord
{
    
    public $username = '';
    public $realname = '';
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PledgeProject the static model class
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
		return 'pledge_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('applytime', 'required'),
			array('status, loan_status, repayment_status, collection_days', 'numerical', 'integerOnly'=>true),
			array('apr', 'numerical'),
			array('user_id', 'length', 'max'=>11),
			array('apply_amount, transaction_amount', 'length', 'max'=>10),
			array('verify_remark', 'length', 'max'=>500),
			array('number', 'length', 'max'=>50),
			array('repayment_time, confirm_time, verifytime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, status, number, loan_status, repayment_status, apply_amount, apr, repayment_time, transaction_amount, collection_days, applytime, confirm_time, verifytime, verify_remark', 'safe', 'on'=>'search'),
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
		    'number' => '项目编号',
		    'username' => '用户名',
		    'realname' => '真实姓名',
			'status' => '状态',
			'loan_status' => '放款状态',
			'repayment_status' => '还款状态',
			'apply_amount' => '申请金额',
			'apr' => '年化利率',
			'repayment_time' => '还款时间',
			'transaction_amount' => '成交金额',
			'collection_days' => '募集天数',
			'applytime' => '申请时间',
			'confirm_time' => '确认时间',
			'verifytime' => '审核时间',
			'verify_remark' => '审核备注',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('loan_status',$this->loan_status);
		$criteria->compare('repayment_status',$this->repayment_status);
		$criteria->compare('apply_amount',$this->apply_amount,true);
		$criteria->compare('apr',$this->apr);
		$criteria->compare('repayment_time',$this->repayment_time,true);
		$criteria->compare('transaction_amount',$this->transaction_amount,true);
		$criteria->compare('collection_days',$this->collection_days);
		$criteria->compare('applytime',$this->applytime,true);
		$criteria->compare('confirm_time',$this->confirm_time,true);
		$criteria->compare('verifytime',$this->verifytime,true);
		$criteria->compare('verify_remark',$this->verify_remark,true);
		$criteria->with = array('user');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ), 
		));
	}
}