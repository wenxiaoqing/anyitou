<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $login;
	public $password;
	public $remember_me;
	public $verify_code;
	public $duration = 1800;
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that login and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('login, password', 'required','message'=>'{attribute}不能为空'),
			array('login','match','pattern'=>'/(^\s*1[3458][0-9]{9}\s*$)|(^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$)|(^[一-龥a-zA-Z][一-龥a-zA-Z0-9_]{5,19}$)/','message'=>'{attribute}6-20个字符，可以是中文'),
			array('password', 'authenticate'),
			array('verify_code', 'captcha','message'=>'{attribute}错误'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'verify_code'=>'验证码',
			'login'=>'用户名',
			'password'=>'密码',
		);
	}
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
        {
			$this->_identity=new UserIdentity($this->login,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('error','账号或密码错误');
		}
	}

	/**
	 * Logs in the user using the given login and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
    {
		if($this->_identity===null)
		{
			$this->_identity = new UserIdentity($this->login,$this->password);
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode === UserIdentity::ERROR_NONE)
		{
			$duration = $this->duration;
            Yii::app()->user->login($this->_identity, $duration);
			return true;
		} else
			return false;
	}
	
}