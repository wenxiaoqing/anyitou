<?php

/**
 * This is the model class for table "user_other_account".
 *
 * The followings are the available columns in table 'user_other_account':
 * @property integer $id
 * @property integer $user_id
 * @property string $other_id
 * @property string $other_name
 * @property integer $category
 * @property integer $status
 * @property string $other_token
 * @property string $other_code
 */
class UserOtherAccount extends CActiveRecord
{
    
    public $statusAttrs = array(
        '0' => '无效', '1' => '有效',
    );
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserOtherAccount the static model class
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
		return 'user_other_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, other_id, other_name, category', 'required'),
			array('user_id, category, status', 'numerical', 'integerOnly'=>true),
			array('other_id', 'length', 'max'=>20),
			array('other_name', 'length', 'max'=>30),
			array('other_token, other_code', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, other_id, other_name, category, status, other_token, other_code', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'other_id' => '客户号',
    		'other_name' => '客户名',
			'category' => '类别',
			'status' => '状态',
			'other_token' => 'Other Token',
			'other_code' => 'Other Code',
		);
	}
	
    public function getStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->status;
	    }
	    return $this->statusAttrs[$value];
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('other_id',$this->other_id);
		$criteria->compare('other_name',$this->other_name,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('status',$this->status);
		$criteria->compare('other_token',$this->other_token,true);
		$criteria->compare('other_code',$this->other_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}