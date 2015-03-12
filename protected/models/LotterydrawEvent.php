<?php

/**
 * This is the model class for table "lotterydraw_event".
 *
 * The followings are the available columns in table 'lotterydraw_event':
 * @property string $id
 * @property string $nid
 * @property integer $status
 * @property string $type
 * @property string $name
 * @property string $starttime
 * @property string $expirtdate
 * @property integer $all_islucky
 * @property string $credit_value
 * @property integer $cycle
 * @property string $interval
 * @property integer $max_chance
 * @property string $template
 * @property string $description
 * @property string $addtime
 * @property string $addip
 */
class LotterydrawEvent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LotterydrawEvent the static model class
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
		return 'lotterydraw_event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type', 'required'),
			array('status, all_islucky, cycle, max_chance', 'numerical', 'integerOnly'=>true),
			array('nid', 'length', 'max'=>50),
			array('type', 'length', 'max'=>25),
			array('name, template', 'length', 'max'=>256),
			array('credit_value, interval', 'length', 'max'=>11),
			array('addip', 'length', 'max'=>15),
			array('starttime, expirtdate, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nid, status, type, name, starttime, expirtdate, all_islucky, credit_value, cycle, interval, max_chance, template, description, addtime, addip', 'safe', 'on'=>'search'),
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
			'id' => '活动ID',
			'nid' => '别名',
			'status' => '状态',
			'type' => '抽奖类型',
			'name' => '活动名称',
			'starttime' => '开始时间',
			'expirtdate' => '结束时间',
			'all_islucky' => '是否100%中奖',
			'credit_value' => 'Credit Value',
			'cycle' => '抽奖周期',
			'interval' => '时间间隔',
			'max_chance' => '最大抽奖次数',
			'template' => '活动模板',
			'description' => '活动描述',
			'addtime' => '添加时间',
			'addip' => '添加IP',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nid',$this->nid,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('expirtdate',$this->expirtdate,true);
		$criteria->compare('all_islucky',$this->all_islucky);
		$criteria->compare('credit_value',$this->credit_value,true);
		$criteria->compare('cycle',$this->cycle);
		$criteria->compare('interval',$this->interval,true);
		$criteria->compare('max_chance',$this->max_chance);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('addip',$this->addip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}