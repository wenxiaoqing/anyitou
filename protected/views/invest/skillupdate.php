<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看投资技巧';

$this->breadcrumbs=array(
	'投资技巧管理' => array('skilllist'), '查看投资技巧',
);

$this->menu=array(
	array('label'=>'项目投资技巧', 'url'=>array('skilllist')),
	array('label'=>'编辑投资技巧', 'url'=>array('skillupdate', 'id' => $model['id'])),
	array('label'=>'创建投资技巧', 'url'=>array('skillcreate')),
);
?>



<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

//echo $this->renderPartial('_infoForm', array( 'model' => $model));

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->createUrl('skillupdate', array('id' => Yii::app()->request->getParam('id'))); ?>" >基本信息</a></li>
	</ul>
	<div class="tab-content" >


<?php 
	echo $this->renderPartial('_skillForm', array( 
		'model' => $model,
    ));
?>







	</div>
</div>
