<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '编辑项目';

$this->breadcrumbs=array(
	'项目管理' => array('admin'),
	'编辑项目',
);

$this->menu=array(
	array('label'=>'项目列表', 'url'=>array('admin')),
	array('label'=>'查看项目', 'url'=>array('view', 'id' => $_GET['id'])),
	array('label'=>'创建项目', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");


?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="<?php if(Yii::app()->request->getParam('type') == 'info' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('updateFangdai', array('id' => Yii::app()->request->getParam('id'),'type' => 'info')); ?>" >基本信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'detail'){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('updateFangdai', array('id' => Yii::app()->request->getParam('id'), 'type' => 'detail')); ?>" >详细信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'house'){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('updateFangdai', array('id' => Yii::app()->request->getParam('id'), 'type' => 'house')); ?>" >房产信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'verify'){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('updateFangdai', array('id' => Yii::app()->request->getParam('id'),'type' => 'verify')); ?>" >审核信息</a></li>
	</ul>
	<div class="tab-content" >
	<?php 
	if(Yii::app()->request->getParam('type') == 'detail') {
		echo $this->renderPartial('_fangdai_detailForm', array( 'model' => $model));
	} else if(Yii::app()->request->getParam('type') == 'verify'){
        echo $this->renderPartial('_verify',array('data'=>$data));
    } else if(Yii::app()->request->getParam('type') == 'house'){
        echo $this->renderPartial('_fangdai_houseForm',array('data'=>$model));
    } else {
		echo $this->renderPartial('_fangdai_infoForm', array(
				'model' => $model,
				'companyModel' => $companyModel,
			    'guaranteeModels' => $guaranteeModels,
				'borrower_user'=>$borrower_user,
		    ));
	}
	?>
	</div>
</div>