<?php
/*
 * 用户资金账户处理类
 */

class AccountClass  {

	public $error = '';
	public $errorCode = '';
    
	/**
	 * 获取奖励账户冻结状态
	 * @param unknown_type $user_id
	 */
    public function getFreezeStatusOfBonusAccount($user_id)
    {
        $key = "$user_id:price:freeze:";
        try {
            $freeze_value = Yii::app()->redis->get($key);
        } catch (Exception $e) {
            $freeze_value = '';
        }
        
        if($freeze_value == 'yes') {
            return 1;
        } else {
            return 0;
        }
    }
    
    /**
     * 解冻奖励账户
     */
    public function unfreezeBonusAccount($user_id)
    {
        $key = "$user_id:price:freeze:";
        try {
            return Yii::app()->redis->delete($key);
        } catch (Exception $e) {
            return false;
        }
    }
    
	/**
     * 冻结奖励账户
     */
    public function freezeBonusAccount($user_id, $freezeTime = 1800)
    {
        $key = "$user_id:price:freeze:";
        try {
            return Yii::app()->redis->setex($key, $freezeTime, 'yes');
        } catch (Exception $e) {
            return false;
        }
    }

}
