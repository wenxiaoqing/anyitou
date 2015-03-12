<?php
header("Content-type:text/html;charset=utf-8");
Yii::import("application.thirdlib.phpexcel.*");
require_once "PHPExcel.php";
require_once 'PHPExcel/IOFactory.php';
require_once 'PHPExcel/Reader/Excel5.php';


$tmp_file =$_FILES['inputExcel']['tmp_name'];
$file_types =explode(".",$_FILES['inputExcel']['name'] );
$file_type = $file_types[count($file_types)-1];
	    		
/*判别是不是.xls文件，判别是不是excel文件*/
if (strtolower($file_type)!= "xlsx" && strtolower($file_type)!= "xls")
{
  echo '{"code":1,"message":"文件格式不正确!"}';
  exit();
}
	    	
$objPHPExcel = new PHPExcel();
//读入上传文件

if($_FILES){
	if ($_FILES["inputExcel"]["error"] > 0)
	{
		echo '{"code":1,"message":"文件错误!"}';
		exit();
	}
	
	if (file_exists("data/excel/".$_FILES["inputExcel"]["name"]))
	{
		echo '{"code":1,"message":"文件已存在!"}';
		exit();
	}else if(!move_uploaded_file($_FILES["inputExcel"]["tmp_name"],"data/excel/".$_FILES["inputExcel"]["name"])){
		echo '{"code":1,"message":"文件移动失败,请检查文件名!"}';
		exit();
	}
	
	$objPHPExcel = PHPExcel_IOFactory::load("data/excel/".$_FILES["inputExcel"]["name"]);
	$currentSheet = $objPHPExcel->getSheet(0); /* * 读取excel文件中的第一个工作表 */
	$allColumn = $currentSheet->getHighestColumn();/**取得最大的列号*/
	$allRow = $currentSheet->getHighestRow(); /* * 取得一共有多少行 */
	PHPExcel_Cell::columnIndexFromString(); //字母列转换为数字列 如:AA变为27
	for($currentRow = 2; $currentRow <= $allRow; $currentRow = $currentRow + 2) {
		$session = $currentSheet->getCellByColumnAndRow(0, $currentRow)->getValue();
		$group = $currentSheet->getCellByColumnAndRow(1, $currentRow)->getValue();
		$keyword =  $currentSheet->getCellByColumnAndRow(2, $currentRow)->getValue();
		
		$type_id=Yii::app()->db->createCommand()
		->select('id')
		->from(user_channel_type)
		->where("name=:name",array(':name'=>$session))
		->queryAll();
		
		if(!$type_id){
			echo '{"code":0,"message":"不存在'.$session.'推广计划!"}';
			exit();
		}
	
	}
	
	for($currentRow = 2; $currentRow <= $allRow; $currentRow = $currentRow + 2) {
		$session = $currentSheet->getCellByColumnAndRow(0, $currentRow)->getValue();
		$group = $currentSheet->getCellByColumnAndRow(1, $currentRow)->getValue();
		$keyword =  $currentSheet->getCellByColumnAndRow(2, $currentRow)->getValue();
	
    	$type_id = Yii::app()->db->createCommand()
    	->select("id")
    	->from("user_channel_type")
    	->where('name=:name', array(':name'=>$session))
    	->queryAll();
    	
    	foreach($type_id as $id){
    		$res=Yii::app()->db->createCommand()->insert("user_channel",array(
    				'title'=>$group,
    				'type_id'=>$id['id'],
    				'keyword'=>$keyword,
    		));
    		
    		$insertId=Yii::app()->db->getLastInsertID();
    		
    		$data=Yii::app()->db->createCommand()
    		->select('*')
    		->from('user_channel')
    		->where('id=:id',array(':id'=>$insertId))
    		->queryAll();
    		
    		foreach($data as $key=>$val){
    			$type_id=$val['type_id'];
    			$channel_key=$insertId.'_'.$type_id;
    			$res = Yii::app()->db->createCommand()->update('user_channel', array('channel_key'=>$channel_key), 'id=:id',array(':id'=>$insertId));
    			if(!$res){
    				echo '{"code":1,"message":"拼接失败!"}';
    				exit();
    			}
    		}
    	}
	}
	
	if($res){
		echo '{"code":0,"message":"全部导入成功!"}';
		exit();
	}else{
		echo '{"code":1,"message":"导入失败!"}';
		exit();
	}
}
