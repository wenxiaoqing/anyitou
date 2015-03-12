<?php
/**
 * 车贷相关（资料，项目）审核处理
 * User: AkyLau
 * Date: 2015/1/16
 * Time: 15:53
 */
class Verify{

    public $_config = array();

    /**
     * 获取车贷相关配置信息
     */
    public function getConfig()
    {
        if($this->_config) {
            return $this->_config;
        }
        $this->_config = include Yii::app()->basePath.'/config/verify.php';
        return $this->_config;
    }
}