<?php

/**
 * This is the model class for table "user_channel".
 *
 * The followings are the available columns in table 'user_channel':
 * @property integer $id
 * @property string $title
 * @property string $keyword
 * @property integer $status
 */
class UserChannel extends CActiveRecord
{
	public $name;
    
    public $statusAttrs = array(
        '0' => '无效',
        '1' => '有效',
    );
    
    public $url = '';
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserChannel the static model class
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
		return 'user_channel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('type_id,status','required', 'message'=>'{attribute}不能为空', 'on'=>'create,update'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('keyword', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,type_id,title,channel_key,plan,group,name,keyword, status', 'safe', 'on'=>'search'),
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
			'userChannelType'=>array(self::BELONGS_TO, 'UserChannelType', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '编号ID',
			'title' => '关键词',
			'type_id'=>'渠道',
			'name'=>'渠道',
			'keyword' => '',
			'status' => '状态',
		    'url' => '链接',
			'add_time'=>'添加时间',
			'channel_key'=>'channel_key',
			'plan'=>'推广计划',
			'group'=>'推广组',
			'type_id'=>'渠道ID',
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
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('t.keyword',$this->keyword,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.type_id',$this->type_id,true);
		$criteria->compare('t.total',$this->total);
		$criteria->compare('t.total_time',$this->total_time);
		$criteria->compare('t.add_time',$this->add_time);
		$criteria->compare('t.channel_key',$this->channel_key);
		$criteria->compare('t.plan',$this->plan);
		$criteria->compare('t.group',$this->group);
		$criteria->compare('userChannelType.name', $this->name,true);
		$criteria->compare('userChannelType.id', $this->name,true);
		$criteria->with=array('userChannelType');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder' => 't.id DESC', 
            ),
            'pagination'=>array(
                'pageSize' => 20,
            ),
		));
	}
	
	public function getStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->status;
	    }
	    return $this->statusAttrs[$value];
	}
	
	public function existKeyword()
	{
	    if(empty($value)) {
	        $value = $this->keyword;
	    }
	    $row = $this->findByAttributes(array('keyword' => $value));
	    if($row && $row->id != $this->id) {
	        $this->addError('keyword', '该关键词已存在');
	        return false;
	    }
	    return true;
	}
	
}