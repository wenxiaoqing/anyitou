<?php
/**
 * 车贷申请审核，项目审核配置文件
 * User: AkyLau
 * Date: 2015/1/16
 * Time: 14:54
 */
return array(
    /**
     * 用户资料信息类型
     */
    'user_verify_type'  =>  array(
        '1' =>  '身份证',
        '2' =>  '个人信用报告',
        '3' =>  '收入证明',
        '4' =>  '涉诉查询',
        '5' =>  '车产证件',
    ),

    /**
     * 项目信息审核类型
     */
    'item_category_verify_type'  =>  array(
        'invest'    =>  array(

        ),
        'reward'    =>  array(

        ),
        'chedai'    =>  array(
            'chedai_1'  =>  '借款合同',
            'chedai_2'  =>  '机动车抵押合同',
            'chedai_3'  =>  '抵押登记手续',
            'chedai_4'  =>  '车辆权利证明原件',
            'chedai_5'  =>  '机动车买卖合同',
            'chedai_6'  =>  '机动车过户委托书',
            'chedai_7'  =>  '机动车接管文件',
            'chedai_8'  =>  '评估报告',
            'chedai_9'  =>  '债权回购承诺书',
            'chedai_10'  =>  '抵押物',
        ),
        'fangdai'    =>  array(
            'fangdai_1'  =>  '房产证件',
            'fangdai_2'  =>  '抵押合同',
            'fangdai_3'  =>  '办理抵押登记',
            'fangdai_4'  =>  '房屋买卖合同',
            'fangdai_5'  =>  '委托过户公证',
            'fangdai_6'  =>  '评估报告',
            'fangdai_7'  =>  '债权回购承诺书',
        ),
    ),
);