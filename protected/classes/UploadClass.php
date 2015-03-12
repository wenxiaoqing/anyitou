<?php

/*
 * 项目处理类
 *
 */

class UploadClass
{

	public $error = '';
	public $errorCode = '';
	// 文件保存路径
	public $uploadPath = './upload';
	
	//定义允许上传的文件扩展名
    public $extArr = array(
    	'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
    );
    
    //最大文件大小
    public $max_size = 1000000;
	
	public function __construct()
	{
	    
	}
    
	/**
	 * 设置文件的上传路径
	 * 
	 * @param string $path
	 */
	public function setUploadPath($path)
	{
		$this->uploadPath = $path;
	}

    /**
     * 上传图片文件
     * @param $fileArray
     * @param string $save_dir
     * @param string $filename
     * @param string $filePrefix
     * @param bool $thumb
     * @param bool $multi
     * @return array|bool
     */
	public function uploadImage($fileArray, $save_dir = '', $filename = '', $filePrefix = '',  $thumb = false, $multi = false)
	{
	    
	    $res = $this->uploadFile($fileArray, 'image', $save_dir, $filename, $filePrefix);
        if($multi){
            $res = $this->uploadFile($fileArray, 'image', $save_dir, $filename, $filePrefix,true);
        }
	    
	    if($res == false) {
	        return false;
	    }
	    
	    if($thumb == true) {
	        $res['thumb_file_name'] = '';
	    }
	    
	    return $res;
	    
	}

    /**
     * @param $fileArray
     * @param $fileType
     * @param string $save_dir
     * @param string $filename
     * @param string $filePrefix
     * @param bool $multi
     * @return array|bool
     */
    public function uploadFile($fileArray, $fileType, $save_dir = '', $filename = '', $filePrefix = '',$multi = false)
	{
	    if(empty($fileArray)) {
	        $this->error = '参数错误';
	        $this->errorCode = '0001';
	        return false;
	    }
	    if(!isset($this->extArr[$fileType])) {
	        $this->error = sprintf('不支持%s类型文件', $fileType);
	        $this->errorCode = '0002';
	        return false;
	    }
	    
	    $arrowFileType = $this->extArr[$fileType];
	    
	    //PHP上传失败
        if($multi){
            if ($this->getFileError($fileArray,true)) {
                return false;
            }
        }else {
            if ($this->getFileError($fileArray)) {
                return false;
            }
        }
    	//原文件名
    	$file_name = $fileArray['name'];
    	//服务器上临时文件名
    	$tmp_name = $fileArray['tmp_name'];
    	//文件大小
    	$file_size = $fileArray['size'];

        /**
         * eidt by akylau
         */
        if($multi){
            $file_name = $fileArray['name'][0];
            $tmp_name = $fileArray['tmp_name'][0];
            $file_size = $fileArray['size'][0];
        }
        /**
         * edit end
         */

    	//保存路径
    	$save_path = $this->uploadPath.$save_dir;
    	//检查文件名
    	if (!$file_name) {
    		$this->error = '请选择文件。';
        	$this->errorCode = '2001';
        	return false;
    	}
    	
    	//检查目录
    	if (@is_dir($this->uploadPath) === false) {
    	    Yii::log('上传目录不存在: '.$this->uploadPath, 'error', 'upload');
    		$this->error = '上传目录不存在。';
        	$this->errorCode = '2002';
        	return false;
    	}
    	//检查目录写权限
    	if (@is_writable($this->uploadPath) === false) {
    	    Yii::log('上传目录没有写权限: '.$this->uploadPath, 'error', 'upload');
    		$this->error = '上传目录没有写权限。';
        	$this->errorCode = '2003';
        	return false;
    	}
    	//检查是否已上传
    	if (@is_uploaded_file($tmp_name) === false) {
    		$this->error = '上传失败。';
        	$this->errorCode = '2004';
        	return false;
    	}
    	//检查文件大小
    	if ($file_size > $this->max_size) {
    		$this->error = '上传文件大小超过限制。';
        	$this->errorCode = '2005';
        	return false;
    	}
    	//获得文件扩展名
    	$temp_arr = explode(".", $file_name);
    	$file_ext = array_pop($temp_arr);
    	$file_ext = trim($file_ext);
    	$file_ext = strtolower($file_ext);
    	//检查扩展名
    	if (in_array($file_ext, $arrowFileType) === false) {
    	    $this->error = '上传文件扩展名是不允许的扩展名。只允许'. implode(",", $arrowFileType).'格式。';
        	$this->errorCode = '2006';
        	return false;
    	}
    	//创建文件夹
    	if (!file_exists($save_path)) {
    		FileClass::mkdirs($save_path);
    	}
    	//新文件名
    	if($filename != '') {
    	    $new_file_name = $filename . '.' . $file_ext;
    	} else {
    	    $new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
    	}
    	
    	if($filePrefix != '') {
    	    $new_file_name = $filePrefix.'_'.$new_file_name;
    	}
    	//移动文件
    	$file_path = $save_path . $new_file_name;
    	if (move_uploaded_file($tmp_name, $file_path) === false) {
    		$this->error = '上传文件失败。';
        	$this->errorCode = '3001';
        	return false;
    	}
    	@chmod($file_path, 0644);
    	
    	return array('file_path' => $file_path, 'file_name' => $new_file_name);
	}
	
	/**
	 * 获取上传文件错误信息
	 * @param array $fileArray
     * @param bool $multi 是否多文件上传
	 */
	public function getFileError($fileArray,$multi = false)
	{
        /**
         * 原代码块
	    if (empty($fileArray['error'])) {
	        return 0;
	    }
         */
        //edit begin by akylau
        $file_error = $fileArray['error'];
        if($multi){
            $fileArray = 0;
            $file_error = $fileArray['error'][0];
            if(empty($file_error)) return false;
        }
        //edit end
    	switch($file_error){
    		case '1':
    			$this->error = '超过php.ini允许的大小。';
    			$this->errorCode = '1001';
    			break;
    		case '2':
    			$this->error = '超过表单允许的大小。';
    			$this->errorCode = '1002';
    			break;
    		case '3':
    			$this->error = '图片只有部分被上传。';
    			$this->errorCode = '1003';
    			break;
    		case '4':
    			$this->error = '请选择图片。';
    			$this->errorCode = '1004';
    			break;
    		case '6':
    			$this->error = '找不到临时目录。';
    			$this->errorCode = '1006';
    			break;
    		case '7':
    			$this->error = '写文件到硬盘出错。';
    			$this->errorCode = '1007';
    			break;
    		case '8':
    			$this->error = 'File upload stopped by extension。';
    			$this->errorCode = '1008';
    			break;
    		case '999':
    		default:
    			$this->error = '未知错误。';
    			$this->errorCode = '1999';
    	}
    	return $fileArray['error'];
	}

}
