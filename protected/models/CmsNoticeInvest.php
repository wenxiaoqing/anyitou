<?php

/**
 * This is the model class for table "cms_notice_invest".
 *
 * The followings are the available columns in table 'cms_notice_invest':
 * @property string $id
 * @property string $title
 * @property string $desc
 * @property string $guarantee
 * @property string $amount 
 * @property string $rate
 * @property string $time_limit
 * @property string $finance_time
 * @property string $add_date
 * @property string $type
 * @property string $status
 */
class CmsNoticeInvest extends CActiveRecord
{
    
    public $statusArrs = array(
        '1' => '显示',
        '0' => '隐藏',
    );
    public $noticeType = array(
        '1' => '投资项目预告',
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
		return 'cms_notice_invest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,guarantee,amount,rate,time_limit,finance_time,type,status', 'required', 'message'=>'{attribute}不能为空'),
			array('type,status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('amount,type,status', 'length', 'max'=>10),
			array('guarantee,amount,rate,time_limit,finance_time,type,status','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,title,guarantee,amount,rate,time_limit,finance_time,type,status','safe', 'on'=>'search'),
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
			'title' => '项目名称',
			'desc' => '项目描述',
		    'guarantee' => '担保公司',
			'amount'=>'预计融资金额',
			'rate'=>'年化收益率',
			'time_limit'=>'融资期限',
			'finance_time'=>'预计开始时间',
			'add_date'=>'添加时间',
			'type'=>'类型',
			'status'=>'是否显示',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('guarantee',$this->guarantee,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('time_limit',$this->time_limit,true);
		$criteria->compare('finance_time',$this->finance_time,true);
		$criteria->compare('type',$this->type,true);
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

    /**
     *得到项目类型
     */
    public function getNoticeTypeAll()
    {
        return $this->noticeTypeAll;
    }
    
    /**
     * 获取项目类型
     * @param number $value
     */
    public function getNoticeType($key)
    {
        if(!isset($this->noticeType[$key])) {
            return '';
        }
        return $this->noticeType[$key];
    }
	
}
