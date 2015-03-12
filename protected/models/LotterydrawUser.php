<?php

/**
 * This is the model class for table "lotterydraw_user".
 *
 * The followings are the available columns in table 'lotterydraw_user':
 * @property string $id
 * @property string $user_id
 * @property string $event_id
 * @property integer $chance
 * @property integer $tried_num
 * @property integer $win_number
 * @property string $updatetime
 */
class LotterydrawUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LotterydrawUser the static model class
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
		return 'lotterydraw_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('updatetime', 'required'),
			array('chance, tried_num, win_number', 'numerical', 'integerOnly'=>true),
			array('user_id, event_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, event_id, chance, tried_num, win_number, updatetime', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'event_id' => 'Event',
			'chance' => 'Chance',
			'tried_num' => 'Tried Num',
			'win_number' => 'Win Number',
			'updatetime' => 'Updatetime',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('event_id',$this->event_id,true);
		$criteria->compare('chance',$this->chance);
		$criteria->compare('tried_num',$this->tried_num);
		$criteria->compare('win_number',$this->win_number);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}