<div class="view">
<table class="table table-bordered table-striped detail-view">
	<colgroup>
		<col class="col-xs-1">
		<col class="col-xs-7">
	</colgroup>
	<tbody>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</th>
			<td><?php echo $model->id; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('pid')); ?>:</th>
			<td><?php echo CHtml::link(CHtml::encode($model->pid), array('view', 'id'=>$model->pid)); ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('serial_number')); ?>:</th>
			<td><?php echo $model->serial_number; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('valuation_date')); ?>:</th>
			<td><?php echo $model->valuation_date; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('owner')); ?>:</th>
			<td><?php echo $model->owner; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('sizes')); ?>:</th>
			<td><?php echo $model->sizes; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('floor')); ?>:</th>
			<td><?php echo $model->floor; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('location')); ?>:</th>
			<td><?php echo $model->location; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('type')); ?>:</th>
			<td><?php echo $model->type; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('buy_date')); ?>:</th>
			<td><?php echo $model->buy_date; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('buy_price')); ?>:</th>
			<td><?php echo $model->buy_price; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('orientation')); ?>:</th>
			<td><?php echo $model->orientation; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('mortgage_info')); ?>:</th>
			<td><?php echo $model->mortgage_info; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('valuation')); ?>:</th>
			<td><?php echo $model->valuation; ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('update_time')); ?>:</th>
			<td><?php echo $model->update_time; ?></td>
		</tr>
	</tbody>
</table>
</div>
