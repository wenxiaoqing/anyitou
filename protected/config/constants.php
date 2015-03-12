<?php

require_once(dirname(__FILE__).'/status.php');

define("MOBILE_PATTERN","/^\s*1[3458][0-9]{9}\s*$/");
define("DATE_PATTERN","/^[1-2][0-9][0-9][0-9]-[0-1]{0,1}[0-9]-[0-3]{0,1}[0-9]$/");
define("MAX_NUM",18446744073709551616);

//允许兑换框输入错误的次数
define("MAX_CODE_INVALID_NUM",5);
//测试及线上不同域名静态变量
defined("DOMIAN_PREFIX","guoyu");