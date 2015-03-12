<?php
/* @var $this ItemChedaiCarController */
/* @var $data ItemChedaiCar */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-fangdai-house-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
		带<span class="required">*</span>号的为必填项
	</p>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('serial_number'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'serial_number', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $data->getAttributeLabel('serial_number')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('valuation_date'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'valuation_date', array('class' => 'form-control col-sm-4 isrequired _datePicker', 'placeholder' => $data->getAttributeLabel('valuation_date')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('owner'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'owner', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $data->getAttributeLabel('owner')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('sizes'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
			<?php echo $form->textField($data, 'sizes', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $data->getAttributeLabel('sizes')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('floor'); ?>：<span
			class="required">*</span></label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'floor', array('class' => 'form-control col-sm-4 isrequired', 'placeholder' => $data->getAttributeLabel('floor')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('location'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'location', array('class' => 'form-control col-sm-4', 'placeholder' => $data->getAttributeLabel('location')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('type'); ?>：</label>
		<div class="col-sm-5">
            <?php echo $form->textField($data, 'type', array('class' => 'form-control col-sm-4', 'placeholder' => $data->getAttributeLabel('type')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('buy_date'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'buy_date', array('class' => 'form-control col-sm-4 _datePicker', 'placeholder' => $data->getAttributeLabel('buy_date')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('buy_price'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'buy_price', array('class' => 'form-control col-sm-4', 'placeholder' => $data->getAttributeLabel('buy_price')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('orientation'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'orientation', array('class' => 'form-control col-sm-4', 'placeholder' => $data->getAttributeLabel('orientation')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('mortgage_info'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textArea($data, 'mortgage_info', array('rows'=>3, 'class' => 'form-control col-sm-4', 'placeholder' => $data->getAttributeLabel('mortgage_info')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
    <div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"><?php echo $data->getAttributeLabel('valuation'); ?>：</label>
		<div class="col-sm-5">
				<?php echo $form->textField($data, 'valuation', array('class' => 'form-control col-sm-4', 'placeholder' => $data->getAttributeLabel('valuation')) ); ?>
        </div>
		<div class="col-sm-5 control-info"></div>
	</div>
	<div class="form-group">
		<label for="item_title" class="col-sm-2 control-label"></label>
		<div class="col-sm-5">
            <input type="hidden" name="ItemFangdaiHouse[pid]" value="<?php echo $_GET['id']; ?>" />
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
		var BF = $('#item-fangdai-house-form');
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