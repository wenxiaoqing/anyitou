<?php

/**
 * This is the model class for table "cms_notice_invest".
 *
 * The followings are the available columns in table 'cms_notice_invest':
 * @property string $id
 * @property string $userid
 * @property string $username
 * @property string $message
 * @property string $repay
 * @property string $item_id
 * @property string $sendtime
 * @property string $repaytime
 * @property string $type
 * @property string $ip
 * @property string $status
 */
class Comment extends CActiveRecord
{
    
    public $statusArrs = array(
        '0' => '未审核',
        '1' => '通过',
        '2' => '未通过',
    );
    public $classId = array(
		'1' => '项目评论',
    );
	public $itemStatus = array(
        '0' => '未上线',
        '1' => '融资中',
        '2' => '融资完成',
        '3' => '还款中',
        '4' => '还款完成',
        '5' => '完成',
	);
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemInfo the static model class
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
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id,message,item_id,status', 'required', 'message'=>'{attribute}不能为空'),
			array('status,item_id,userid', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>200),
			array('id,item_id,status', 'length', 'max'=>10),
			array('username,item_id,sendtime,status','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username,item_id,sendtime,status','safe', 'on'=>'search'),
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
			'userid' => '用户id',
			'username' => '用户名',
			'message' => '评论内容',
			'repay' => '回复内容',
			'item_id' => '项目id',
			'sendtime' => '评论时间',
			'repaytime' => '回复时间',
			'type' => '类型',
			'ip' => '评论者ip',
			'status' => '审核状态',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('sendtime',$this->sendtime,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
    /**
     *得到状态 
     */
    public function getStatuses()
    {
        return $this->statusArrs;
    }
    
    /**
     * 获取显示状态
     * @param number $value
     */
    public function getStatus($key)
    {
        if(!isset($this->statusArrs[$key])) {
            return '';
        }
        return $this->statusArrs[$key];
    }


    public function getClassTypeAll()
    {
        return $this->classId;
    }
    
    public function getClassType($key)
    {
        if(!isset($this->classId[$key])) {
            return '';
        }
        return $this->classId[$key];
    }
    public function getItemStatus($key)
    {
        if(!isset($this->itemStatus[$key])) {
            return '';
        }
        return $this->itemStatus[$key];
    }
	
}
