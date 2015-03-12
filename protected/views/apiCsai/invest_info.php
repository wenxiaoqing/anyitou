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
    '投资记录',
);
?>
<div class="tabbable tabbable-custom tabbable-full-width" >
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
                    <th class="odd" style="text-align:center;font-weight:bold;">项目名称：</th>
                    <th class="odd" style="text-align:center">投资金额：</th>
                    <th class="odd" style="text-align:center">投资时间</th>
                </tr>
                <?php
                foreach($list as $k=>$v) {
                    ?>
                    <tr>
                        <td style="text-align:center;line-height: 1"><?php echo $v['id'] ?></td>
                        <td style="text-align:center;line-height: 1"><?php echo $v['item_title'] ?></td>
                        <td style="text-align:center;line-height: 1"><span class="unit" style="color:#ff4f10"><?php echo UtilClass::floatValue($v["item_amount"], 2); ?></span></td>
                        <td style="text-align:center;line-height: 1"><span class="unit" style="color:#ff4f10"><?php echo $v['success_time'] ?></span>
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
    ?>
</div>