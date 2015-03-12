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
    array('label'=>'查看项目', 'url'=>array('chedaiView', 'id' => $model->id)),
    array('label'=>'创建项目', 'url'=>array('createChedai')),
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/kindeditor-all.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/kindeditor/lang/zh_CN.js");


?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="<?php if(Yii::app()->request->getParam('type') == 'info' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('chedaiUpdate', array('id' => Yii::app()->request->getParam('id'), 'type' => 'info')); ?>" >基本信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'detail'){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('chedaiUpdate', array('id' => Yii::app()->request->getParam('id'), 'type' => 'detail')); ?>" >详细信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'verify'){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('chedaiUpdate', array('id' => Yii::app()->request->getParam('id'),'type' => 'verify')); ?>" >审核信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'car'){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('chedaiUpdate', array('id' => Yii::app()->request->getParam('id'), 'type' => 'car')); ?>" >车辆信息</a></li>
	</ul>
	<div class="tab-content" >
	<?php 
	if(Yii::app()->request->getParam('type') == 'detail') {
		echo $this->renderPartial('_chedai_viewDetail', array( 'model' => $model));
	} elseif(Yii::app()->request->getParam('type') == 'verify'){
        echo $this->renderPartial('_verify',array('data'=>$data));
	} elseif(Yii::app()->request->getParam('type') == 'car') {
	    echo $this->renderPartial('_chedai_carForm', array( 'model' => $model));
	} else {
		echo $this->renderPartial('_chedaiUpdateInfo', array( 
				'model' => $model,
				'companyModel' => $companyModel,
			    'guaranteeModels' => $guaranteeModels,
				'evaluation_companys'=>$evaluation_companys,
				'user_name'=>$user_name,
				'guaranteeModel'=>$guaranteeModel,
		    ));
	}
	?>
	</div>
</div>