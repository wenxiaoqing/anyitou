<?php
/**
 * Created by PhpStorm.
 * User: AKY
 * Date: 2014/11/12
 * Time: 15:00
 */

$this->breadcrumbs=array(
    '投资用户'=>array('UserList'),
    '已投资项目',
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-timepicker_zh_cn.js", CClientScript::POS_END);
$_script = <<<EOF
    $(document).ready(function() {
        $('#time').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    })
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
?>

<div class="tabbable tabbable-custom tabbable-full-width" >
<div class="form-group">
    <form name="search_user_invest" action="/ApiCsai/UserInvest?user_id=<?php echo $user_id ?>" method="get">
        <label for="raise_begin_time" class="col-sm-2 control-label">选择日期：</label>
        <div class="col-sm-5">
            <input class="form-control col-sm-4" name="time" id="time" type="text" value="<?php echo $date; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
        </div>
        <div class="col-sm-5 control-info"><input class="btn btn-large btn-primary" id="submitBtn" type="submit" name="submit" value="search"><label>（选取日期，即可查看当月统计）</label></div>
    </form>
</div>
<ul class="nav nav-tabs">
    <li class="<?php if(Yii::app()->request->getParam('type') == 'stat' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="#stat" data-toggle="tab" >统计信息</a></li>
</ul>
<div class="tab-content" >
<div class="fade in <?php if(Yii::app()->request->getParam('type') == 'stat'){ echo ' active'; } ?>" id="stat">
    <table class="table table-bordered table-striped detail-view">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-3">
            <col class="col-xs-2">
            <col class="col-xs-3">
            <col class="col-xs-2">
            <col class="col-xs-2">
        </colgroup>
        <tbody>
        <tr>
            <th class="odd" style="text-align:center;font-weight:bold;">ID：</th>
            <th class="odd" style="text-align:center">项目名称：</th>
            <th class="odd" style="text-align:center">投资时间：</th>
            <th class="odd" style="text-align:center">项目结束时间：</th>
            <th class="odd" style="text-align:center">投资金额：(元)</th>
            <th class="odd" style="text-align:center">佣金：(元)</th>
        </tr>
            <?php
            foreach($list as $k=>$v) {
            ?>
            <tr>
                <td style="text-align:center;line-height: 1"><?php echo $v['id'] ?></td>
                <td style="text-align:center;line-height: 1"><?php echo $v["item_title"] ?></td>
                <td style="text-align:center;line-height: 1"><?php echo $v['success_time'] ?></td>
                <td style="text-align:center;line-height: 1"><?php echo $v['repayment_time'] ?></td>
                <td style="text-align:center;line-height: 1"><span class="unit" style="color:#ff4f10"><?php echo UtilClass::floatValue($v["item_amount"], 2); ?></span></td>
                <td style="text-align:center;line-height: 1"><span class="unit" style="color:#ff4f10"><?php echo $v['commission'] ?></span>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
<div class="pager">
<?php
$this->widget('application.extensions.widgets.CCLinkPager',
    array(
        'pages'=>$pages,
        'header' => '',
        'maxButtonCount' => '10',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'firstPageLabel' => '首页',
        'lastPageLabel' => '尾页',
        'htmlOptions' => array('class' => 'pagination')
    )
);
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-1.10.2.min.js", CClientScript::POS_END);
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-1.10.3.custom.js", CClientScript::POS_END);

?>
</div>

