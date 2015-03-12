<?php
/**
 * 封装实用类，字符串utf8截取等
 */
class UtilClass
{
    /**
     * 获取客户端IP
     *
     * @return string
     */
    public static function getClientIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * mix subUTF8Str(string $input_string, int $start_index, int $length = -1, bool $ignore_invalid_utf8_char = true)
     * @param $input_str
     * @param $start start index, must be large than 0
     * @param $length. if $length <0, return all text begin from $start
     * @param $ignore_error whether ignore the invalid characters (in return string, these invalid chars will be replaced with '?') or not. default is true (ignore)
     * @return the substring, or false (empty string '')
     */
    public static function subUTF8Str($input_str, $start, $length = -1, $ignore_error = true)
    {
        if($start<0 || $length == 0)
        return false;
        //discard preg_split function. it consumes too much system resource when it tries to split a big string to pieces
        //$raw_arr = preg_split('//',$input_str,-1, PREG_SPLIT_NO_EMPTY);
        //find start
        $si = 0;
        $si_single = 0;
        while($si < $start)
        {
            $hm = self::validUTF8Char($input_str, $si_single);
            if($hm == -1)
            {
                //ignore invalid character?
                if(!$ignore_error)
                return false;
                //array_shift is very slow
                //array_shift($raw_arr);
                $si++;
                $si_single++;
            }
            else if($hm == 0)
            {
                //$start is bigger than the utf8_length of inputString
                return false;
            }
            else
            {
                //for($i=0; $i<$hm; $i++) array_shift($raw_arr);
                $si++;
                $si_single += $hm;
            }
        }
        if($length < 0)
        //return implode('', $raw_arr);
        return substr($input_str, $si_single);
        $ret_arr = array();
        $li = 0;
        while($li < $length)
        {
            $hm = self::validUTF8Char($input_str, $si_single);
            if($hm == -1)
            {
                if(!$ignore_error)
                return false;
                $ret_arr[] = '?';
                //array_shift($raw_arr);
                $li++;
                $si_single++;
            }
            else if($hm == 0)
            {
                //end of string
                return implode('', $ret_arr);
            }
            else
            {
                //for($i=0; $i<$hm; $i++) $ret_arr[] = array_shift($raw_arr);
                for($i=0; $i<$hm; $i++) $ret_arr[] = $input_str{$si_single++};
                $li++;
            }
        }
        return implode('', $ret_arr);
    }

    /**
     * int strlenUTF8(string $input_string, bool $ignore_invalid_utf8_char = true)
     * @return length of string encoded as utf8 ( how many utf8 characters )
     * -1 if given $ignore_error is false and there's invalid utf8 char in the inputString
     * @note if $ignore_error is true (the default value), every invalid utf8 character will be count as ONE utf8 char
     */
    public static function strlenUTF8($input_str, $ignore_error = true)
    {
        //$raw_arr = preg_split('//',$input_str,-1, PREG_SPLIT_NO_EMPTY);
        $len = 0;
        $si_single = 0;
        while(($hm = self::validUTF8Char($input_str, $si_single)) != 0)
        {
            if($hm == -1)
            {
                if(!$ignore_error)
                return -1;
                //array_shift($raw_arr);
                $si_single++;
            }
            else
            //for($i=0; $i<$hm; $i++) array_shift($raw_arr);
            $si_single += $hm;
            $len++;
        }
        return $len;
    }


    /**
     * int validUTF8Char(string $input_str, $start = 0)
     * Is it a valid utf8 character
     * @param $input_str input string
     * @param $start start index
     * @return the ascii bytes of the utf8 char if it is a valid utf8 char. 0 if input array is empty, or -1 if it's invalid
     * @note don't use pass-by-reference for $in_arr here, otherwise efficiency will decreased significantly
     * @note change param $in_arr from char array to string ($input_str), for porformance purpose.
     * @note preg_split consumes too much memory and cpu when split a big string to char array
     */
    function validUTF8Char($input_str, $start = 0)
    {
        $size = strlen($input_str);
        if($size <=0 || $start < 0 || $size <= $start) return 0;

        $in_ord = ord($input_str{$start});
        $us = 0;
        if($in_ord <= 0x7F) { //0xxxxxxx
            return 1;
        } else if($in_ord >= 0xC0 && $in_ord <= 0xDF ) { //110xxxxx 10xxxxxx
            $us = 2;
        } else if($in_ord >= 0xE0 && $in_ord <= 0xEF ) { //1110xxxx 10xxxxxx 10xxxxxx
            $us = 3;
        } else if($in_ord >= 0xF0 && $in_ord <= 0xF7 ) { //11110xxx 10xxxxxx 10xxxxxx 10xxxxxx
            $us = 4;
        } else if($in_ord >= 0xF8 && $in_ord <= 0xFB ) { //111110xx 10xxxxxx 10xxxxxx 10xxxxxx 10xxxxxx
            $us = 5;
        } else if($in_ord >= 0xFC && $in_ord <= 0xFD ) { //1111110x 10xxxxxx 10xxxxxx 10xxxxxx 10xxxxxx 10xxxxxx
            $us = 6;
        } else
        return -1;

        if($size - $start < $us)
        return -1;

        for($i=1; $i<$us; $i++)
        {
            $od = ord($input_str{$start+$i});
            if($od <0x80 || $od > 0xBF)
            return -1;
        }
        return $us;
    }

