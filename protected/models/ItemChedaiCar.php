<?php

/**
 * This is the model class for table "item_chedai_car".
 *
 * The followings are the available columns in table 'item_chedai_car':
 * @property string $id
 * @property string $item_id
 * @property string $owner
 * @property string $used_time
 * @property string $license_plate
 * @property string $vehicle_type
 * @property integer $use_type
 * @property integer $violation
 * @property string $buy_time
 * @property string $buy_price
 * @property string $color
 * @property string $brand_model
 * @property string $emissions
 * @property string $kilometre
 * @property string $annual_inspection_due_date
 * @property string $insurance_due_date
 * @property string $valuation
 */
class ItemChedaiCar extends CActiveRecord
{
    
    public $vehicle_type_attrs = array(
        '1' => '微型轿车',
        '2' => '轻级轿车',
        '3' => '中级轿车',
        '4' => '中高级轿车',
        '5' => '高级轿车',
        '6' => '微型客车',
        '7' => '小型客车',
        '8' => '中型客车',
        '9' => '大型客车',
        '10' => '微型货车',
        '11' => '轻型货车',
        '12' => '重型货车',
        '13' => '越野车',
        '14' => '专用汽车 ',
    );
    
    public $violationAttrs = array(
        '0' => '无', '1' => '已处理', '2' => '未处理',
    );
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_chedai_car';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('violation', 'numerical', 'integerOnly'=>true),
			array('item_id', 'length', 'max'=>11),
			array('owner, vehicle_type, brand_model', 'length', 'max'=>50),
			array('used_time, license_plate, color, emissions, kilometre', 'length', 'max'=>20),
			array('buy_price, valuation', 'length', 'max'=>10),
			array('buy_time, annual_inspection_due_date, insurance_due_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, item_id, owner, used_time, license_plate, vehicle_type, use_type, violation, buy_time, buy_price, color, brand_model, emissions, kilometre, annual_inspection_due_date, insurance_due_date, valuation', 'safe', 'on'=>'search'),
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
			'item_id' => '项目编号',
			'owner' => '所有人姓名',
			'used_time' => '使用期限',
			'license_plate' => '车牌号',
			'vehicle_type' => '车辆类型',
			'use_type' => '使用性质',
			'violation' => '违章情况',
			'buy_time' => '购买时间',
			'buy_price' => '购买价格',
			'color' => '颜色',
			'brand_model' => '品牌型号',
			'emissions' => '排气量',
			'kilometre' => '公里数',
			'annual_inspection_due_date' => '年检到期日',
			'insurance_due_date' => '保险到期日',
			'valuation' => '评估价值',
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
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('used_time',$this->used_time,true);
		$criteria->compare('license_plate',$this->license_plate,true);
		$criteria->compare('vehicle_type',$this->vehicle_type,true);
		$criteria->compare('use_type',$this->use_type);
		$criteria->compare('violation',$this->violation);
		$criteria->compare('buy_time',$this->buy_time,true);
		$criteria->compare('buy_price',$this->buy_price,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('brand_model',$this->brand_model,true);
		$criteria->compare('emissions',$this->emissions,true);
		$criteria->compare('kilometre',$this->kilometre,true);
		$criteria->compare('annual_inspection_due_date',$this->annual_inspection_due_date,true);
		$criteria->compare('insurance_due_date',$this->insurance_due_date,true);
		$criteria->compare('valuation',$this->valuation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemChedaiCar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
