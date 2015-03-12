<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看融资案例';

$this->breadcrumbs=array(
	'融资案例管理' => array('caselist'), '查看融资案例',
);

$this->menu=array(
	array('label'=>'项目融资案例', 'url'=>array('caselist')),
	array('label'=>'编辑融资案例', 'url'=>array('caseupdate', 'id' => $model['id'])),
	array('label'=>'创建融资案例', 'url'=>array('casecreate')),
);
?>



<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

//echo $this->renderPartial('_infoForm', array( 'model' => $model));

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->createUrl('caseupdate', array('id' => Yii::app()->request->getParam('id'))); ?>" >基本信息</a></li>
	</ul>
	<div class="tab-content" >


<?php 
	echo $this->renderPartial('_caseForm', array( 
		'model' => $model,
    ));
?>







	</div>
</div>
