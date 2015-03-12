<?php

/**
 * This is the model class for table "coupon_class".
 *
 * The followings are the available columns in table 'coupon_class':
 * @property integer $id
 * @property string $name
 * @property string $pic_link
 * @property string $category
 * @property string $price
 * @property string $begin_time
 * @property integer $delay
 * @property integer $num
 * @property string $descript
 * @property integer $status
 * @property integer $part_use
 */

class CouponClass extends CActiveRecord
{
	
	public $categoryAttrs = array(
			'cash'=>'现价券', 'interest'=>'返利券', 'draw'=>'提现券', "rebate" => "返利券",
	);
	
	public $statusAttrs=array(
		'0'=>'无效', '1'=>'有效', '2'=>'过期',
	);
	public $partUseAttrs=array(
		'0'=>'否','1'=>'是',		
	);
	
	public $addupAttrs=array(
		'0'=>'否','1'=>'能',		
	);
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CouponClass the static model class
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
		return 'coupon_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category, price, delay', 'required'),
			array('delay, num, status, part_use', 'numerical', 'integerOnly'=>true),
			array('name, pic_link,small_pic_link','length', 'max'=>200),
			array('category, price', 'length', 'max'=>8),
			array('begin_time, descript', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, use_rules,addup_use,category,price, begin_time, delay, num, descript, status, part_use', 'safe', 'on'=>'search'),
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
			'name' => '优惠券名称',
			'pic_link' => '图片地址',
			'category' => '分类',
			'price' => '券面价值',
			'begin_time' => '开始时间',
			'delay' => '持续时间',
			'num' => '数量',
			'descript' => '描述',
			'status' => '状态',
			'part_use' => '部分使用',
			'use_rules'=>'使用规则',
			'small_pic_link'=>'小图地址',
			'addup_use'=>'叠加使用',
		);
	}
	
	public function getCategory($value = '')
	{
		if(empty($value)) {
			$value = $this->category;
		}
		return $this->categoryAttrs[$value];
	}
	
	public function getBaseStatus($value = '')
	{
		if(empty($value)) {
			$value = $this->status;
		}
		return $this->statusAttrs[$value];
	}
	
	public function getPartUse($value = '')
	{
		if(empty($value)) {
			$value = $this->part_use;
		}
		return $this->partUseAttrs[$value];
	}
	
	public function getAddup($value='')
	{
		if(empty($value)){
			$value=$this->addup_use;
		}
		return $this->addupAttrs[$value];
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
		$criteria->compare('category',$this->category,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('begin_time',$this->begin_time,true);
		$criteria->compare('delay',$this->delay);
		$criteria->compare('num',$this->num);
		$criteria->compare('descript',$this->descript,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('part_use',$this->part_use);
		$criteria->compare('use_rules',$this->use_rules);
		$criteria->compare('addup_use',$this->addup_use);
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'sort'=>array(
						'defaultOrder'=>'id DESC',
				),
				'pagination'=>array(
						'pageSize' => 10,
				),
		));
	}
}