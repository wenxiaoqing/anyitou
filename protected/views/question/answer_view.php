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
    '用户调查问卷信息',
);

$this->menu=array(
    array('label'=>'统计信息', 'url'=>array('Tongji')),
    array('label'=>'调查用户列表', 'url'=>array('UserList')),
);
?>
    <div class="tabbable tabbable-custom tabbable-full-width" >
        <ul class="nav nav-tabs">
            <li class="<?php if(Yii::app()->request->getParam('type') == 'stat' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="#stat" data-toggle="tab" >答题数：<?php echo count($result); ?></a></li>
        </ul>
        <div class="tab-content" >
            <div class="fade in <?php if(Yii::app()->request->getParam('type') == 'stat'){ echo ' active'; } ?>" id="stat">
                <?php
                foreach($result as $key=>$val) {
                    ?>
                    <table class="table table-bordered table-striped detail-view">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-7">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="odd">ID：</th>
                            <td><span class="unit"><?php echo $val['id'] ?></span></td>
                        </tr>
                        <tr>
                            <th class="odd">题目ID：</th>
                            <td><span class="unit"><?php echo $val['q_id'] ?></span></td>
                        </tr>
                        <tr>
                            <th class="odd">题目：</th>
                            <td><span class="unit"><?php echo CHtml::link($val['q_title'],array('question/TongjiView','q_id'=>$val['q_id'],'q_type'=>$val['q_type'])); ?></span></td>
                        </tr>
                        <tr>
                            <th class="odd">题目类型：</th>
                            <td><span class="unit"><?php echo $model->question_type[$val['q_type']] ?></span></td>
                        </tr>
                        <tr>
                            <th class="odd">选项：</th>
                            <td><span class="unit"><?php echo $val['q_answer'] ?></span></td>
                        </tr>
                        <tr>
                            <th class="odd">用户答案：</th>
                            <td><span class="unit" style="color:#ff4f10"><?php echo $val['answer'] ?></span></td>
                        </tr>
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
                }
                ?>
            </div>
        </div>
    </div>