    public static function getRandomPass($len=6,$format='ALL',$delsame=false)
    {
        switch($format) {
            case 'ALL':
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; break;
            case 'CHAR':
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; break;
            case 'NUMBER':
                $chars='0123456789'; break;
            default :
                $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                break;
        }
        if ($delsame)
        $chars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
        mt_srand((double)microtime()*1000000*getmypid());
        $password="";
        while(strlen($password)<$len)
        $password.=substr($chars,(mt_rand()%strlen($chars)),1);
        return $password;
    }


    public static function weightedRandom($choice_map)
    {
        $count = count($choice_map);
        $values = array();
        $weights = array();
        foreach($choice_map as $value=>$weight)
        {
            if(intval($weight) == 0)
            continue;
            $values []= $value;
            $weights []= intval($weight);
        }

        if(count($values)==0)
        return false;

        $i = 0;
        $n = 0;
        $num = mt_rand(1, array_sum($weights));
        while($i < $count)
        {
            $n += $weights[$i];
            if($n >= $num)
            {
                break;
            }
            $i++;
        }
        return $values[$i];
    }

    public static function replaceMobile($mobile)
    {
        $p = substr($mobile,0,4)."****".substr($mobile,8,3);
        return $p;
    }

    /**
     * PHP获取字符串中英文混合长度
     * @param $str string 字符串
     * @param $$charset string 编码
     * @return 返回长度，1中文=1位，2英文=1位
     */
    public static function strLength($str,$charset='utf-8'){
        if($charset=='utf-8') $str = iconv('utf-8','gb2312',$str);
        $num = strlen($str);
        $cn_num = 0;
        for($i=0;$i<$num;$i++){
            if(ord(substr($str,$i+1,1))>127){
                $cn_num++;
                $i++;
            }
        }
        $en_num = $num-($cn_num*2);
        $number = ($en_num/2)+$cn_num;
        return ceil($number);
    }

    /**
     * 二维数组排序
     *
     * @param Array $arr 要排序的数组
     * @param String $keyName 要参照的第二维的KEY
     * @param Int	$desc 排序 0正序 1逆序
     * @return Array
     */
    public static function dArraySort($arr, $keyName , $desc=0)
    {
        if (!is_array($arr))
        {
            return $arr;
        }

        foreach($arr AS $key => $row)
        {
            $temp[$key] = $row[$keyName];
        }
        if($desc==1)
        array_multisort($temp, SORT_DESC,$arr);
        else
        array_multisort($temp, SORT_ASC,$arr);
        return $arr;
    }

    /**
     * 过滤sql关键字函数
     */
    public static function checkSQLkey($str)
    {
        $key_arr = array("update","select","insert","delete","alter","drop","create","#","*");
        $cnt = 0;
        $str = strtolower($str);
        foreach ($key_arr as $key)
        {
            if (strpos($str, $key) !== false)
            {
                $cnt ++;
                break;
            }
        }
        if ($cnt > 0)
        return false;
        else
        return true;
    }

    public static function checkWap()
    {
        $content = "";
        if(isset($_SERVER['HTTP_USER_AGENT']))
        $content = $_SERVER['HTTP_USER_AGENT'];
        else if(isset($_SERVER['HTTP_VIA']))
        $content = $_SERVER['HTTP_VIA'];
        $content = strtolower($content);
        $regex_match = "/iphone|android/i";
        if(preg_match($regex_match, $content))
        return 1;
        $regex_match="/(nokia|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
        $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
        $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
        $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
        $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
        $regex_match.=")/i";
        if(preg_match($regex_match, $content))
        return 2 ;

        return 0;
    }

