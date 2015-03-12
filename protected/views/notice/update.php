<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看公告';

$this->breadcrumbs=array(
	'公告管理' => array('list'), '查看公告',
);

$this->menu=array(
	array('label'=>'项目公告', 'url'=>array('list')),
	array('label'=>'编辑公告', 'url'=>array('update', 'id' => $model['notice_id'])),
	array('label'=>'创建公告', 'url'=>array('create')),
);
?>



<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

//echo $this->renderPartial('_infoForm', array( 'model' => $model));

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->createUrl('update', array('id' => Yii::app()->request->getParam('id'))); ?>" >基本信息</a></li>
	</ul>
	<div class="tab-content" >


<?php 
	echo $this->renderPartial('_noticeForm', array( 
		'model' => $model,
    ));
?>







	</div>
</div>
