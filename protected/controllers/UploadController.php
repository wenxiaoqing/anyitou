<?php

class UploadController extends Controller
{
	
	/**
	 * 上传项目相关图片
	 */
	public function actionItemCover()
	{
	    $uploadPath = '/data/item/cover/';
	    
	    $itemId = intval($_GET['itemid']);
	    if($itemId == 0) {
	        $response['error'] = 1;
	        $response['message'] = '请选择项目后再上传！';
	        $this->echoJson($response);
	    }
	    
	    $saveDir = '';
	    
	    $UploadClass = new UploadClass();
	    $UploadClass->setUploadPath(APP_DIR .$uploadPath);
	    $res = $UploadClass->uploadImage($_FILES['imgFile'], $saveDir, $itemId);
	    
	    $response = array();
	    if($res != false) {
	        $imgUrl = $uploadPath.$saveDir.$res['file_name'];
	        $response['error'] = 0;
	        $response['url'] = $imgUrl;
	        
	        $ProjectClass = new ProjectClass();
	        $upFlag = $ProjectClass->updateConver($itemId, $imgUrl);
	        if($upFlag == false) {
	            $response['error'] = 1;
	            $response['message'] = '上传失败！'.$ProjectClass->error;
	        }
	    } else {
	        $response['error'] = 1;
	        $response['message'] = '上传失败！'.$UploadClass->error;
	    }
	    
	    $this->echoJson($response);
	}

    public function actionItemImg()
	{
	    $uploadPath = '/data/item/img/';
	    $saveDir = date('Ym').'/'.date('d').'/';
	    
	    $UploadClass = new UploadClass();
	    $UploadClass->setUploadPath(APP_DIR .$uploadPath);
	    $res = $UploadClass->uploadImage($_FILES['imgFile'], $saveDir);

	    $response = array();
	    if($res != false) {
	        $imgUrl = $uploadPath.$saveDir.$res['file_name'];
	        $response['error'] = 0;
	        $response['url'] = $imgUrl;
	    } else {
	        $response['error'] = 1;
	        $response['message'] = '上传失败！'.$UploadClass->error;
	    }
	    
	    $this->echoJson($response);
	}
	
    public function actionArticleImg()
	{
	    $uploadPath = '/data/article/img/';
	    $saveDir = date('Ym').'/'.date('d').'/';
	    
	    $UploadClass = new UploadClass();
	    $UploadClass->setUploadPath(APP_DIR .$uploadPath);
	    $res = $UploadClass->uploadImage($_FILES['imgFile'], $saveDir);
	    
	    $response = array();
	    if($res != false) {
	        $imgUrl = $uploadPath.$saveDir.$res['file_name'];
	        $response['error'] = 0;
	        $response['url'] = $imgUrl;
	    } else {
	        $response['error'] = 1;
	        $response['message'] = '上传失败！'.$UploadClass->error;
	    }
	    
	    $this->echoJson($response);
	}
	
    public function actionCompanyImg()
	{
	    $uploadPath = '/data/company/img/';
	    $saveDir = date('Ym').'/'.date('d').'/';
	    
	    $UploadClass = new UploadClass();
	    $UploadClass->setUploadPath(APP_DIR .$uploadPath);
	    $res = $UploadClass->uploadImage($_FILES['imgFile'], $saveDir);
	    
	    $response = array();
	    if($res != false) {
	        $imgUrl = $uploadPath.$saveDir.$res['file_name'];
	        $response['error'] = 0;
	        $response['url'] = $imgUrl;
	    } else {
	        $response['error'] = 1;
	        $response['message'] = '上传失败！'.$UploadClass->error;
	    }
	    
	    $this->echoJson($response);
	}
	
}