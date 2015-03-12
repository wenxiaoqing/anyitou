<?php

/**
 * This is the model class for table "debt_invest_log".
 *
 * The followings are the available columns in table 'debt_invest_log':
 * @property string $id
 * @property string $invest_id
 * @property string $user_id
 * @property string $seller_user_id
 * @property string $debt_id
 * @property string $debt_invest_id
 * @property string $item_id
 * @property string $trade_no
 * @property string $amount
 * @property string $real_amount
 * @property string $price
 * @property string $fee
 * @property string $agreement_id
 * @property integer $status
 * @property string $addtime
 * @property string $pay_time
 */
class DebtInvestLog extends CActiveRecord
{
	public $seller_user;
	public $user_name;
	public $item_title;
	public $statusAttrs=array('0'=>'未成功','1'=>'成功');
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DebtInvestLog the static model class
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
		return 'debt_invest_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('addtime', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('invest_id, user_id, seller_user_id, debt_invest_id', 'length', 'max'=>11),
			array('debt_id, item_id, amount, real_amount, price, fee', 'length', 'max'=>10),
			array('trade_no', 'length', 'max'=>50),
			array('agreement_id', 'length', 'max'=>30),
			array('pay_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invest_id, user_id, seller_user_id, debt_id, debt_invest_id, item_id, trade_no, amount, real_amount, price, fee, agreement_id, status, addtime, pay_time', 'safe', 'on'=>'search'),
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
			'item_info'=>array(self::BELONGS_TO,'ItemInfo','item_id'),	
			'user'=>array(self::BELONGS_TO,'User','user_id'),
			'seller'=>array(self::BELONGS_TO,'User','seller_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'invest_id' => '投资ID',
			'user_id' => '认购人',
			'seller_user_id' => '出让人',
			'debt_id' => '债券号',
			'debt_invest_id' => '原债券投资ID',
			'item_id' => '项目名',
			'trade_no' => '订单号',
			'amount' => '认购金',
			'real_amount' => '实际转让金',
			'price' => '认购价格',
			'fee' => '手续费',
			'agreement_id' => 'Agreement',
			'status' => '状态',
			'addtime' => '添加时间',
			'pay_time' => '支付时间',
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

		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.invest_id',$this->invest_id,true);
		$criteria->compare('t.user_id',$this->user_id,true);
		$criteria->compare('t.seller_user_id',$this->seller_user_id,true);
		$criteria->compare('t.debt_id',$this->debt_id,true);
		$criteria->compare('t.debt_invest_id',$this->debt_invest_id,true);
		$criteria->compare('t.item_id',$this->item_id,true);
		$criteria->compare('t.trade_no',$this->trade_no,true);
		$criteria->compare('t.amount',$this->amount,true);
		$criteria->compare('t.real_amount',$this->real_amount,true);
		$criteria->compare('t.price',$this->price,true);
		$criteria->compare('t.fee',$this->fee,true);
		$criteria->compare('t.agreement_id',$this->agreement_id,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.addtime',$this->addtime,true);
		$criteria->compare('t.pay_time',$this->pay_time,true);
		$criteria->compare('user.user_name',$this->user_name,true);
		$criteria->compare('seller.user_name',$this->seller_user,true);
		$criteria->compare('item_info.item_title',$this->item_title,true);
		$criteria->with=array('item_info','seller','user');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
            'pagination'=>array(
                'pageSize' => 20,
            ),
		));
	}
	
	public function getStatus($status)
	{
		if(empty($status)){
			$value=$this->status;
		}
		
		return $this->statusAttrs[$value];
		
	}
}