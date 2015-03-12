<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看评论';

$this->breadcrumbs=array(
	'评论管理' => array('list'), '查看评论',
);

$this->menu=array(
	array('label'=>'评论列表', 'url'=>array('list')),
	array('label'=>'评论审核', 'url'=>array('update', 'id' => $model['id'])),
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
