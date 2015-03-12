<?php

/**
 * This is the model class for table "call_record".
 *
 * The followings are the available columns in table 'call_record':
 * @property integer $id
 * @property string $time
 * @property string $type
 * @property string $descript
 * @property integer $satisfaction
 * @property integer $user_id
 */
class CallRecord extends CActiveRecord
{
	public $channel_key;
	public $user_name;
	public $managerName;
	
	public $satisfactionArrs = array(
			'0'=>'非常满意',
			'1' => '满意',
			'2' => '一般',
			'3'=>'不满意',
	);
	
	public $typeStatusArrs = array(
			'0'=>'未接通',
			'1' => '已接通',
			'2' => '空号',
			'3'=>'无效',
			'4'=>'拒接',
	);
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CallRecord the static model class
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
		return 'call_record';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('satisfaction,user_id', 'required'),
			array('satisfaction,type','numerical', 'integerOnly'=>true),
			array('descript','length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,time,type,user_name,managerName,channel_key,service_id,descript,satisfaction, user_id', 'safe', 'on'=>'search'),
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
				'user'=>array(self::BELONGS_TO,'User','user_id'),
				'manager_user'=>array(self::BELONGS_TO,'ManagerUser','service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'time' => '外呼时间',
			'type' => '类型',
			'descript' => '描述',
			'satisfaction' => '满意度',
			'user_id' => '用户',
			'user_name'=>'用户名',
			'service_id'=>'客服名',
			'managerName'=>'客服名',
			'channel_key'=>'渠道',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.time',$this->time,true);
		$criteria->compare('t.type',$this->type,true);
		$criteria->compare('t.descript',$this->descript,true);
		$criteria->compare('t.satisfaction',$this->satisfaction);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('t.service_id',$this->service_id);
		$criteria->compare('user.user_name', $this->user_name,true);
		$criteria->compare('user.channel_key', $this->channel_key,true);
		$criteria->compare('manager_user.username', $this->managerName,true);
		$criteria->with=array('user','manager_user');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
            'pagination'=>array(
                'pageSize' => 20,
            ),
		));
	}
	
	/**
	 *
	 * 获取满意度
	 * @param number $satisfaction,$type
	 */
	public function getSatisfaction($value = '')
	{
		if(empty($value)) {
			$value = $this->satisfaction;
		}
		return $this->satisfactionArrs[$value];
	}
	
	public function getTypeStatus($value = '')
	{
		if(empty($value)) {
			$value = $this->type;
		}
		return $this->typeStatusArrs[$value];
	}
}