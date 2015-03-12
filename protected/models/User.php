<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $user_name
 * @property string $password
 * @property string $real_name
 * @property string $mobile
 * @property string $email
 * @property integer $base_status
 * @property integer $email_status
 * @property integer $real_status
 * @property string $reg_time
 * @property string $last_login_ip
 * @property string $last_login_time
 * @property integer $is_verified
 * @property integer $auth_type
 * @property string $reg_ip
 *
 * The followings are the available model relations:
 * @property UserDetail $userDetail
 */
class User extends CActiveRecord
{
	public $num;
	public $identity;
    public $baseStatusAttrs = array(
        '0' => '无效', '1' => '有效', '2' => '开通资金账户',
    );
    
    public $mobileStatusAttrs = array(
        '0' => '未认证', '1' => '已认证', '2' => '未通过',
    );
    
    public $realStatusAttrs = array(
        '0' => '未认证', '1' => '已认证', '2' => '未通过','3'=>'审核中',
    );
    
    public $emailStatusAttrs = array(
        '0' => '未认证', '1' => '已认证', '2' => '未通过',
    );
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, password, mobile, email', 'required', 'message'=>'{attribute}不能为空'),
			array('base_status, email_status,mobile, real_status, is_verified, auth_type', 'numerical', 'integerOnly'=>true),
			array('user_name, real_name, mobile, reg_ip', 'length', 'max'=>20),
			array('password', 'length', 'max'=>40),
			array('email', 'length', 'max'=>255),
			array('last_login_ip', 'length', 'max'=>16),
			array('reg_time, last_login_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name,num, real_name,mobile, email, base_status, mobile_status, email_status, real_status, reg_time, last_login_ip, last_login_time, is_verified, auth_type, reg_ip, invest_num, channel_key', 'safe', 'on'=>'search'),
			array('user_name,mobile,email','unique','message'=>'{attribute}已注册'),
			array('email','email'),
			array('mobile','match','pattern'=>'/^1[0-9]{10}$/','message'=>'{attribute}必须为1开头的11位纯数字'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		/*return array(
			'userDetail' => array(self::HAS_ONE, 'UserDetail', 'user_id'),
		);*/
		
		return array(
			'detail'=>array(self::HAS_ONE,'UserDetail','user_id'),
			//'user_channel'=>array(self::HAS_ONE,'UserChannel','','on'=>'t.channel_key=user_channel.channel_key'),
		);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_name' => '用户名',
			'password' => '密码',
			'real_name' => '真实姓名',
			'mobile' => '手机号',
			'email' => 'Email',
			'base_status' => '状态',
		    'mobile_status' => '手机认证状态',
			'email_status' => '邮箱认证状态',
			'identity'=>'身份证ID',
			'real_status' => '实名认证状态',
			'reg_time' => '注册时间',
			'last_login_ip' => '最后登录IP',
			'last_login_time' => '最后登录时间',
			'is_verified' => 'Is Verified',
			'invest_num' => '投资次数',
			'auth_type' => '实名认证方式',
			'reg_ip' => '注册IP',
		    'channel_key' => '渠道',
			'type_id'=>'推广计划',
			'num'=>'外呼次数',
		);
	}
	
    public function getBaseStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->base_status;
	    }
	    return $this->baseStatusAttrs[$value];
	}
	
    public function getMobileStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->mobile_status;
	    }
	    return $this->mobileStatusAttrs[$value];
	}
	
    public function getRealStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->real_status;
	    }
	    return $this->realStatusAttrs[$value];
	}
	
    public function getEmailStatus($value = '')
	{
	    if(empty($value)) {
	        $value = $this->email_status;
	    }
	    return $this->emailStatusAttrs[$value];
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
		$criteria->compare('t.user_name',$this->user_name,true);
		$criteria->compare('t.real_name',$this->real_name,true);
		$criteria->compare('t.mobile',$this->mobile,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('t.base_status',$this->base_status);
		$criteria->compare('t.mobile_status',$this->mobile_status);
		$criteria->compare('t.email_status',$this->email_status);
		$criteria->compare('t.reg_time',$this->reg_time,true);
		$criteria->compare('t.last_login_ip',$this->last_login_ip,true);
		$criteria->compare('t.last_login_time',$this->last_login_time,true);
		$criteria->compare('t.is_verified',$this->is_verified);
		$criteria->compare('t.invest_num',$this->invest_num);
		$criteria->compare('t.channel_key', $this->channel_key,true);
		$criteria->compare('t.reg_ip',$this->reg_ip,true);
		$criteria->compare('t.real_status',$this->real_status,true);
		$criteria->addCondition('real_status !=3');
		$criteria->with=array('detail');
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
                'defaultOrder'=>'t.id DESC', 
            ),
            'pagination'=>array(
                'pageSize' => 20,
            ),
		));
	}
}