<?php $this->widget('zii.widgets.CMenu', array(
	'firstItemCssClass'=>'first',
	'lastItemCssClass'=>'last',
	'htmlOptions'=>array('class'=>'actions nav nav-tabs'),
	'items'=>array(
		array(
			'label'=>Rights::t('core', 'Assignments'),
			'url'=>array('assignment/view'),
			'itemOptions'=>array('class'=>'item-assignments'.(Yii::app()->controller->id=='assignment' ? ' active' : '')),
		),
		array(
			'label'=>Rights::t('core', 'Permissions'),
			'url'=>array('authItem/permissions'),
			'itemOptions'=>array('class'=>'item-permissions'
				.( in_array(Yii::app()->controller->getAction()->id, array(
					'permissions',)) ? ' active' : '')),
		),
		array(
			'label'=>Rights::t('core', 'Roles'),
			'url'=>array('authItem/roles'),
			'itemOptions'=>array('class'=>'item-roles'.(Yii::app()->controller->getAction()->id=='roles' ? ' active' : '')),
		),
		array(
			'label'=>Rights::t('core', 'Tasks'),
			'url'=>array('authItem/tasks'),
			'itemOptions'=>array('class'=>'item-tasks'.(Yii::app()->controller->getAction()->id=='tasks' ? ' active' : '')),
		),
		array(
			'label'=>Rights::t('core', 'Operations'),
			'url'=>array('authItem/operations'),
			'itemOptions'=>array('class'=>'item-operations'.(Yii::app()->controller->getAction()->id=='operations' ? ' active' : '')),
		),
	)
));	?>