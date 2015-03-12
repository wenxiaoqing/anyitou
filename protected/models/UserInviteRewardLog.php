<?php

/**
 * This is the model class for table "user_invite_reward_log".
 *
 * The followings are the available columns in table 'user_invite_reward_log':
 * @property integer $id
 * @property integer $invite_id
 * @property integer $invest_id
 * @property integer $status
 * @property string $amount
 * @property string $reward_time
 */
class UserInviteRewardLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserInviteRewardLog the static model class
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
		return 'user_invite_reward_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reward_time', 'required'),
			array('invite_id, invest_id, status', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invite_id, invest_id, status, amount, reward_time', 'safe', 'on'=>'search'),
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
			'invite_id' => 'Invite',
			'invest_id' => 'Invest',
			'status' => 'Status',
			'amount' => 'Amount',
			'reward_time' => 'Reward Time',
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
		$criteria->compare('invite_id',$this->invite_id);
		$criteria->compare('invest_id',$this->invest_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('reward_time',$this->reward_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}