    public static function microtime_float()
    {
        list($usec,$sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    public static function mkdirs($dir,$mode = 0777)
    {
        if (!is_dir($dir)) {
            self::mkdirs(dirname($dir), $mode);
            return mkdir($dir, $mode);
        }
        return true;
    }

    /*递归生成 目录
     * return bool
     * access dir
     */
    public static function  Directorys( $dir ){
        return   is_dir ( $dir )  or  (self::Directorys(dirname( $dir ))  and   mkdir ( $dir , 0777));
    }

    public static function ob2ar($obj){
        if(is_object($obj)) {
            $obj = (array)$obj;
            $obj = self::ob2ar($obj);
        } elseif(is_array($obj)) {
            foreach($obj as $key => $value) {
                $obj[$key] = self::ob2ar($value);
            }
        }
        return $obj;
    }
    
    /**
     * 删除所有的换行
     *
     * @param string $content
     * @access public
     * @return string
     */
    public static function filterEnter($content) {
        return strtr($content, array("\n" => '', "\r" => ''));
    }

    /**
     * 过滤字符串
     *
     * @param mixed $string
     * @param mixed $length
     * @param int $in_slashes
     * @param int $out_slashes
     * @param int $html
     * @access public
     * @return void
     */
    public static function getStr($string, $length, $inSlashes = 0, $outSlashes = 0, $html = 0, $isDiff = 0){
        $string = trim($string);
        if($inSlashes)
        //传入的字符有slashes
        $string = self::sstripslashes($string);

        if($html < 0)
        {
            //去掉html标签
            $string = preg_replace("/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is", ' ', $string);
            $string = self::shtmlspecialchars($string);
        }
        elseif($html == 0)
        //转换html标签
        $string = self::shtmlspecialchars($string);

        if($outSlashes)
        $string = self::saddslashes($string);

        return trim($string);
    }

    /**
     * 去掉slassh
     *
     * @param mixed $string
     * @access public
     * @return void
     */
    public static function sstripslashes($string)
    {
        if(is_array($string))
        {
            foreach($string as $key => $val)
            {
                $string[$key] = self::sstripslashes($val);
            }
        }
        else
        $string = stripslashes($string);

        return $string;
    }

    /**
     * 取消HTML代码
     *
     * @param mixed $string
     * @access public
     * @return void
     */
    public static function shtmlspecialchars($string)
    {
        if(is_array($string))
        {
            foreach($string as $key => $val)
            {
                $string[$key] = self::shtmlspecialchars($val);
            }
        }
        else
        {
            $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
            str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
        }
        return $string;
    }

    /**
     * 添加过滤转义
     *
     * @param mixed $string
     * @access public
     * @return void
     */
    public static function saddslashes($string)
    {
        if(is_array($string))
        {
            foreach($string as $key => $val)
            {
                $string[$key] = self::saddslashes($val);
            }
        }
        else
        $string = addslashes($string);

        return $string;
    }

    /**
     * 自动补齐4位长度工具
     */
    public static function fourLength($str)
    {
        $len = strlen($str);
        if ($len <= 0)
        {
            return 0;
        }
        if ($len < 10)
        {
            $len = '000'.$len;
        }
        elseif ($len < 100) {
            $len = '00'.$len;
        }
        elseif ($len < 1000)
        {
            $len = '0'.$len;
        }
        return $len;
    }

    /**
     * 格式化显示资金
     * @param number $money
     * @param int $precision
     * @param string $type   values: default,special
     */
    public static function formatMoney($money, $precision = 2, $type = 'default')
    {
        if ($type == 'special' && ($money != 0 && $money % 10000 == 0) ) {
            $output = intval($money/10000).'万';
        } else {
            $output = number_format(self::floatValue($money, $precision), $precision);
        }
        return $output;
    }

    /**
     * 得到指定小数点精确度的浮点数
     * @param float $number
     * @param int $precision
     * @return float
     */
    public static function floatValue($number, $precision = 0)
    {
        if($precision == 0) {
            return $number;
        }
        $pow = pow(10, $precision);
        $value = $number * $pow;
        return floor(strval($value))/$pow;
    }
    
    /*
     *判断是否为手机号
     */
    public static function isMobile($mobile) {
        $rule = '/^1[3458][0-9]{9}$/';
        if(preg_match($rule, $mobile)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取手机号所属运营商
     * @param: string $phone
     * @return string $operator (CT：China Telecom  CM：China Mobile  CU：China Unicom)
     **/
    public static function getMobileOperator($phone) {
        $CM = array('134','135','136','137','138','139','150','151','152','158','159','157','187','188','147');
        $CU = array('130','131','132','155','156','185','186');
        $CT = array('133','153','180','189');

        $operator = '';

        if(in_array(substr($phone,0,3), $CT))
        $operator = 'CT';
        if(in_array(substr($phone,0,3), $CM))
        $operator = 'CM';
        if(in_array(substr($phone,0,3), $CU))
        $operator = 'CU';

        return $operator;
    }

}
