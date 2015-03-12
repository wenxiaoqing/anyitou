<?php

/**
 * This is the model class for table "user_detail".
 *
 * The followings are the available columns in table 'user_detail':
 * @property string $user_id
 * @property integer $gender
 * @property string $nation
 * @property integer $area_id
 * @property string $tel
 * @property string $address
 * @property string $zip_code
 * @property string $birthday
 * @property string $msn
 * @property string $qq
 * @property integer $paper_no
 * @property string $identity
 * @property string $identification_front_pic
 * @property string $identification_back_pic
 * @property integer $post_time
 * @property integer $security_question
 * @property string $security_answer
 * @property string $reg_ip
 * @property string $recommend_link
 * @property string $recommend_sms
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserDetail the static model class
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
		return 'user_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('gender, area_id, paper_no, post_time, security_question', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('nation, zip_code', 'length', 'max'=>30),
			array('tel, identity, reg_ip', 'length', 'max'=>20),
			array('address, identification_front_pic, identification_back_pic, security_answer', 'length', 'max'=>255),
			array('msn', 'length', 'max'=>50),
			array('qq', 'length', 'max'=>16),
			array('recommend_link', 'length', 'max'=>120),
			array('recommend_sms', 'length', 'max'=>100),
			array('birthday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, gender, nation, area_id, tel, address, zip_code, birthday, msn, qq, paper_no, identity, identification_front_pic, identification_back_pic, post_time, security_question, security_answer, reg_ip, recommend_link, recommend_sms', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'gender' => 'Gender',
			'nation' => 'Nation',
			'area_id' => 'Area',
			'tel' => 'Tel',
			'address' => 'Address',
			'zip_code' => 'Zip Code',
			'birthday' => 'Birthday',
			'msn' => 'Msn',
			'qq' => 'Qq',
			'paper_no' => 'Paper No',
			'identity' => 'Identity',
			'identification_front_pic' => 'Identification Front Pic',
			'identification_back_pic' => 'Identification Back Pic',
			'post_time' => 'Post Time',
			'security_question' => 'Security Question',
			'security_answer' => 'Security Answer',
			'reg_ip' => 'Reg Ip',
			'recommend_link' => 'Recommend Link',
			'recommend_sms' => 'Recommend Sms',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('paper_no',$this->paper_no);
		$criteria->compare('identity',$this->identity,true);
		$criteria->compare('identification_front_pic',$this->identification_front_pic,true);
		$criteria->compare('identification_back_pic',$this->identification_back_pic,true);
		$criteria->compare('post_time',$this->post_time);
		$criteria->compare('security_question',$this->security_question);
		$criteria->compare('security_answer',$this->security_answer,true);
		$criteria->compare('reg_ip',$this->reg_ip,true);
		$criteria->compare('recommend_link',$this->recommend_link,true);
		$criteria->compare('recommend_sms',$this->recommend_sms,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}