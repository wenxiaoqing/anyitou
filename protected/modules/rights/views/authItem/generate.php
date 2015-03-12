<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Generate items'),
); ?>


<div class="portlet box blue ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i>创建频道
		</div>
		<div class="tools"></div>
	</div>
	<div class="portlet-body form">
		<div id="generator" >
		<?php $form=$this->beginWidget('CActiveForm'); ?>
			<div class="form-body">
			<div class="">
				<table class="table items generate-item-table" border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr class="application-heading-row">
							<th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
						</tr>
						<?php $this->renderPartial('_generateItems', array(
							'model'=>$model,
							'form'=>$form,
							'items'=>$items,
							'existingItems'=>$existingItems,
							'displayModuleHeadingRow'=>true,
							'basePathLength'=>strlen(Yii::app()->basePath),
						)); ?>
					</tbody>
				</table>
			</div>
			<div class="">
   				<?php echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
   					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
   					'class'=>'selectAllLink')); ?>
   				/
				<?php echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
					'class'=>'selectNoneLink')); ?>
			</div>
		</div>
		<div class="form-actions fluid">
			<div class="col-sm-12">
				<?php echo CHtml::submitButton(Rights::t('core', 'Generate'), array('class' => 'btn btn-primary')); ?>            
			</div>
		</div>
		<?php $this->endWidget(); ?>
		</div>
	</div>
</div>