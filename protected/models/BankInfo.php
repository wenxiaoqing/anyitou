<?php
/*
 * This is the model class for table "bank_info".
*
* The followings are the available columns in table 'bank_info':
* @property string $id
* @property string $name
* @property string $abbr
* @property string $used_recharge
* @property string $used_withdraw
* @property string $add_time
*
*
**/

class BankInfo extends CActiveRecord{

	public $usedRechargeAttrs = array(
			'0' => '可用于冲值',
			 '1' => '不可用于充值',
	);
	public $usedWithdrawAttrs = array(
			'0'=>'能用于提现',
			'1'=>'不能用于提现',
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
		return 'bank_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){

		return array(
				array('name, abbr, bank_address, used_recharge,used_withdraw,add_time','required'),
				array('used_recharge', 'used_withdraw', 'integerOnly'=>true),
				array('bank_address','name','length', 'max'=>255),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, name, used_recharge, bank_address,used_withdraw', 'safe', 'on'=>'search'),
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
				'name' => '银行名字',
				'abbr' => '字母缩写',
				'used_recharge' => '是否可用于充值',
				'used_withdraw' => '是否可用于体现',
				'add_time'=>'添加时间',
		);
	}

	/**
	 *获得是否可用户冲值 状态
	 *
	 */
	public function getUsedRecharge(){

		$key = $this-> used_recharge;
		return $this->usedRechargeAttrs[$key];
	}

	/**
	 *
	 * 获得是否可用于体现
	 *
	 */

	public function getUsedWithdraw(){

		$key = $this->used_withdraw;
		return $this->usedWithdrawAttrs[$key];

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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('abbr',$this->abbr,true);
		$criteria->compare('used_recharge',$this->used_recharge,true);
		$criteria->compare('used_withdraw',$this->used_withdraw);
		return new CActiveDataProvider($this,array(
				'criteria'=>$criteria,
		));
	}

}