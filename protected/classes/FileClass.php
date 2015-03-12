<?php

/**
 * 
 * 文件处理类
 * @author machangqi
 *
 */
class FileClass 
{
    
	/**
	 * 按指定路径生成目录
	 *
	 * @param    string     $path    路径
	 */
	public static function mkdirs($path)  {
		$adir = explode('/',$path);
		$aimDir = '';
		foreach($adir as $key=>$val) {
		    $aimDir .= $val.'/';
		    if($val == '' || $val == '.' || $val == '..') {
		        continue;
		    }
			if(!file_exists($aimDir)) {
				mkdir($aimDir);
				@chmod($aimDir,0777);
			}
		}
	}

}
