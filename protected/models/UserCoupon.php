<?php

/**
 * This is the model class for table "user_coupon".
 *
 * The followings are the available columns in table 'user_coupon':
 * @property integer $id
 * @property integer $user_id
 * @property integer $coupon_id
 * @property string $give_time
 * @property integer $use_status
 * @property string $used_money
 * @property integer $item_id
 * @property string $use_time
 * @property string $begin_time
 * @property string $end_time
 */
class UserCoupon extends CActiveRecord
{
	public $user_name;
     public $coupon_name;
     public $item_name;
	
	public $baseStatusAttrs = array(
			'0' => '未使用', '1' => '已使用', '2' => '已过期',
	);
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserCoupon the static model class
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
		return 'user_coupon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, coupon_id, use_status, used_money', 'required'),
			array(' use_status,source_id,source_type', 'numerical', 'integerOnly'=>true),
			array('used_money','length', 'max'=>5),
			array('use_time, begin_time, end_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, coupon_id, give_time, use_status, used_money, item_name, user_name,coupon_name,use_time, begin_time, end_time', 'safe', 'on'=>'search'),
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
			'user'   =>  array(self::BELONGS_TO, 'User', 'user_id'),
			'couponClass'   =>  array(self::BELONGS_TO, 'CouponClass', 'coupon_id'),
			'itemInfo'=>array(self::BELONGS_TO,'ItemInfo','item_id'),
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
			'coupon_id' => '优惠券',
			'user_name'=>'用户名',
			'coupon_name'=>'优惠券',
			'give_time' => '发放时间',
			'use_status' => '使用状态',
			'used_money' => '使用金额',
			'item_id' => '项目名称',
			'item_name'=>'项目名称',
			'use_time' => '使用时间',
			'begin_time' => '开始时间',
			'end_time' => '结束时间',
			'source_type'=>'来源类型',
			'source_id'=>'来源',
		);
	}

	
	public function getBaseStatus($value = '')
	{
		if(empty($value)) {
			$value = $this->use_status;
		}
		return $this->baseStatusAttrs[$value];
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
		$criteria->compare('t.user_id',$this->user_id,true);
		$criteria->compare('t.coupon_id',$this->coupon_id);
		$criteria->compare('t.give_time',$this->give_time,true);
		$criteria->compare('t.use_status',$this->use_status);
		$criteria->compare('t.used_money',$this->used_money,true);
		$criteria->compare('t.item_id',$this->item_id);
		$criteria->compare('t.use_time',$this->use_time,true);
		$criteria->compare('t.begin_time',$this->begin_time,true);
		$criteria->compare('t.end_time',$this->end_time,true);
		$criteria->compare('t.source_type',$this->source_type,true);
		$criteria->compare('t.source_id',$this->source_id,true);
		$criteria->compare('user.user_name', $this->user_name,true);
		$criteria->compare('couponClass.name', $this->coupon_name);
		$criteria->compare('itemInfo.item_title', $this->item_name,true);
		$criteria->with=array('itemInfo','user','couponClass');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
            'pagination'=>array(
                'pageSize' => 10,
            ),
		));
	}
}