<?php
Yii::import("application.thirdlib.phpexcel.*");  
require_once "PHPExcel.php";
require_once 'PHPExcel/IOFactory.php';
require_once 'PHPExcel/Reader/Excel5.php';
$resultPHPExcel = new PHPExcel();
$resultPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$resultPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$resultPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$resultPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$resultPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$resultPHPExcel->getActiveSheet()->setCellValue('A1','推广计划');
$resultPHPExcel->getActiveSheet()->setCellValue('B1','推广组');
$resultPHPExcel->getActiveSheet()->setCellValue('C1','');
$resultPHPExcel->getActiveSheet()->setCellValue('D1','关键词');
$resultPHPExcel->getActiveSheet()->setCellValue('E1','链接');

$i = 2;
foreach($model as $item){
	$resultPHPExcel->getActiveSheet()->setCellValue('A'.$i,$item['name']);
	$resultPHPExcel->getActiveSheet()->setCellValue('B'.$i,$item['title']);
	$resultPHPExcel->getActiveSheet()->setCellValue('C'.$i,'');
	$resultPHPExcel->getActiveSheet()->setCellValue('D'.$i,$item['keyword']);
	$resultPHPExcel->getActiveSheet()->setCellValue('E'.$i,'http://www.anyitou.com/channel/?from='.$item['channel_key']);
	$i ++;
}

$outputFileName = 'total.xls';
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


