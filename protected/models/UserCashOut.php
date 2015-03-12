<?php

/**
 * This is the model class for table "user_cash_out".
 *
 * The followings are the available columns in table 'user_cash_out':
 * @property string $id
 * @property string $user_id
 * @property integer $bank_id
 * @property string $card_no
 * @property string $cash_out_amount
 * @property string $get_cash
 * @property string $befor_amount
 * @property string $after_amount
 * @property string $fee
 * @property integer $status
 * @property string $cash_out_time
 * @property string $desc
 */
class UserCashOut extends CActiveRecord
{
    
    public $username;
    public $realname;
    
    public $statusDict = array('0' => '未确认', '1' => '成功', '2' => '失败',);
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserCashOut the static model class
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
		return 'user_cash_out';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, bank_id, card_no', 'required'),
			array('bank_id, status', 'numerical', 'integerOnly'=>true),
			array('user_id, cash_out_amount, get_cash, befor_amount, after_amount', 'length', 'max'=>10),
			array('trade_no, card_no, desc', 'length', 'max'=>255),
			array('fee', 'length', 'max'=>6),
			array('cash_out_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, trade_no, user_id, bank_id, card_no, cash_out_amount, get_cash, befor_amount, after_amount, fee, status, cash_out_time, desc', 'safe', 'on'=>'search'),
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
			'trade_no' => '订单号',
		    'username' => '用户名',
		    'realname' => '真实姓名',
			'bank_id' => '提现银行',
			'card_no' => '银行卡号',
			'cash_out_amount' => '提现金额',
			'get_cash' => '实际到账金额',
			'befor_amount' => 'Befor Amount',
			'after_amount' => 'After Amount',
			'fee' => '手续费',
			'status' => '状态',
			'cash_out_time' => '提现日期',
			'desc' => '备注',
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
		$criteria->compare('user.user_name',$this->username, true);
		$criteria->compare('user.real_name',$this->realname, true);
		$criteria->compare('bank_id',$this->bank_id);
		$criteria->compare('card_no',$this->card_no);
		$criteria->compare('status',$this->status);
		$criteria->compare('cash_out_time',$this->cash_out_time,true);
		$criteria->with = array('user',);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
		));
	}
	
    public function getStatus($status)
	{
	    if(isset($this->statusDict[$status])) {
	        return $this->statusDict[$status];
	    } else {
	        return '';
	    }
	}
	
}