<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php if(!empty($this->pageTitle)) {echo CHtml::encode($this->pageTitle).' - ';} ?>安宜投管理平台</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<link href="/css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>
	<link href="/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
	<link href="/css/themes/<?php echo $this->themes; ?>.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/plugins/bootstrap-dialog/css/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
	<link href="/css/custom.css" rel="stylesheet" type="text/css"/>
	

	<?php
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
	?>
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->  
			<a class="navbar-brand" href="/">
			<img src="/images/logo_sm.png" alt="logo" class="img-responsive" />
			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER --> 
			<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="/images/menu-toggler.png" alt="" />
			</a> 
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown">
					<a href="http://www.anyitou.com" class="" target="_blank" ><i class="fa fa-home"></i><span>网站首页</span></a>
				</li>
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" src="/images/avatar1_small.jpg"/ style="display:none;" >
					<span class="username"><?php echo Yii::app()->user->getState("username"); ?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/site/updatepwd"><i class="fa fa-key"></i>修改密码</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-sign-out"></i>退出</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<?php include_once('_menu.php'); ?>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
		  <div class="page-content-body" >
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<!--<h3 class="page-title">
						Dashboard <small>statistics and more</small>
					</h3>-->
					<ul class="page-breadcrumb breadcrumb">
						<?php if(!empty($this->menu)): ?>
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>更多操作</span> <i class="fa fa-angle-down"></i>
							</button>
							<?php
								$this->widget('zii.widgets.CMenu', array(
									'items'=>$this->menu,
									'htmlOptions'=>array('class'=>'dropdown-menu pull-right', 'role' => 'menu'),
								));
							?>
						</li>
						<?php endif; ?>
						<li>
							<i class="fa fa-home"></i> <a href="/">首页</a><i class="fa fa-angle-right"></i>
						</li>
						<?php 
						if(isset($this->breadcrumbs)) {
							$_breadcrumbsNum = count($this->breadcrumbs);
							$_bci = 0;
							foreach($this->breadcrumbs as $label=>$url) {
								echo '<li>';
								if (is_string($label) || is_array($url))
								{
									echo CHtml::link(CHtml::encode($label), $url);
								} else
									echo CHtml::encode($url);
								$_bci++;
								if($_bci != $_breadcrumbsNum) echo '<i class="fa fa-angle-right"></i>';
								echo '</li>';
							}
						}
						?>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-md-12" id="content" >
				<?php echo $content; ?>
				</div>
			</div>
		  </div>
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			<div class="copyright">
				Copyright &copy; <?php echo date('Y'); ?>  安宜投（www.anyitou.com）　版权所有；普惠安宜科技（北京）有限公司<br />京ICP证 100953号
			</div>
		</div>
		<div class="footer-right" >
			<div class="footer-tools">
    			<span class="go-top">
    			<i class="fa fa-angle-up"></i>
    			</span>
    		</div>
			<div class="theme-panel hidden-xs hidden-sm clearfix">
    			<div class="toggler"></div>
    			<div class="toggler-close"></div>
    			<div class="theme-options">
    				<div class="theme-option theme-colors clearfix">
    					<span>主题颜色</span>
    					<ul>
    							<li class="color-black current color-default" data-style="default"></li>
    							<li class="color-blue" data-style="blue"></li>
    							<li class="color-brown" data-style="brown"></li>
    							<li class="color-purple" data-style="purple"></li>
    							<li class="color-grey" data-style="grey"></li>
    							<li class="color-white color-light" data-style="light"></li>
    					</ul>
    				</div>
    				<div class="theme-option">
    					<span>布局</span>
    					<select class="layout-option form-control input-small">
    						<option value="fluid" selected="selected">不固定</option>
    						<option value="boxed">盒状</option>
    					</select>
    				</div>
    				<div class="theme-option">
    					<span>头部</span>
    					<select class="header-option form-control input-small">
    						<option value="fixed" selected="selected">固定</option>
    						<option value="default">默认</option>
    					</select>
    				</div>
    				<div class="theme-option">
    					<span>边栏</span>
    					<select class="sidebar-option form-control input-small">
    						<option value="fixed">固定</option>
    						<option value="default" selected="selected">默认</option>
    					</select>
    				</div>
    				<div class="theme-option">
    					<span>底部</span>
    					<select class="footer-option form-control input-small">
    						<option value="fixed" >固定</option>
    						<option value="default" selected="selected" >默认</option>
    					</select>
    				</div>
    			</div>
    		</div>
		</div>
	</div>
	<!-- END FOOTER -->
	<!--<script src="/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>  -->
	<script src="/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>   
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<!--<script src="/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>-->
	<script src="/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<script src="/plugins/bootstrap-dialog/js/bootstrap-dialog.js" type="text/javascript"></script>
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="/plugins/respond.min.js"></script>
	<script src="/plugins/excanvas.min.js"></script> 
	<![endif]-->   
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/js/app.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>