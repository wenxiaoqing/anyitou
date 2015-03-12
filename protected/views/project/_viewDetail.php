<div class="form-horizontal" >
<?php if($model): ?>
	
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('idea_home'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->idea_home; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('idea_risk'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->idea_risk; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('idea_credit'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->idea_credit; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('idea_repay'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->idea_repay; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('idea_market'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->idea_market; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
    		<span><?php echo $model->getAttributeLabel('relation_desc'); ?></span>
    	</div>
    	<div class="panel-body" >
			<div class="col-sm-10 control-info">
				<?php echo $model->relation_desc; ?>
			</div>
			<div class="col-sm-2 control-info"><label>&nbsp; </label></div>
		</div>
	</div>
<?php else: ?>
	<div class="panel panel-primary">
    	<div class="panel-body" >
			项目详情不存在！
		</div>
	</div>
<?php endif; ?>
</div>