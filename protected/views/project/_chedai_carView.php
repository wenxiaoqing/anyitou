<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'item_id',
		'owner',
		'used_time',
		'license_plate',
	    array(
	        'name' => 'vehicle_type',
	        'value' => $model->vehicle_type_attrs[$model->vehicle_type],
	    ),
		'use_type',
	    array(
	        'name' => 'violation',
	        'value' => $model->violationAttrs[$model->violation],
        ),
		'buy_time',
		'buy_price',
		'color',
		'brand_model',
		'emissions',
		'kilometre',
		'annual_inspection_due_date',
		'insurance_due_date',
		'valuation',
	),
)); ?>
