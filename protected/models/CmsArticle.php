<?php

/**
 * This is the model class for table "cms_article".
 *
 * The followings are the available columns in table 'cms_article':
 * @property integer $article_id
 * @property integer $channel_id
 * @property integer $class_id
 * @property string $title
 * @property string $sub_title
 * @property string $summary
 * @property string $content
 * @property string $keyword
 * @property integer $hits
 * @property string $seacher_text
 * @property string $add_date
 * @property integer $add_userid
 * @property string $update_date
 * @property integer $update_userid
 * @property integer $is_recommend
 */
class CmsArticle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CmsArticle the static model class
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
		return 'cms_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('channel_id, class_id, title, content, add_date, add_userid', 'required'),
			array('channel_id, class_id, hits, add_userid, update_userid, is_recommend', 'numerical', 'integerOnly'=>true),
			array('title, sub_title', 'length', 'max'=>100),
			array('keyword', 'length', 'max'=>50),
			array('summary, seacher_text, update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, channel_id, class_id, title, sub_title, summary, content, keyword, hits, seacher_text, add_date, add_userid, update_date, update_userid, is_recommend', 'safe', 'on'=>'search'),
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
			"cmsChannel"   =>  array(self::BELONGS_TO, 'CmsChannel', 'channel_id'),
			"cmsClass"   =>  array(self::BELONGS_TO, 'CmsClass', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'article_id' => '文章ID',
			'channel_id' => '频道',
			'class_id' => '类型',
			'title' => '标题',
			'sub_title' => '副标题',
			'summary' => '摘要',
			'content' => '内容',
			'keyword' => '关键词',
			'hits' => '点击量',
			'seacher_text' => '搜索内容',
			'add_date' => '添加时间',
			'add_userid' => '添加人',
			'update_date' => '更新时间',
			'update_userid' => '更新人',
			'is_recommend' => '推荐状态',
		
			'channel' => '频道名称',
			'class' => '分类名称',
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

		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('channel_id',$this->channel_id);
		$criteria->compare('class_id',$this->class_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('sub_title',$this->sub_title,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('seacher_text',$this->seacher_text,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('add_userid',$this->add_userid);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_userid',$this->update_userid);
		$criteria->compare('is_recommend',$this->is_recommend);
		
		$criteria->with = array('cmsChannel','cmsClass');

		return new CActiveDataProvider($this, array(
			'sort'=>array(
                'defaultOrder'=>'article_id DESC', 
            ),
			'criteria'=>$criteria,
		));
	}
	
}