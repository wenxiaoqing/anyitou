<?php

/**
 * This is the model class for table "ayt_account_transfer_records".
 *
 * The followings are the available columns in table 'ayt_account_transfer_records':
 * @property integer $id
 * @property string $trade_no
 * @property string $account_id
 * @property string $amount
 * @property integer $stauts
 * @property string $transfer_time
 * @property string $response
 */
class AytAccountTransferRecords extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AytAccountTransferRecords the static model class
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
		return 'ayt_account_transfer_records';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transfer_time, response', 'required'),
			array('stauts', 'numerical', 'integerOnly'=>true),
			array('trade_no, account_id', 'length', 'max'=>50),
			array('amount', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, trade_no, account_id, amount, stauts, transfer_time, response', 'safe', 'on'=>'search'),
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
			'trade_no' => 'Trade No',
			'account_id' => 'Account',
			'amount' => 'Amount',
			'stauts' => 'Stauts',
			'transfer_time' => 'Transfer Time',
			'response' => 'Response',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('trade_no',$this->trade_no,true);
		$criteria->compare('account_id',$this->account_id,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('stauts',$this->stauts);
		$criteria->compare('transfer_time',$this->transfer_time,true);
		$criteria->compare('response',$this->response,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}