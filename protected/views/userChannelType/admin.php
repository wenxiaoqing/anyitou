<?php
/* @var $this UserChannelController */
/* @var $model UserChannel */

$this->breadcrumbs=array(
	'渠道管理'=>array('admin'),
	'渠道列表',
);

$this->menu=array(
		array('label'=>'添加渠道', 'url'=>array('create')),
		array('label'=>'渠道管理','url'=>array('/userChannel/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-channel-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>


<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-channel-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name' => 'id',
            'value' => '$data->id',
			'type' => 'raw',
			'headerHtmlOptions' => array('style' => 'width:80px;'),
        ),
		'name',
		'keywords',
		'add_time',
		array(
            'name' => 'status',
            'value' => '$data->getStatus()',
			'filter' => $model->statusAttrs,
    	    'headerHtmlOptions' => array('style' => 'width:80px;'),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
			
      array(
		'class'=>'CButtonColumn',
		'header'=>'操作',
		'template' => '{view}{update}{delete}{link}',
		'buttons' => array(
				'view' => array(
						'label'=>'查看',
						'url'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
				),
				'update' => array(
						'label'=>'编辑',
						'url'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
				),
				'delete' => array(
						'label'=>'删除',
						'url'=>'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))',
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
				),
				'link' => array(
						'label'=>'关键词',
						'url'=>'Yii::app()->controller->createUrl("userChannel/admin",array("type_id"=>$data->primaryKey))',
						'options'=>array('style'=>'cursor:pointer;', 'target' => '_blank', 'class' => ''),
				),
		),
	),
	),
	'pager'=>array(
			'class'=>'application.extensions.widgets.CCLinkPager',    
			'header' => '',
			'maxButtonCount' => '5', 
			'prevPageLabel' => '上一页',
			'nextPageLabel' => '下一页',
			'firstPageLabel' => '首页', 
			'lastPageLabel' => '尾页',
			'htmlOptions' => array('class' => 'pagination'),
	),
	'template' => '{items}{summary}{pager}',
)); 
?>

