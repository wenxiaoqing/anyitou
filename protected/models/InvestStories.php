<?php
/**
 * This is the model class for table "invest_stories".
 *
 * The followings are the available columns in table 'cms_notice_invest':
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $sendtime
 * @property string $status
 * @property string $recommend
 */
class InvestStories extends CActiveRecord
{
    
    public $statusArrs = array(
        '1' => '显示',
        '0' => '隐藏',
    );
    public $isRecommend = array(
        '1' => '推荐',
		'0' => '不推荐',
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
		return 'invest_stories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,content,status,recommend', 'required', 'message'=>'{attribute}不能为空'),
			array('recommend,status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('recommend,status', 'length', 'max'=>10),
			array('title,status,sendtime,recommend','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,title,recommend,sendtime,status','safe', 'on'=>'search'),
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
			'title' => '标题',
			'content' => '内容',
			'sendtime' => '发表时间',
			'status' => '状态',
			'recommend' => '是否推荐',
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
		$criteria->compare('recommend',$this->recommend,true);
		$criteria->compare('status',$this->status,true);

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
	
}
