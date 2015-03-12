<?php
return array(
		"category"=>array(
				"cash"=>array( 
					"name"=>"现金券",
                    'rules' => array(
                        'max_use_num' => 2, // 最大使用数量
                        'max_part_use_scale' => 0.5, // 部分使用时，使用的最大比例
                        'max_use_scale' => 0.4, // 使用总和占投资额的最大比例
                    ),
                    'unit' => '元',
                ),
				"interest"=>array( 
					"name"=>"返利券",
                    'rules' => array(
                        'max_use_num' => 1, // 最大使用数量
                    ),
                    'unit' => '%',
                ),
				"draw"=>array(
					"name"=>"提现券",
                    'rules' => array(
                        'max_use_num' => 1, // 最大使用数量
                    ),
                    'unit' => '元',
                ),
		),
		
		"category_index"=>array("cash"=>"现金券","interest"=>"返利券","draw"=>"提现券"),
		
		"nature_key"=>array(
			"nature_item"=>array("keyword"=>"itemuseable"),
			"nature_mininvest"=>array("keyword"=>"mininvestuseable"),
			"nature_mininvestscale"=>array("keyword"=>"investscaleuseable"),
		),
		// 支持的使用规则属性配置
		'usage_rule_attributes' => array(
		    'invest' => array(
		        'min_invest_amount' => array('name' => '最低投资金额', 'operation' => '>=', 'verifyMethod' => 'checkAmountForInvest'),
		    	'max_invest_amount' => array('name' => '最高投资金额', 'operation' => '<=', 'verifyMethod' => 'checkAmountForInvest'),
				'available_item_id' => array('name' => '可用项目编号', 'operation' => 'in', 'verifyMethod' => 'checkItem'),
		    	'unavailable_item_id' => array('name' => '可用项目编号', 'operation' => 'notin', 'verifyMethod' => 'checkItem'),
		    ),
		    'class' => array(
		        'class_cannot_use_together' => array('name' => '不能同时使用的优惠券', 'operation' => false, 'verifyMethod' => 'checkUseTogetherForClass'),
		    ),
		    'category' => array(
		        'category_cannot_use_together' => array('name' => '不能同时使用的类型', 'operation' => false, 'verifyMethod' => 'checkUseTogetherForCategory'),
		    ),
		),
		
		"source_type"=>array(
            "1"=>array("name"=>"注册赠送"),
            "2"=>array("name"=>"邀请赠送"),
            "3"=>array("name"=>"投资赠送"),
            "4"=>array("name"=>"抽奖赠送"),
            "5"=>array("name"=>"充值赠送"),
            "6"=>array("name"=>"活动赠送"),
        ),
        "used_event_param"=>array(
    		"1" => array("name"=>"投资使用"),
    		"2" => array("name"=>"提现使用"),
        ),
		
);