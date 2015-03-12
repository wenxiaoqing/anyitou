<?php

/**
 * This is the model class for table "user_bank_funds".
 *
 * The followings are the available columns in table 'user_bank_funds':
 * @property string $id
 * @property integer $user_id
 * @property string $bank_id
 * @property string $bank_address
 * @property string $bank_card_no
 */
class UserBankFunds extends CActiveRecord
{
	public $user_name;
	public $bank_name;


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserBankFunds the static model class
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
		return 'user_bank_funds';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('user_id, bank_id, bank_address, bank_card_no', 'required'),
				array('user_id', 'numerical', 'integerOnly'=>true),
				array('bank_id', 'length', 'max'=>10),
				array('bank_address', 'length', 'max'=>255),
				array('bank_card_no', 'length', 'max'=>30),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, user_id, bank_id,user_name,bank_name,bank_address, bank_card_no', 'safe', 'on'=>'search'),
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
				'bankInfo'=>array(self::BELONGS_TO,'BankInfo','bank_id'),
				'user'=>array(self::BELONGS_TO,'User','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ID',
				'user_id' => '用户名',
				'user_name'=>'用户名',
				'bank_id' => '开户行',
				'bank_name'=>'开户行',
				'bank_address' => '开户行地址',
				'bank_card_no' => '开户卡号',
		);
	}
	/**
	 * 	获得开户行名字
	 *
	 */
	public function getBankId(){
		$key = $this->bank_id;
		return $this->bankIdAttrs[$key];
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('bank_id',$this->bank_id,true);
		$criteria->compare('bank_address',$this->bank_address,true);
		$criteria->compare('bank_card_no',$this->bank_card_no,true);
		$criteria->compare('user.user_name',$this->user_name,true);
		$criteria->compare('bankInfo.name',$this->bank_name,true);
		$criteria->with=array('bankInfo','user');
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}