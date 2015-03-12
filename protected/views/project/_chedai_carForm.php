<?php
/* @var $this ItemChedaiCarController */
/* @var $model ItemChedaiCar */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-chedai-car-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
		带<span class="required">*</span>号的为必填项
	</p>
	<!--
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('owner'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'owner', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('owner')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('used_time'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'used_time', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('used_time')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    -->
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('brand_model'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'brand_model', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('brand_model')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('vehicle_type'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
			<?php echo $form->dropDownList($model, 'vehicle_type', $model->vehicle_type_attrs, array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('vehicle_type'))); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('valuation'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'valuation', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $model->getAttributeLabel('valuation')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('use_type'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'use_type', array('class' => 'form-control col-sm-4', 'placeholder' => $model->getAttributeLabel('use_type')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('violation'); ?>：</label>
		<div class="col-sm-5">
            <?php echo $form->dropDownList($model, 'violation', $model->violationAttrs, array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('violation'))); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('buy_time'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'buy_time', array('class' => 'form-control col-sm-4 _datePicker', 'placeholder' => $model->getAttributeLabel('buy_time')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('buy_price'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'buy_price', array('class' => 'form-control col-sm-4', 'placeholder' => $model->getAttributeLabel('buy_price')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('color'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'color', array('class' => 'form-control col-sm-4', 'placeholder' => $model->getAttributeLabel('color')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('annual_inspection_due_date'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'annual_inspection_due_date', array('class' => 'form-control col-sm-4 _datePicker', 'placeholder' => $model->getAttributeLabel('annual_inspection_due_date')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('insurance_due_date'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'insurance_due_date', array('class' => 'form-control col-sm-4 _datePicker', 'placeholder' => $model->getAttributeLabel('insurance_due_date')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('emissions'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'emissions', array('class' => 'form-control col-sm-4', 'placeholder' => $model->getAttributeLabel('emissions')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('kilometre'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'kilometre', array('class' => 'form-control col-sm-4', 'placeholder' => $model->getAttributeLabel('kilometre')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $model->getAttributeLabel('license_plate'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($model, 'license_plate', array('class' => 'form-control col-sm-4', 'placeholder' => $model->getAttributeLabel('license_plate')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"></label>
		<div class="col-sm-5">
            <input type="hidden" name="ItemChedaiCar[item_id]" value="<?php echo $_GET['id']; ?>" />
            <input type="hidden" name="submit" value="true" />
            <button type="button" class="btn btn-large btn-primary" id="submitBtn">保存</button>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
<?php 

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);

$_script = <<<EOF
    $('._datePicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$('#submitBtn').click(function(){
		var BF = $('#item-chedai-car-form');
		if(checkFrom()) {
			$(this).attr('disabled', true);
			$.ajax({
			  type: 'POST',
			  url: BF.attr('action'),
			  data: BF.serialize(),
			  success: function(data){
				  BootstrapDialog.alert({title: '提示信息', message: data.message, buttonLabel:'确定'});
				  if(data.status == true) {
					  setTimeout(function(){
						  window.location.href = data.url;
						}, 3000);
				  } else {
					  $('#submitBtn').attr('disabled', false );
				  }
				},
			  dataType: 'json'
			});
		}
	});
    function checkFrom() {
    	var _tips = new Array;
    	var _focus = false;
    	var _hastips = false;
    	var tipStr = '';
    	$('#item-chedai-car-form .isrequired').each(function(){
    		if($(this).val() == undefined || $(this).val() === '') {
    			if(!_focus) {
    			 $(this).focus();
    				_focus = true;
    			}
    			$(this).parent().parent().addClass('error');
    			_hastips = true;
    			tipStr += '<p>' + $(this).attr('placeholder') + '是必填项，不能为空</p>';
    		}
    	});
    	if(tipStr != '') { toastr.warning( tipStr ); }
    	if(_hastips) return false;
    	return true;
    }
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
?>