<?php
/*
 * 用户信息处理类
 */

class ManagerUserClass  {

	public $error = '';
	public $errorCode = '';
    
    /**
     * 获取用户信息
     **/
    public function getById($user_id){
        $model = new ManagerUser();
        $userRecord = $model->findByPk($user_id);
        return $userRecord;
    }
	
	/**
     * 通过username获取用户信息
     **/
    public function getByName($username){
        $model = new ManagerUser();
        $attributes = array(
			"username" => $username,
        );
        $UserResult = $model->findByAttributes($attributes);
        return $UserResult;
    }
     
    /**
     * 获取用户信息
     **/
    public function getUserByAttr($attributes= array(), $CDbCriteria=null){
        $model = new ManagerUser();
        $criteria = new CDbCriteria; 
        $userRecord = $model->findByAttributes($attributes, $CDbCriteria);
        return $userRecord;
    }
	
	/**
     * 更新登录密码
     *
     */
    public function updatePassword($user_id, $inputoldpassword, $oldpassword, $newpassword, $newpassword2)
	{
		if(empty($inputoldpassword)) {
			$this->errorCode = '0001';
			$this->error = '请输入当前登录密码';
            return false;
        } elseif(empty($newpassword)) {
			$this->errorCode = '0002';
			$this->error = '请输入新登录密码';
            return false;
        } elseif(empty($newpassword2)) {
			$this->errorCode = '0003';
			$this->error = '请确认新登录密码';
            return false;
        } elseif($this->encryptPassword($inputoldpassword) != $oldpassword) {
			$this->errorCode = '0004';
			$this->error = '当前密码不正确';
			return false;
		} elseif($newpassword2 !== $newpassword) {
			$this->errorCode = '0005';
			$this->error = '两次输入的新密码不一致';
            return false;
		} elseif(strlen($newpassword) < 6) {
			$this->errorCode = '0007';
			$this->error = '密码长度不能小于6位';
			return false;
		} elseif($this->comparePassword($newpassword, $oldpassword)) {
				$this->errorCode = '0008';
				$this->error = '新旧密码不能相同';
				return false;
		} else {
			$ManagerUserModel = new ManagerUser();
			$result = $ManagerUserModel->updateByPk($user_id, array( 'password' => self::encryptPassword($newpassword) ));
			
			if($result == true) {
				$this->errorCode = '0000';
				return true;
			} else {
				$this->errorCode = '1000';
				$this->error = $ManagerUserModel->getErrors();
				return false;
			}
			
		}
		
        return true;
    }

    public function encryptPassword($input) {
        return md5($input);
    }
    
    public function comparePassword($inputpassword, $userpassword) {
        if(self::encryptPassword($inputpassword) != $userpassword ) {
            return false;
        } else {
            return true;
        }
    }

}
