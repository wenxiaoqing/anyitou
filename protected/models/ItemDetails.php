<?php

/**
 * This is the model class for table "item_details".
 *
 * The followings are the available columns in table 'item_details':
 * @property string $id
 * @property integer $item_id
 * @property string $title
 * @property string $content
 * @property string $abstract
 * @property string $post_time
 * @property string $idea_credit
 * @property string $idea_home
 * @property string $idea_market
 * @property string $idea_risk
 * @property string $idea_repay
 * @property string $relation_desc
 * @property string $addtime
 */
class ItemDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItemDetails the static model class
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
		return 'item_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id', 'required', 'message'=>'{attribute}不能为空'),
			array('item_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>20),
			array('content, abstract, post_time, idea_credit, idea_home, idea_market, idea_risk, idea_repay, relation_desc, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item_id, title, content, abstract, post_time, idea_credit, idea_home, idea_market, idea_risk, idea_repay, relation_desc, addtime', 'safe', 'on'=>'search'),
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
			'item_id' => '项目ID',
			'title' => '项目名称',
			'content' => '项目内容',
			'abstract' => '内容摘要',
			'post_time' => '添加时间',
			'idea_credit' => '信用分析',
			'idea_home' => '经营状况分析',
			'idea_market' => '担保公司', //'市场及政策分析',
			'idea_risk' => '风险保障',
			'idea_repay' => '还款来源',
			'relation_desc' => '相关资料',
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
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('abstract',$this->abstract,true);
		$criteria->compare('post_time',$this->post_time,true);
		$criteria->compare('idea_credit',$this->idea_credit,true);
		$criteria->compare('idea_home',$this->idea_home,true);
		$criteria->compare('idea_market',$this->idea_market,true);
		$criteria->compare('idea_risk',$this->idea_risk,true);
		$criteria->compare('idea_repay',$this->idea_repay,true);
		$criteria->compare('relation_desc',$this->relation_desc,true);
		$criteria->compare('addtime',$this->addtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}