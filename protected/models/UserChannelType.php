<?php

/**
 * This is the model class for table "user_channel".
 *
 * The followings are the available columns in table 'user_channel':
 * @property integer $id
 * @property string $name
 * @property string $keywords
 * @property integer $status
 */
class UserChannelType extends CActiveRecord
{
    
    public $statusAttrs = array(
        '0' => '无效',
        '1' => '有效',
    );
    
    public $url = '';
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserChannelType the static model class
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
		return 'user_channel_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('name','required', 'message'=>'{attribute}不能为空', 'on'=>'create,update'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('keywords', 'length', 'max'=>50),
			//array('keywords', 'existkeywords'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, keywords, status','safe', 'on'=>'search'),
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
			'id' => '编号ID',
			'name' => '渠道',
			'keywords' => '关键词',
			'status' => '状态',
		    'url' => '链接',
			'add_time'=>'添加时间',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_time',$this->add_time);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder' => 'id DESC', 
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
	
	public function existkeywords()
	{
	    if(empty($value)) {
	        $value = $this->keywords;
	    }
	    $row = $this->findByAttributes(array('keywords' => $value));
	    if($row && $row->id != $this->id) {
	        $this->addError('keywords', '该关键词已存在');
	        return false;
	    }
	    return true;
	}
	
}