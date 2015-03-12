<?php
/* @var $this UserController */
/* @var $model SmsSend */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'短信日志',
);

$this->menu=array(
);
 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#smslog-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
	    <li class="<?php if(Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/user/SmsLog'); ?>" >全部短信</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == '1' ){ echo ' active'; } ?>"><a href="<?php echo $this->createUrl('/user/SmsLog', array('type' => '1')); ?>" >注册短信</a></li>
	</ul>
	<div class="tab-content" >
    <?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
        <div class="wide form form-horizontal">
        <?php $form=$this->beginWidget('CActiveForm', array(
        	'action'=>Yii::app()->createUrl($this->route),
        	'method'=>'get',
        )); ?>
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'mobile', array('class' => 'col-sm-2 control-label')); ?>
        		<div class="col-sm-5">
        		<?php echo $form->textField($model, 'mobile', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
        		</div>
        		<div class="col-sm-5 control-info"></div>
        	</div>
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'type', array('class' => 'col-sm-2 control-label')); ?>
        		<div class="col-sm-5">
        		<?php echo $form->textField($model, 'type', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
        		</div>
        		<div class="col-sm-5 control-info"></div>
        	</div>
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'channel', array('class' => 'col-sm-2 control-label')); ?>
        		<div class="col-sm-5">
        		<?php echo $form->textField($model, 'channel', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
        		</div>
        		<div class="col-sm-5 control-info"></div>
        	</div>
        	<div class="form-group">
        		<?php echo $form->labelEx($model,'time', array('class' => 'col-sm-2 control-label')); ?>
        		<div class="col-sm-5">
        		<?php echo $form->textField($model, 'time', array('class' => 'form-control col-sm-4 isrequired', 'size'=>20,'maxlength'=>20)); ?>
        		</div>
        		<div class="col-sm-5 control-info"></div>
        	</div>
        	<div class="form-group">
        		<div class="col-sm-2"></div>
        		<div class="col-sm-10">
        			<?php echo CHtml::submitButton('搜索', array('class' => 'btn btn-large btn-primary', 'id' => 'submitBtn')); ?>
        		</div>
        	</div>
        <?php $this->endWidget(); ?>
        </div>
    </div><!-- search-form -->
    
    <?php $this->widget('zii.widgets.grid.CGridView', array(
    	'id'=>'smslog-grid',
    	'dataProvider'=>$model->search(),
    	'filter'=>$model,
    	'columns'=>array(
    		array(
    		    'name' => 'id',
    		    'value' => '$data->id',
    		    'headerHtmlOptions' => array('width' => '60'),
    		),
    		'mobile',
    		array(
    		    'name' => 'message',
    		    'value' => '$data->message',
    		    'headerHtmlOptions' => array('width' => '320'),
    		),
    		'time',
    		'type',
    		'channel',
            /*array(
    			'class'=>'CButtonColumn',
    			'header' => '操作',
    			'headerHtmlOptions' => array('width' => '120'),
    		),*/
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
	</div>
</div>
