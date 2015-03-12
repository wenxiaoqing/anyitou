<?php

/**
 * This is the model class for table "pledge_loans".
 *
 * The followings are the available columns in table 'pledge_loans':
 * @property string $id
 * @property string $buy_id
 * @property string $project_id
 * @property string $trade_no
 * @property string $sub_trade_no
 * @property string $out_user_id
 * @property string $in_user_id
 * @property string $amount
 * @property integer $status
 * @property string $datetime
 * @property string $response_data
 */
class PledgeLoans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PledgeLoans the static model class
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
		return 'pledge_loans';
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
			array('status', 'numerical', 'integerOnly'=>true),
			array('buy_id, project_id, out_user_id, in_user_id', 'length', 'max'=>11),
			array('trade_no, sub_trade_no', 'length', 'max'=>50),
			array('amount', 'length', 'max'=>10),
			array('datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, buy_id, project_id, trade_no, sub_trade_no, out_user_id, in_user_id, amount, status, datetime, response_data', 'safe', 'on'=>'search'),
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
			'project_id' => 'Project',
			'trade_no' => 'Trade No',
			'sub_trade_no' => 'Sub Trade No',
			'out_user_id' => 'Out User',
			'in_user_id' => 'In User',
			'amount' => 'Amount',
			'status' => 'Status',
			'datetime' => 'Datetime',
			'response_data' => 'Response Data',
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
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('trade_no',$this->trade_no,true);
		$criteria->compare('sub_trade_no',$this->sub_trade_no,true);
		$criteria->compare('out_user_id',$this->out_user_id,true);
		$criteria->compare('in_user_id',$this->in_user_id,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('response_data',$this->response_data,true);
		//$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}