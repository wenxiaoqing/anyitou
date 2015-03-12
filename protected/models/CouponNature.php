<?php

/**
 * This is the model class for table "coupon_nature".
 *
 * The followings are the available columns in table 'coupon_nature':
 * @property integer $id
 * @property integer $coupon_id
 * @property string $name
 * @property string $keyword
 * @property string $limit_value
 * @property string $descript
 */
class CouponNature extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CouponNature the static model class
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
		return 'coupon_nature';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coupon_id, name, keyword, limit_value', 'required'),
			array('coupon_id', 'numerical', 'integerOnly'=>true),
			array('name, keyword', 'length', 'max'=>20),
			array('limit_value', 'length', 'max'=>8),
			array('descript', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, coupon_id, name, keyword, limit_value, descript', 'safe', 'on'=>'search'),
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
			'coupon_id' => '优惠券名称',
			'name' => '属性名',
			'keyword' => '关键值',
			'limit_value' => '限制条件',
			'descript' => '描述',
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
		$criteria->compare('coupon_id',$this->coupon_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('limit_value',$this->limit_value,true);
		$criteria->compare('descript',$this->descript,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}