<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看投资故事';

$this->breadcrumbs=array(
	'投资故事管理' => array('storieslist'), '查看投资故事',
);

$this->menu=array(
	array('label'=>'项目投资故事', 'url'=>array('storieslist')),
	array('label'=>'编辑投资故事', 'url'=>array('storiesupdate', 'id' => $model['id'])),
	array('label'=>'创建投资故事', 'url'=>array('storiescreate')),
);
?>



<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");

//echo $this->renderPartial('_infoForm', array( 'model' => $model));

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo $this->createUrl('storiesupdate', array('id' => Yii::app()->request->getParam('id'))); ?>" >基本信息</a></li>
	</ul>
	<div class="tab-content" >


<?php 
	echo $this->renderPartial('_storiesForm', array( 
		'model' => $model,
    ));
?>







	</div>
</div>
