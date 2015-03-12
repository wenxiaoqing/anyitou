<?php

/**
 * This is the model class for table "lotterydraw_try_log".
 *
 * The followings are the available columns in table 'lotterydraw_try_log':
 * @property string $id
 * @property string $event_id
 * @property integer $status
 * @property string $user_id
 * @property integer $iswinner
 * @property string $prize_id
 * @property string $remark
 * @property string $givetime
 * @property string $addtime
 * @property string $addip
 */
class LotterydrawTryLog extends CActiveRecord
{
    
    public $username = '';
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LotterydrawTryLog the static model class
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
		return 'lotterydraw_try_log';
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
			array('status, iswinner', 'numerical', 'integerOnly'=>true),
			array('event_id, user_id, prize_id', 'length', 'max'=>11),
			array('remark', 'length', 'max'=>500),
			array('addip', 'length', 'max'=>15),
			array('givetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, status, user_id, iswinner, prize_id, remark, givetime, addtime, addip', 'safe', 'on'=>'search'),
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
			'event_id' => '活动ID',
			'status' => '状态',
			'user_id' => '用户ID',
		    'username' => '用户名',
			'iswinner' => 'Iswinner',
			'prize_id' => '奖品ID',
			'remark' => 'Remark',
			'givetime' => '发放时间',
			'addtime' => '抽奖时间',
			'addip' => 'Addip',
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
		$criteria->compare('event_id',$this->event_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('iswinner',$this->iswinner);
		$criteria->compare('prize_id',$this->prize_id,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('givetime',$this->givetime,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('addip',$this->addip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}