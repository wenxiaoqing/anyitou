<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看项目预告';

$this->breadcrumbs=array(
	'项目预告管理' => array('noticelist'), '查看项目预告',
);

$this->menu=array(
	array('label'=>'项目预告列表', 'url'=>array('noticelist')),
	array('label'=>'编辑预告项目', 'url'=>array('noticeupdate', 'id' => $model['id'])),
	array('label'=>'创建预告项目', 'url'=>array('noticecreate')),
);
?>



<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

//echo $this->renderPartial('_infoForm', array( 'model' => $model));

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->createUrl('noticeupdate', array('id' => Yii::app()->request->getParam('id'))); ?>" >基本信息</a></li>
	</ul>
	<div class="tab-content" >


<?php 
	echo $this->renderPartial('_noticeForm', array( 
		'model' => $model,
    ));
?>







	</div>
</div>
