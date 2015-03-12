<?php
Yii::import("application.thirdlib.phpexcel.*");  
require_once "PHPExcel.php";
require_once 'PHPExcel/IOFactory.php';
require_once 'PHPExcel/Reader/Excel5.php';
$resultPHPExcel = new PHPExcel();
$resultPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$resultPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$resultPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$resultPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$resultPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$resultPHPExcel->getActiveSheet()->setCellValue('A1','客户名称');
$resultPHPExcel->getActiveSheet()->setCellValue('B1','外呼状态');
$resultPHPExcel->getActiveSheet()->setCellValue('C1','满意度');
$resultPHPExcel->getActiveSheet()->setCellValue('D1','外呼时间');
$resultPHPExcel->getActiveSheet()->setCellValue('E1','描述');

$i = 2;
foreach($model as $item){
	
	$resultPHPExcel->getActiveSheet()->setCellValue('A'.$i,$item->user->user_name);
	$resultPHPExcel->getActiveSheet()->setCellValue('B'.$i,$item->getTypeStatus());
	$resultPHPExcel->getActiveSheet()->setCellValue('C'.$i,$item->getSatisfaction());
	$resultPHPExcel->getActiveSheet()->setCellValue('D'.$i,$item->time);
	$resultPHPExcel->getActiveSheet()->setCellValue('E'.$i,$item->descript);
	$i ++;
}

$outputFileName = 'callRecord.xls';
$xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);

//ob_start(); ob_flush();

header("Content-Type:application/force-download");
header("Content-Type:application/octet-stream");
header("Content-Type:application/download");
header('Content-Disposition:inline;filename="'.$outputFileName.'"');
header("Content-Transfer-Encoding: binary");
header("Expires:Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified:".gmdate("D, d M Y H:i:s") ."GMT");
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
header("Pragma:no-cache");

$finalFileName =(Yii::app()->basePath.'/runtime/'.time().'.xls');
$xlsWriter->save($finalFileName);
echo file_get_contents($finalFileName);


