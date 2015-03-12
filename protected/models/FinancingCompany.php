<?php

/**
 * This is the model class for table "financing_company".
 *
 * The followings are the available columns in table 'financing_company':
 * @property string $id
 * @property string $name
 * @property string $tel
 * @property string $address
 * @property string $link_user
 * @property string $link_mobile
 * @property string $company_no
 * @property string $qualification
 * @property string $intro
 * @property string $information
 * @property string $background
 * @property string $website
 */
class FinancingCompany extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FinancingCompany the static model class
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
		return 'financing_company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, company_no', 'required', 'message'=>'{attribute}不能为空'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('name, website', 'length', 'max'=>100),
			array('tel', 'length', 'max'=>11),
			array('address, qualification', 'length', 'max'=>255),
			array('link_user, company_no', 'length', 'max'=>20),
			array('link_mobile', 'length', 'max'=>15),
			array('intro', 'length', 'max'=>1000),
			array('information, background', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, user_id, tel, address, link_user, link_mobile, company_no, qualification, intro, information, background, website', 'safe', 'on'=>'search'),
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
		    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '企业ID',
		    'user_id' => '绑定的用户',
			'name' => '企业名称',
			'tel' => '联系电话',
			'address' => '公司地址',
			'link_user' => '联系人',
			'link_mobile' => '联系人电话',
			'company_no' => '企业编号',
			'qualification' => '企业资质',
			'intro' => '企业介绍',
			'information' => '企业信息',
			'background' => '企业背景',
			'website' => '企业主页',
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
        $criteria->with = 'user';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('user.user_name', $this->user_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('link_user',$this->link_user,true);
		$criteria->compare('link_mobile',$this->link_mobile,true);
		$criteria->compare('company_no',$this->company_no,true);
		$criteria->compare('qualification',$this->qualification,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('information',$this->information,true);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('website',$this->website,true);
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
		));
	}
}