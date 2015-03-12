<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */

	public $breadcrumbs=array();

	/**
	 * Html model
	 *
	 */
	public $pageTitle='';
	public $description='';
	public $keywords='';
	public $css=array();
	public $js=array();
	public $about = '';
	public $title = '';
	public $themes = 'default';

	public $info_protect_switch = false; // 信息保护开关
	
	public function init()
	{
		$this->defaultAction = 'admin';
		if(isset($_COOKIE['style_color'])) {
		    $this->themes = $_COOKIE['style_color'];
		}

		if(Yii::app()->authManager->isAssigned('info_protect_switch', Yii::app()->user->id)){
			 $this->info_protect_switch = true;
	   	}else{
		 	 $this->info_protect_switch = false;
		}
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$route = Yii::app()->controller->getRoute();
		$operation = str_replace('/', '.', $route);
		
		$rulesArr = array();
		$rulesArr[] = array('allow',
				'actions'=>array($this->getAction()->id),
				'roles'=>array($operation), 
			);
		$rulesArr[] = array('deny',  // deny all users
				'users'=>array('*'),
			);
		
		return $rulesArr;
	}
	
	/*
     * 提示信息
	 * @param $message
	 * @param $status
	 * @param $time
	 * @param $url
     */
    public function redirectMessage($message='成功', $status='info', $time=3, $url='' )
    {
        if($status =='success') {
			$backColorClass = 'alert-success';
        } elseif($status =='warming') {
			$backColorClass = 'alert-warning';
        } elseif($status =='error') {
			$backColorClass = 'alert-danger';
        } elseif($status =='info') {
			$backColorClass = 'alert-info';
        }

		if($time) {
			$timeTips = '页面正在跳转请等待<span id="sec" style="font-weight:bold; font-size:16px;">'.$time.'</span>秒';
		} else {
			$timeTips = '';
		}
          
        if(is_array($url)) {
            $route=isset($url[0]) ? $url[0] : '';
            $url=$this->createUrl($route,array_splice($url,1));
        }
        if ($url) {
            $url = "window.location.href='{$url}'"; 
        } else {
            $url = "history.back();"; 
        }
		
		$baseUrl = Yii::app()->baseUrl;
		
        header("Content-Type:text/html;charset=utf-8"); 
        echo <<<EOF
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="{$baseUrl}/plugins/bootstrap/css/bootstrap.css" />
		<title>提示信息 - dashboard</title>
		</head>
		<body>
			<div class="alert {$backColorClass}" style=" margin: 80px auto; width: 600px;" >
				<h4 class="alert-heading">提示信息</h4>
				<div style="padding: 20px; " >
					{$message}
				</div>
				<div style="padding: 10px 20px;" >{$timeTips}</div>
			</div>
		</body>
		</head>
		<script type="text/javascript">
		function run(){
			var s = document.getElementById("sec");
			if(s.innerHTML == 0){
				{$url}
				return false;
			}
			s.innerHTML = s.innerHTML * 1 - 1;
		}
		//window.setInterval("run();", 1000);
		</script>
EOF;
		exit();
    }
	
	/**
     * echoJson / Jsonp 
     * 输出json
     * 
     * @param mixed $data
     * @param int $code 0:success 
     * @access protected
     * @return void
     */
    public function echoJson($data=array()) {
	
		$func = "jsoncallback";
        if(isset($_REQUEST['jsoncallback'])){
            $func = $_REQUEST['jsoncallback'];
			echo $func."(".json_encode ( $data ).")";
			
        } else {
			echo json_encode( $data );
		}
		exit();
    }

}