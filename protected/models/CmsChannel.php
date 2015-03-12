<?php

/**
 * This is the model class for table "cms_channel".
 *
 * The followings are the available columns in table 'cms_channel':
 * @property integer $channel_id
 * @property string $name
 * @property integer $is_recommend
 */
class CmsChannel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsChannel the static model class
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
		return 'cms_channel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('is_recommend', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('channel_id, name, is_recommend', 'safe', 'on'=>'search'),
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
			'channel_id' => '频道ID',
			'name' => '频道名称',
			'is_recommend' => '推荐状态',
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

		$criteria->compare('channel_id',$this->channel_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('is_recommend',$this->is_recommend);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}