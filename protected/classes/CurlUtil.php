<?php
/**
 * @file CurlUtil.php
 * @author machangqi
 * @date 2014/05/05
 * @version 1.0 
 *  
 **/

final class CurlUtil
{
	private static $defaultOpts = array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_HEADER => 1,
		CURLOPT_FOLLOWLOCATION => 3,  
		CURLOPT_ENCODING => '',	    
		CURLOPT_AUTOREFERER => 1,
		CURLOPT_CONNECTTIMEOUT => 60,
		CURLOPT_TIMEOUT => 60,
		CURLOPT_MAXREDIRS => 3,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => false,
	);
	private static $fixedOpts = array(CURLOPT_RETURNTRANSFER,CURLOPT_HEADER);

	private static function getOptions($opt)
	{
		foreach(self::$fixedOpts as $key) {
			unset($opt[$key]);
		}
		$ret = self::$defaultOpts;
		foreach($opt as $key=>$value) {
			$ret[$key] = $value;
		}
		return $ret;
	}

	public static function get($url,$opt=array())
	{
		$opt[CURLOPT_HTTPGET] = true;
		$ret = self::request($url,$opt);
		return self::returnData($ret);
	}

	public static function post($url,$postData=array(),$opt=array())
	{
		$opt[CURLOPT_POST] = true;
		$opt[CURLOPT_POSTFIELDS] = http_build_query($postData);
		$ret = self::request($url,$opt);
		return self::returnData($ret);
	}

	private static function request($url,$opts)
	{
		$opts = self::getOptions($opts);
		$ch = curl_init($url);
		curl_setopt_array($ch,$opts);
		$data = curl_exec($ch);
		if ($data === false) {
			$info = curl_getinfo($ch);
			if($info['http_code'] != 200){
				$errmsg = curl_error($ch);
				throw new Exception('error occurred:'.$errmsg);
			}
		}
		$err = curl_errno($ch);
		$errmsg = curl_error($ch);
		curl_close( $ch );
		return array($err,$errmsg,$data);
	}

	private static function parse($ret)
	{
		$pos = strpos($ret,"\r\n\r\n");
		if (!$pos) {
			throw new Exception('Redirect occurred:'.$ret);
		}
		$header = substr($ret,0, $pos);
		$body = substr($ret,$pos+4);
		$headerLines = explode("\r\n",$header);
		$head = array_shift($headerLines);
		$cookies = array();
		$headers = array();
		foreach($headerLines as $line) {
			list($k,$v) = explode(":",$line);
			$k = trim($k);
			$v = trim($v);
			if ($k == 'Set-Cookie') {
				list($ck,$cv) = explode("=",$v);
				$cookies[trim($ck)] = trim($cv);
			} else {
				$headers[$k] = $v; 
			}   
		}   
		return array('header'=>$headers,
			'cookie'=>$cookies,
			'content'=>$body
		);
	}

	private static function returnData($ret)
	{
		list($err,$errmsg,$data) = $ret;
		if ($err) {
			throw new Exception('curl error '.$errmsg);
		}
		return self::parse($data);
	}
}
