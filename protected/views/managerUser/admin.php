<?php
/* @var $this ManagerUserController */
/* @var $model ManagerUser */

$this->breadcrumbs=array(
	'系统用户管理'=>array('admin'),
	'管理列表',
);

$this->menu=array(
	array('label'=>'管理列表', 'url'=>array('admin')),
	array('label'=>'创建用户', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#manager-user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'manager-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'email',
		array(
			'class'=>'CButtonColumn',
			'template' => '<div class="btn-group">
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
						    操作<span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu pull-right" role="menu">
						    <li>{view}</li>
						    <li>{update}</li>
						    <li>{auth}</li>
						  </ul>
						</div>',
			'buttons' => array(   
					'view' => array(   
						'label'=>'查看',
						'url'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',  
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
						'imageUrl' => false 
					),
					'update' => array(   
						'label'=>'编辑',
						'url'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',  
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
						'imageUrl' => false 
					),
					'auth' => array(
						'label'=>'授权管理',
						'url' => 'Yii::app()->controller->createUrl("/rights/assignment/user", array("id"=>$data->primaryKey))',
					),
			),
		),
	),
	'pager'=>array(
            'class'=>'application.extensions.widgets.CCLinkPager',    
			'header' => '',
			'maxButtonCount' => '15', 
			'prevPageLabel' => '上一页',
			'nextPageLabel' => '下一页',
			'firstPageLabel' => '首页', 
			'lastPageLabel' => '尾页',
			'htmlOptions' => array('class' => 'pagination')
	),
)); ?>
