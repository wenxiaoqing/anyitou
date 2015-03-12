<?php

/**
 * This is the model class for table "lotterydraw_chance_log".
 *
 * The followings are the available columns in table 'lotterydraw_chance_log':
 * @property string $id
 * @property string $user_id
 * @property string $event_id
 * @property integer $chance
 * @property string $source
 * @property string $source_id
 * @property string $addtime
 */
class LotterydrawChanceLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LotterydrawChanceLog the static model class
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
		return 'lotterydraw_chance_log';
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
			array('chance', 'numerical', 'integerOnly'=>true),
			array('user_id, event_id, source_id', 'length', 'max'=>11),
			array('source', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, event_id, chance, source, source_id, addtime', 'safe', 'on'=>'search'),
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
			'source' => 'Source',
			'source_id' => 'Source',
			'addtime' => 'Addtime',
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
		$criteria->compare('source',$this->source,true);
		$criteria->compare('source_id',$this->source_id,true);
		$criteria->compare('addtime',$this->addtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}