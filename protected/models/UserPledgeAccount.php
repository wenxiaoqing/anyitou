<?php

/**
 * This is the model class for table "user_pledge_account".
 *
 * The followings are the available columns in table 'user_pledge_account':
 * @property integer $id
 * @property integer $user_id
 * @property string $borrow_amount
 * @property string $interest_payable
 * @property string $apply_amount
 */
class UserPledgeAccount extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserPledgeAccount the static model class
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
		return 'user_pledge_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('borrow_amount, interest_payable, apply_amount', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, borrow_amount, interest_payable, apply_amount', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'borrow_amount' => 'Borrow Amount',
			'interest_payable' => 'Interest Payable',
			'apply_amount' => 'Apply Amount',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('borrow_amount',$this->borrow_amount,true);
		$criteria->compare('interest_payable',$this->interest_payable,true);
		$criteria->compare('apply_amount',$this->apply_amount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}