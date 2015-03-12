<?php

/**
 * This is the model class for table "sms_send".
 *
 * The followings are the available columns in table 'sms_send':
 * @property integer $id
 * @property string $mobile
 * @property string $message
 * @property string $time
 * @property integer $type
 * @property integer $channel
 */
class SmsSend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SmsSend the static model class
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
		return 'sms_send';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mobile, message, time', 'required'),
			array('type, channel', 'numerical', 'integerOnly'=>true),
			array('mobile', 'length', 'max'=>15),
			array('message', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mobile, message, time, type, channel', 'safe', 'on'=>'search'),
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
			'mobile' => '手机号码',
			'message' => '短信内容',
			'time' => '发送时间',
			'type' => '类型',
			'channel' => '发送通道',
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
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('channel',$this->channel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'id DESC', 
            ),
		));
	}
}