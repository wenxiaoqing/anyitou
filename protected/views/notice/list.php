<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看公告';

$this->breadcrumbs=array(
	'公告管理' => array('list'),
	'查看项目公告',
);

$this->menu=array(
	array('label'=>'公告列表', 'url'=>array('list')),
	array('label'=>'创建公告', 'url'=>array('create')),
);


?>

<div class="">
	<table class="table  table-striped table-hover table-bordered dataTable table-condensed" id="sample_editable_1" aria-describedby="sample_editable_1_info">
	<ul class="nav nav-tabs">
		<li class="<?php if($type==1){?>active<?php }?>"><a href="<?php echo $this->createUrl('list', array('type' =>1)); ?>" >到期公告</a></li>
		<li class="<?php if($type==2){?>active<?php }?>"><a href="<?php echo $this->createUrl('list', array('type' =>2)); ?>" >网站公告</a></li>
		<li class="<?php if($type==3){?>active<?php }?>"><a href="<?php echo $this->createUrl('list', array('type' =>3)); ?>" >支付公告</a></li>
	</ul>
	<thead>
		<tr role="row">
			<th>id</th>
			<th><?php echo $model->getAttributeLabel('title'); ?></th>
			<th><?php echo $model->getAttributeLabel('class_id'); ?></th>
			<th><?php echo $model->getAttributeLabel('hits'); ?></th>
			<th><?php echo $model->getAttributeLabel('update_date'); ?></th>
			<th><?php echo $model->getAttributeLabel('is_recommend'); ?></th>
			<th><?php echo $model->getAttributeLabel('status'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php 
		foreach($projectArrs as $row) {
			echo '<tr class="odd">'
					.'<td class="">'.$row['notice_id'].'</td>'
					.'<td style="width:220px;">'.$row['title'].'</td>'
					.'<td style="">'.$model->getClassType($row['class_id']).'</td>'
					.'<td class="">'.$row['hits'].'</td>'
					.'<td class="">'.$row['update_date'].'</td>'
					.'<td class="">'.$model->getRecommendType($row['is_recommend']).'</td>'
					.'<td class="">'.$model->getStatus($row['status']).'</td>'
					.'<td class=""><ul class="list-unstyled" >'
					.'<li><a class="btn btn-primary btn-xs" target="_blank" href="'.$this->createUrl('update', array('id' => $row['notice_id'])).'">编辑</a></li>'
					.'<li><a class="btn btn-primary btn-xs" target="_blank" href="'.$this->createUrl('view', array('id' => $row['notice_id'])).'">查看</a></li>'
					.'</ul></td></tr>';
		} ?>
	</tbody>
	</table>
</div>
<div class="text-center" >
<?php 
	//application.extensions.widgets.CCLinkPager
	$this->widget('application.extensions.widgets.CCLinkPager',array('pages'=>$pages, 'header' => '', 'maxButtonCount' => '15', 
						'prevPageLabel' => '上一页', 'nextPageLabel' => '下一页', 'firstPageLabel' => '首页', 
						'lastPageLabel' => '尾页', 'htmlOptions' => array('class' => 'pagination')));
?>
</div>
<script type="text/javascript" src="/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
