<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>登录 - 安宜投管理平台</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->          
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES --> 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/select2/select2_metro.css" />
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES --> 
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet" type="text/css"/>
	
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" /> 
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form',
			)
		)); ?>
			<h3 class="form-title">安宜投管理平台</h3>
			<div class="alert alert-danger<?php echo $model->getErrors() ? '' : ' display-hide'; ?>">
				<button class="close" data-close="alert"></button>
				<span><?php 
				if($model->getErrors('error')) {
				    echo implode('<br/>', $model->getErrors('error'));
				} elseif($model->getErrors('login') || $model->getErrors('password')) {
				    echo implode('<br/>', array_merge($model->getErrors('login'), $model->getErrors('password')));
				} elseif($model->getErrors('verify_code')) {
				    echo implode('<br/>', $model->getErrors('verify_code'));
				}
				?></span>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">用户名</label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
					<?php echo $form->textField($model, 'login', array(
						'autocomplete'=>"off", "placeholder"=>"用户名", 'class' => 'form-control placeholder-no-fix')
					); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">密码</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<?php echo $form->passwordField($model, 'password', array(
						'autocomplete'=>"off", "placeholder"=>"密码", 'class' => 'form-control placeholder-no-fix')
					); ?>
				</div>
			</div>
			<div class="form-group form-inline">
				<label class="control-label visible-ie8 visible-ie9">验证码</label>
				<div class="">
					<?php echo $form->textField($model, 'verify_code', array(
						'autocomplete'=>"off", "placeholder"=>"验证码", 'class' => 'form-control input-small placeholder-no-fix', 'maxlength' => '5')
					); ?>
					<?php $this->widget ( 'CCaptcha', array ('showRefreshButton' => false, 'clickableImage' => true, 'buttonType' => 'link', 'imageOptions' => array ('id' => 'verify_captcha', 'style' => 'padding: 0 10px 0; cursor: pointer;', 'alt' => '点击换图', 'title' => '点击换图','width'=>100,'height'=>34 ) ) );?>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-lg blue btn-block">
				登录 <i class="m-icon-swapright m-icon-white"></i>
				</button>
			</div>
		<?php $this->endWidget(); ?>
		<!-- END LOGIN FORM -->
	</div>
	<!-- END LOGIN -->
	<div id="footer">
		<div class="copyright">
		Copyright &copy; <?php echo date('Y'); ?>  安宜投（www.anyitou.com）　版权所有；普惠安宜科技（北京）有限公司<br />京ICP证 100953号
		</div>
	</div>
	<!--[if lt IE 9]>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/respond.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/excanvas.min.js"></script> 
	<![endif]-->   
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/select2/select2.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/login.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
			App.init();
			Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
