<?php

/**
 * This is the model class for table "pledge_repayment".
 *
 * The followings are the available columns in table 'pledge_repayment':
 * @property string $id
 * @property string $buy_id
 * @property string $user_id
 * @property string $project_id
 * @property string $trade_no
 * @property integer $status
 * @property string $type
 * @property string $value_time
 * @property string $repay_time
 * @property string $amount
 * @property string $datetime
 * @property string $reponse_data
 */
class PledgeRepayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PledgeRepayment the static model class
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
		return 'pledge_repayment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('datetime, reponse_data', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('buy_id, user_id, project_id', 'length', 'max'=>11),
			array('trade_no', 'length', 'max'=>50),
			array('type', 'length', 'max'=>8),
			array('amount', 'length', 'max'=>10),
			array('value_time, repay_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, buy_id, user_id, project_id, trade_no, status, type, value_time, repay_time, amount, datetime, reponse_data', 'safe', 'on'=>'search'),
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
			'buy_id' => 'Buy',
			'user_id' => 'User',
			'project_id' => 'Project',
			'trade_no' => 'Trade No',
			'status' => 'Status',
			'type' => 'Type',
			'value_time' => 'Value Time',
			'repay_time' => 'Repay Time',
			'amount' => 'Amount',
			'datetime' => 'Datetime',
			'reponse_data' => 'Reponse Data',
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
		$criteria->compare('buy_id',$this->buy_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('trade_no',$this->trade_no,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('value_time',$this->value_time,true);
		$criteria->compare('repay_time',$this->repay_time,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('reponse_data',$this->reponse_data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}