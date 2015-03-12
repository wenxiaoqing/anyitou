<?php
/**
 * Created by PhpStorm.
 * User: AKY
 * Date: 2014/11/12
 * Time: 15:00
 */

$this->breadcrumbs=array(
    '问卷调查管理',
    '统计信息'=>array('Tongji'),
    '问题统计',
);

$this->menu=array(
    array('label'=>'统计信息', 'url'=>array('Tongji')),
    array('label'=>'调查用户列表', 'url'=>array('UserList')),
);
?>
<div class="tabbable tabbable-custom tabbable-full-width" >
    <ul class="nav nav-tabs">
        <li class="<?php if(Yii::app()->request->getParam('type') == 'stat' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="#stat" data-toggle="tab" >统计信息</a></li>
    </ul>
    <div class="tab-content" >
        <div class="fade in <?php if(Yii::app()->request->getParam('type') == 'stat'){ echo ' active'; } ?>" id="stat">
            <?php
            switch($result['q_type']){
                case 1:
            ?>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-3">
                            <col class="col-xs-4">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="odd">ID：</th>
                            <td><span class="unit"><?php echo $result['q_id'] ?></span></td>
                            <td>共<span class="unit" style="color:#ff4f10"><?php echo $result['user'] ?></span>人参与了此题调查</td>
                        </tr>
                        <tr>
                            <th class="odd">题目：</th>
                            <td><span class="unit"><?php echo $result['q_title'] ?></span></td>
                            <td></td>
                        </tr>
                        <?php
                            if(is_array($result['count'])) {
                                foreach($result['count'] as $k=>$v) {
                        ?>
                                    <tr>
                                        <th class="odd"><?php echo $k ?>：</th>
                                        <td><?php echo $result['q_answer'][$k] ?></td>
                                        <td><span class="unit" style="color:#ff4f10"><?php echo $v ?></span> 人选择了此项</td>
                                    </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-7">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><span class="unit"></span></td>
                        </tr>
                        </tbody>
                    </table>
            <?php
                    break;
                case 2:
            ?>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-3">
                            <col class="col-xs-4">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="odd">ID：</th>
                            <td><span class="unit"><?php echo $result['q_id'] ?></span></td>
                            <td>共<span class="unit" style="color:#ff4f10"><?php echo $result['user']?></span>人参与了此题调查</td>
                        </tr>
                        <tr>
                            <th class="odd">题目：</th>
                            <td><span class="unit"><?php echo $result['q_title'] ?></span></td>
                            <td></td>
                        </tr>
                        <?php
                        if(is_array($result['count'])) {
                            foreach($result['count'] as $k=>$v) {
                                ?>
                                <tr>
                                    <th class="odd"><?php echo $k ?>：</th>
                                    <td><?php echo $result['q_answer'][$k] ?></td>
                                    <td> 被选中 <span class="unit" style="color:#ff4f10"><?php echo $v ?></span>次</td>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-7">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><span class="unit"></span></td>
                        </tr>
                        </tbody>
                    </table>
            <?php
                    break;
                case 3:
            ?>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-7">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td>共<span class="unit" style="color:#ff4f10"><?php echo $result['user']?></span>人参与了此题调查</td>
                        </tr>
                        <tr>
                            <td>ID:<?php echo $result['q_id'] ?> 题目：<span class="unit"><?php echo $result['q_title'] ?></span></td>
                        </tr>
                        <?php
                        if(!empty($result['u_answer'])) {
                            foreach($result['u_answer'] as $k=>$v) {
                                ?>
                                <tr>
                                    <td><span class="unit" style="color:#ff4f10"><?php echo $v['mobile']?>用户回答：</span><?php echo $v['answer'] ?></td>
                                </tr>
                            <?php
                            }
                        }else {
                            echo "还没有用户提交此题调查信息";
                        }
                        ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-7">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><span class="unit"></span></td>
                        </tr>
                        </tbody>
                    </table>
            <?php
                    break;
                case 4:
            ?>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-3">
                            <col class="col-xs-4">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="odd">ID：</th>
                            <td><span class="unit"><?php echo $result['q_id'] ?></span></td>
                            <td>共<span class="unit" style="color:#ff4f10"><?php echo $result['user'] ?></span>人参与了此题调查</td>
                        </tr>
                        <tr>
                            <th class="odd">题目：</th>
                            <td><span class="unit"><?php echo $result['q_title'] ?></span></td>
                            <td></td>
                        </tr>
                        <?php
                        if(is_array($result['count'])) {
                            foreach($result['count'] as $k=>$v) {
                                    ?>
                                    <tr>
                                        <th class="odd"><?php echo $k ?>：</th>
                                        <td><?php echo $result['q_answer'][$k] ?></td>
                                        <td><span class="unit" style="color:#ff4f10"><?php echo $v ?></span> 人选择了此项</td>
                                    </tr>
                            <?php
                            }
                            foreach($result["u_answer"] as $key=>$val) {
                                //如果不是答案key，直接跳过
                                if(!isset($result['count'][$val["answer"]])) {
                                    ?>
                                    <tr>
                                        <td colspan="3"><span class="unit" style="color:#ff4f10"><?php echo $val['mobile'] ?>用户:</span><?php echo $val['answer'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-7">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td><span class="unit"></span></td>
                        </tr>
                        </tbody>
                    </table>
            <?php
                    break;
                default:
            ?>
                <table class="table table-bordered table-striped detail-view">
                    <colgroup>
                        <col class="col-xs-1">
                        <col class="col-xs-7">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td><span class="unit"></span></td>
                    </tr>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>