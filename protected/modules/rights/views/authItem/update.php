<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::getAuthItemTypeNamePlural($model->type)=>Rights::getAuthItemRoute($model->type),
	$model->name,
); ?>

<div id="updatedAuthItem">

	<div class="page-title" ><?php echo Rights::t('core', 'Update :name', array(
		':name'=>$model->name,
		':type'=>Rights::getAuthItemTypeName($model->type),
	)); ?></div>
	<div class="panel panel-primary">
		<div class="panel-body form">
			<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>
		</div>
	</div>
	<div class="relations span-11 last">
		<div class="note note-success">
			<p><h4><?php echo Rights::t('core', 'Relations'); ?></h4></p>
		</div>
		<?php if( $model->name!==Rights::module()->superuserName ): ?>

			<div class="parents">
				<div class="panel panel-primary">
					<div class="panel-heading">
			    		<span><?php echo Rights::t('core', 'Parents'); ?></span>
			    	</div>
			    	<div class="panel-body" >
						<?php $this->widget('zii.widgets.grid.CGridView', array(
							'dataProvider'=>$parentDataProvider,
							'template'=>'{items}',
							'hideHeader'=>true,
							'emptyText'=>Rights::t('core', 'This item has no parents.'),
							'htmlOptions'=>array('class'=>'grid-view parent-table mini'),
							'columns'=>array(
		    					array(
		    						'name'=>'name',
		    						'header'=>Rights::t('core', 'Name'),
		    						'type'=>'raw',
		    						'htmlOptions'=>array('class'=>'name-column'),
		    						'value'=>'$data->getNameLink()',
		    					),
		    					array(
		    						'name'=>'type',
		    						'header'=>Rights::t('core', 'Type'),
		    						'type'=>'raw',
		    						'htmlOptions'=>array('class'=>'type-column'),
		    						'value'=>'$data->getTypeText()',
		    					),
		    					array(
		    						'header'=>'&nbsp;',
		    						'type'=>'raw',
		    						'htmlOptions'=>array('class'=>'actions-column'),
		    						'value'=>'',
		    					),
							)
						)); ?>
					</div>
				</div>
			</div>
			<div class="children">
				<div class="panel panel-primary">
					<div class="panel-heading">
			    		<span><?php echo Rights::t('core', 'Children'); ?></span>
			    	</div>
			    	<div class="panel-body" >
						<?php $this->widget('zii.widgets.grid.CGridView', array(
							'dataProvider'=>$childDataProvider,
							'template'=>'{items}',
							'hideHeader'=>true,
							'emptyText'=>Rights::t('core', 'This item has no children.'),
							'htmlOptions'=>array('class'=>'grid-view parent-table mini'),
							'columns'=>array(
		    					array(
		    						'name'=>'name',
		    						'header'=>Rights::t('core', 'Name'),
		    						'type'=>'raw',
		    						'htmlOptions'=>array('class'=>'name-column'),
		    						'value'=>'$data->getNameLink()',
		    					),
		    					array(
		    						'name'=>'type',
		    						'header'=>Rights::t('core', 'Type'),
		    						'type'=>'raw',
		    						'htmlOptions'=>array('class'=>'type-column'),
		    						'value'=>'$data->getTypeText()',
		    					),
		    					array(
		    						'header'=>'&nbsp;',
		    						'type'=>'raw',
		    						'htmlOptions'=>array('class'=>'actions-column'),
		    						'value'=>'$data->getRemoveChildLink()',
		    					),
							)
						)); ?>
					</div>
				</div>
			</div>
			<div class="addChild">
				<div class="panel panel-primary">
					<div class="panel-heading">
			    		<span><?php echo Rights::t('core', 'Add Child'); ?></span>
			    	</div>
			    	<div class="panel-body form" >
			    	<?php if( $childFormModel!==null ): ?>

						<?php $this->renderPartial('_childForm', array(
							'model'=>$childFormModel,
							'itemnameSelectOptions'=>$childSelectOptions,
						)); ?>
	
					<?php else: ?>
	
						<p class="info"><?php echo Rights::t('core', 'No children available to be added to this item.'); ?>
	
					<?php endif; ?>
			    	</div>
			    </div>
			</div>
		<?php else: ?>

			<p class="info">
				<?php echo Rights::t('core', 'No relations need to be set for the superuser role.'); ?><br />
				<?php echo Rights::t('core', 'Super users are always granted access implicitly.'); ?>
			</p>

		<?php endif; ?>

	</div>

</div>