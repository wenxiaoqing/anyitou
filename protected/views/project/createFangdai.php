<?php
/* @var $this ProjectController */

$this->pageTitle = '创建项目';

$this->breadcrumbs=array(
	'项目管理' => array('admin'),
	'创建项目',
);

$this->menu=array(
	array('label'=>'项目列表', 'url'=>array('admin')),
);

?>
<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="<?php if(Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/project/create'); ?>" >安企贷</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'reward' ){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/project/create', array('type' => 'reward')); ?>" >新手项目</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'chedai' ){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/project/createChedai', array('type' => 'chedai')); ?>" >安车贷</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'fangdai' ){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/project/createFangdai', array('type' => 'fangdai')); ?>" >安房贷</a></li>
	</ul>
	<?php echo $this->renderPartial('_fangdai_infoForm', array( 
						'model' => $model,
						'guaranteeModels' => $guaranteeModels,
						'companyModel' => $companyModel,
				));

	?>
</div>