<?php

/**
 * This is the model class for table "item_fangdai_house".
 *
 * The followings are the available columns in table 'item_fangdai_house':
 * @property integer $id
 * @property string $pid
 * @property string $owner
 * @property integer $sizes
 * @property integer $floor
 * @property string $location
 * @property string $type
 * @property string $buy_date
 * @property string $buy_price
 * @property string $orientation
 * @property string $mortgage_info
 * @property string $valuation
 * @property string $update_time
 */
class ItemFangdaiHouse extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_fangdai_house';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid', 'required'),
			array('sizes, floor', 'numerical', 'integerOnly'=>true),
			array('pid', 'length', 'max'=>11),
		    array('serial_number', 'length', 'max'=>60),
			array('owner', 'length', 'max'=>30),
			array('location', 'length', 'max'=>100),
			array('type, orientation', 'length', 'max'=>50),
			array('buy_price, valuation', 'length', 'max'=>10),
			array('mortgage_info', 'length', 'max'=>256),
			array('valuation_date, buy_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, owner, sizes, floor, location, type, buy_date, buy_price, orientation, mortgage_info, valuation, update_time', 'safe', 'on'=>'search'),
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
			'pid' => '项目id',
		    'serial_number' => '编号',
		    'valuation_date' => '评估日期',
			'owner' => '所有人',
			'sizes' => '房产面积',
			'floor' => '楼层',
			'location' => '房产坐落',
			'type' => '房产性质',
			'buy_date' => '购置时间',
			'buy_price' => '购置价格',
			'orientation' => '朝向',
			'mortgage_info' => '抵押情况',
			'valuation' => '评估价值',
			'update_time' => '更新时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('sizes',$this->sizes);
		$criteria->compare('floor',$this->floor);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('buy_date',$this->buy_date,true);
		$criteria->compare('buy_price',$this->buy_price,true);
		$criteria->compare('orientation',$this->orientation,true);
		$criteria->compare('mortgage_info',$this->mortgage_info,true);
		$criteria->compare('valuation',$this->valuation,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemFangdaiHouse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
