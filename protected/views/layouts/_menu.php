<?php

$currentdRoute = Yii::app()->controller->getRoute(); // 当前路由
$currentOperation = str_replace('/', '.', $currentdRoute); // 当前操作

$menuArrs = array(
    array('label' => '<div class="sidebar-toggler hidden-phone"></div>', 'level' => 1, 'visible' => true),
	'site.index' => array('label' => '首页', 'url' => array('/site/index'), 'level' => 1, 'visible' => true, 'favicon' => 'fa-home', 'linkOptions' => array()),//site/index
	array('label' => '用户管理', //user/admin
		'items' => array(
			'user.admin' => array('label' =>'用户列表', 'url' => array('/user/admin'),),
			'user.create' => array('label' =>'添加用户', 'url' => array('/user/create'),),
			array('label' =>'外呼列表', 'url' => array('/callRecord/admin'),),
			array('label' =>'短信日志', 'url' => array('/user/SmsLog'),),
			array('label' =>'邀请记录', 'url' => array('/user/InviteAdmin'),),
            array('label' => '信息审核', 'url'=> array('/UserVerifyLog/Admin'),),
			//array('label' =>'渠道管理', 'url' => array('/userChannel/admin'),  
				//'active' => preg_match('/^userChannel\/.*/', Yii::app()->controller->getRoute())
			//),
	        array('label' =>'银行卡管理', 'url' => array('/user/userbankfunds')),
			//array('label' =>'邮件日志', 'url' => array('/user/EmailLog')),   
		),
		'level' => 1, 'favicon' => 'fa-user'
	),
	array('label' => '项目管理', 'value' => '/project',
		'items' => array(
			array('label' =>'创建项目', 'url' => array('/project/create') ),
			array('label' =>'项目列表', 'url' => array('/project/admin') ),
			array('label' =>'项目预告', 'url' => array('/project/noticelist')),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '投资管理', 'value' => '/project',
		'items' => array(
			array('label' =>'投资记录', 'url' => array('/invest/records') ),
			array('label' =>'放款记录', 'url' => array('/invest/loans') ),
			array('label' =>'付息还本记录', 'url' => array('/invest/repayment') ),
			array('label' =>'投资券管理', 'url' => array('/invest/InvestmentCoupon') ),
			array('label'=>'债券发起记录','url'=>array('/debtSell/admin')),
			array('label'=>'债券认购记录','url'=>array('/debtInvestLog/admin')),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '质押融资', 'value' => '/pledge',
		'items' => array(
	        array('label' =>'项目管理', 'url' => array('/pledge/project/admin') ),
			array('label' =>'投资记录', 'url' => array('/pledge/buy/admin') ),
			array('label' =>'放款记录', 'url' => array('/pledge/loans/admin') ),
			array('label' =>'付息还本记录', 'url' => array('/pledge/repayment/admin') ),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '企业管理', 'value' => '/company/index',
		'items' => array(
			array('label' =>'添加企业', 'url' => array('/company/create')),
			array('label' =>'企业列表', 'url' => array('/company/admin')),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '担保机构管理', 'value' => '/guarantee/index',
		'items' => array(
			array('label' =>'添加担保机构', 'url' => array('/guarantee/create')),
			array('label' =>'担保机构列表', 'url' => array('/guarantee/admin')),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '资金管理', 'value' => '/account',
		'items' => array(
			array('label' =>'账户管理', 'url' => array('/account/funds/admin'), 
			      'active' => preg_match('/^account\/funds.*/', Yii::app()->controller->getRoute())
		    ),
			array('label' =>'交易记录', 'url' => array('/account/trade/admin'), 
			      'active' => preg_match('/^account\/trade.*/', Yii::app()->controller->getRoute())
		    ),
			array('label' =>'提现记录', 'url' => array('/account/withdraw/admin'), 
			      'active' => preg_match('/^account\/withdraw.*/', Yii::app()->controller->getRoute())
		    ),
			array('label' =>'充值记录', 'url' => array('/account/recharge/admin'), 
			      'active' => preg_match('/^account\/recharge.*/', Yii::app()->controller->getRoute())
		    ),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '内容管理',
		'items' => array(
			array('label' =>'频道管理', 'url' => array('/cms/channel/admin'),
				'active' => preg_match('/^cms\/channel.*/', Yii::app()->controller->getRoute()),
			),
			array('label' =>'类别管理', 'url' => array('/cms/class/admin'),
				'active' => preg_match('/^cms\/class.*/', Yii::app()->controller->getRoute()),
			),
			array('label' =>'文章管理', 'url' => array('/cms/article/admin'),
				'active' => preg_match('/^cms\/article.*/', Yii::app()->controller->getRoute()),
			),
			array('label' =>'公告管理', 'url' => array('/notice/list') ),
			array('label' =>'投资技巧', 'url' => array('/invest/skilllist') ),
			array('label' =>'投资故事', 'url' => array('/invest/storieslist') ),
			array('label' =>'融资案例', 'url' => array('/finance/caselist') ),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
    array('label' => '车贷申请信息管理', 'url' => array('/ChedaiApply/admin'),
        'level' => 1, 'favicon' => 'fa-th',
        'active' => preg_match('/^carloan.*/i', Yii::app()->controller->getRoute()),
    ),
	array('label' => '审核管理',
		'items' => array(
			array('label' =>'评论管理', 'url' => array('/comment/list'),),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '系统用户管理', 
		'items' => array(
			array('label' =>'用户列表', 'url' => array('/managerUser/admin'),),
			array('label' =>'权限管理', 'url' => array('/rights'),
				'active' => (isset(Yii::app()->controller->module->id) ? Yii::app()->controller->module->id=='rights' : false)
			),
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '抽奖管理', 
		'items' => array(
			array('label' =>'活动管理', 'url' => array('/lotterydraw/event/admin'),),
			array('label' =>'奖品管理', 'url' => array('/lotterydraw/prizes/admin'),),
			array('label' =>'用户抽奖管理', 'url' => array('/lotterydraw/User/admin'),),
			array('label' =>'抽奖记录', 'url' => array('/lotterydraw/trylog/admin'),),
			array('label' =>'抽奖机会发放记录', 'url' => array('/lotterydraw/chancelog/admin'),),
			
		),
		'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '渠道管理',
			'items' => array(
					array('label'=>'渠道管理','url'=>array('/UserChannelType/admin'),),
					array('label' =>'关键词管理', 'url' => array('/userChannel/admin'),  
						'active' => preg_match('/^userChannel\/.*/', Yii::app()->controller->getRoute())
					),
			),
			
			'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '财务管理',
			'items' => array(
					array('label'=>'收支明细','url'=>array('/Financial/admin'),),
			),
				
			'level' => 1, 'favicon' => 'fa-th',
	),
	array('label' => '统计管理',
			'items' => array(
					array('label'=>'注册统计管理','url'=>array('/UserChannelReg/admin'),),
					array('label'=>'渠道投资管理','url'=>array('/UserChannelInvest/admin'),),
					
			),
			'level' => 1, 'favicon' => 'fa-th',
	),
	
    array('label' => '问卷调查管理',
        'items' => array(
            array('label' =>'题库管理', 'url' => array('/question/admin'),),
            array('label' =>'统计信息', 'url' => array('/question/tongji'),),
        ),
        'level' => 1, 'favicon' => 'fa-th',
    ),
	array('label'=>'优惠券管理',
		'items'=>array(
			array('label'=>'优惠券列表','url'=>array('/CouponClass/admin'),),
			array('label'=>'发放记录','url'=>array('/UserCoupon/admin')),
	),
	'level' => 1, 'favicon' => 'fa-th',
	),
    array('label' => '希财网统计信息', 'url' => array('/ApiCsai/UserList'),
        'level' => 1, 'favicon' => 'fa-th',
        'active' => preg_match('/^apicsai.*/i', Yii::app()->controller->getRoute()),
    ),
    array('label' => '系统管理',
    		'items' => array(
    				array('label'=>'系统变量','url'=>array('/SystemConfig/admin'),),
    		),
    		'level' => 1, 'favicon' => 'fa-th',
    ),
	
);

/*
 * 未设置operation属性时，默认使用url的第一部分判断操作权限
 * 未设置visible 属性时，需要判断操作权限是否显示按钮
 */
$visibleMenuArrs = $menuArrs; // 可显示的按钮数组
foreach($visibleMenuArrs as $key => $item) {
    if(!isset($item['items']) && $item['visible'] != true) {
		$operation = implode('.', CArray::removeByVal(explode('/', $item['url'][0]), ''));
    	// 判断是否有操作权限
        $visible = Yii::app()->user->checkAccess($operation);
        if($visible != true) {
            unset($visibleMenuArrs[$key]);
        } else {
            $visibleMenuArrs[$key]['visible'] = $visible;
        }
        continue;
    }
    foreach($item['items'] as $subKey => $subItem) {
        // 得到操作权限名称
        if(isset($subItem['operation'])) {
            $operation = $subItem['operation'];
        } else {
            $route = $subItem['url'][0];
            $tmpArr = CArray::removeByVal(explode('/', $route), '');
            $operation = implode('.', $tmpArr);
        }
         if($subItem['visible']) {
             continue;
         }
        // 判断是否有操作权限
        $visible = Yii::app()->user->checkAccess($operation);
        if($visible != true) {
            unset($visibleMenuArrs[$key]['items'][$subKey]);
        } else {
            $visibleMenuArrs[$key]['items'][$subKey]['visible'] = $visible;
        }
    }
}

foreach($visibleMenuArrs as $key => $item) {
    //$visibleMenuArrs[$key]['label'] = '<i class="fa"></i><span class="title">'.$item['label'].'</span>';
	if(isset($item['items'])) {
	    if(!empty($item['items'])) {
	        $visibleMenuArrs[$key]['url'] = 'javascript:;';
	    } else {
	        if(!isset($item['url']) || empty($item['url'])) {
	            unset($visibleMenuArrs[$key]);
	            continue;
	        }
	    }
	}
	$visibleMenuArrs[$key]['itemOptions'] = array('class' => '');
}
//zii.widgets.CMenu
$this->widget('application.extensions.widgets.CCMenu',array(
	'id' => 'sliderMenu',
	'items' => $visibleMenuArrs,
	'encodeLabel' => false,
	'activateParents' => true,
	'htmlOptions' => array(
		'class' => 'page-sidebar-menu',
	),
	'submenuHtmlOptions' => array(
		'class' => 'sub-menu',
		'style' => 'overflow: hidden;',
	),
	'activeCssClass' => 'active open'
));
