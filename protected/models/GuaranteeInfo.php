<?php

/**
 * This is the model class for table "guarantee_info".
 *
 * The followings are the available columns in table 'guarantee_info':
 * @property integer $id
 * @property string $name
 * @property string $tel
 * @property string $address
 * @property string $link_user
 * @property string $link_mobile
 * @property string $qualification
 * @property string $intro
 * @property string $website
 * @property string $logo_pic
 * @property integer $status
 */
class GuaranteeInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GuaranteeInfo the static model class
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
		return 'guarantee_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('abbr', 'required', 'message'=>'请输入{attribute}'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, abbr, website', 'length', 'max'=>100),
			array('tel, link_mobile', 'length', 'max'=>15),
			array('address, logo_pic', 'length', 'max'=>255),
			array('link_user, qualification', 'length', 'max'=>20),
			array('intro', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, tel, address, link_user, link_mobile, qualification, intro, website, logo_pic, status', 'safe', 'on'=>'search'),
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
			'name' => '名称',
		    'user_name' => '用户名',
		    'abbr' => '缩写标识',
			'tel' => '电话',
			'address' => '地址',
			'link_user' => '联系人',
			'link_mobile' => '联系人手机',
			'qualification' => '公司资质',
			'intro' => '介绍',
			'website' => '主页网址',
			'logo_pic' => 'Logo图片',
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
        
		$criteria->compare('id',$this->id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('abbr',$this->abbr,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('link_user',$this->link_user,true);
		$criteria->compare('link_mobile',$this->link_mobile,true);
		$criteria->compare('qualification',$this->qualification,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('logo_pic',$this->logo_pic,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'id DESC', 
            ),
		));
	}
}