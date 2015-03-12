<?php

/**
 * This is the model class for table "cms_notice_invest".
 *
 * The followings are the available columns in table 'cms_notice_invest':
 * @property string $notice_id
 * @property string $class_id
 * @property string $title
 * @property string $sub_title
 * @property string $summary
 * @property string $content
 * @property string $attachment
 * @property string $keyword
 * @property string $hits
 * @property string $seacher_text
 * @property string $add_date
 * @property string $add_userid
 * @property string $update_date//紧急通告失效时间
 * @property string $update_userid
 * @property string $is_recommend
 * @property string $status
 */
class CmsNotice extends CActiveRecord
{
    
    public $statusArrs = array(
        '1' => '显示',
        '0' => '隐藏',
    );
    public $isRecommend = array(
        '1' => '推荐',
		'0' => '不推荐',
    );
    public $classId = array(
		'1' => '项目到期公告',
		'2' => '网站公告',
        '3' => '支付公告',
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
		return 'cms_notice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_id,title,add_date,content,status', 'required', 'message'=>'{attribute}不能为空'),
			array('class_id,hits,is_recommend,status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('class_id,is_recommend,status', 'length', 'max'=>10),
			array('class_id,title,update_date','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('notice_id,class_id,title,update_date,status','safe', 'on'=>'search'),
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
			'notice_id' => 'ID',
			'class_id' => '类型',
			'title' => '标题',
			'sub_title' => '副标题',
			'summary' => '概况',
			'content' => '内容',
			'attachment' => '附件',
			'keyword' => '关键词',
			'hits' => '点击量',
			'seacher_text' => '搜索文本',
			'add_date' => '添加时间',
			'add_userid' => '添加用户',
			'update_date' => '紧急通告失效时间',
			'update_userid' => '更新用户',
			'is_recommend' => '是否推荐',
			'status' => '状态',
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

		$criteria->compare('notice_id',$this->notice_id,true);
		$criteria->compare('class_id',$this->class_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('update_date',$this->update_date,true);
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
     *得到推荐类型
     */
    public function getRecommendTypeAll()
    {
        return $this->isRecommend;
    }
    
    /**
     * 获取推荐类型
     * @param number $value
     */
    public function getRecommendType($key)
    {
        if(!isset($this->isRecommend[$key])) {
            return '';
        }
        return $this->isRecommend[$key];
    }
    /**
     *得到文章类型
     */
    public function getClassTypeAll()
    {
        return $this->classId;
    }
    
    /**
     * 获取文章类型
     * @param number $value
     */
    public function getClassType($key)
    {
        if(!isset($this->classId[$key])) {
            return '';
        }
        return $this->classId[$key];
    }
	
}
