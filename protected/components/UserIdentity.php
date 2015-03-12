<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
    {
		$ManagerUserClass = new ManagerUserClass();
        $userAR = $ManagerUserClass->getByName($this->username);

        if( !isset($this->username) || null === $userAR )
        {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        elseif( !isset($this->password) || null === $userAR )
        {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        elseif( $userAR->password === md5($this->password) )
        {
            $this->username = $userAR->username;
            $this->setState('username', $userAR->username);
            $this->_id = $userAR->id;

            $this->errorCode=self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    /*
	 * 必须返回id，不能返回usrName
	 *
	 */
    public function getId()
    {
        return $this->_id;
    }
	
}