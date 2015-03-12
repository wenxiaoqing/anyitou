<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看评论';

$this->breadcrumbs=array(
	'评论管理' => array('list'),
	'查看评论',
);

$this->menu=array(
	array('label'=>'评论列表', 'url'=>array('list')),
);


?>

<div class="">
	<table class="table  table-striped table-hover table-bordered dataTable table-condensed" id="sample_editable_1" aria-describedby="sample_editable_1_info">
	<thead>
		<tr role="row">
			<th>id</th>
			<th>项目名称</th>
			<th>项目状态</th>
			<th><?php echo $model->getAttributeLabel('username'); ?></th>
			<th><?php echo $model->getAttributeLabel('message'); ?></th>
			<th><?php echo $model->getAttributeLabel('repay'); ?></th>
			<th><?php echo $model->getAttributeLabel('type'); ?></th>
			<th><?php echo $model->getAttributeLabel('status'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php 
		foreach($projectArrs as $row) {
			echo '<tr class="odd">'
					.'<td style="">'.$row['id'].'</td>'
					.'<td style="width:130px;"><a href="/project/view?id='.$row['item_id'].'">'.$row['item_title'].'</a></td>'
					.'<td style="width:60px;">'.$model->GetItemStatus($row['invest_status']).'</td>'
					.'<td style="width:30px;">'.$row['username'].'</td>'
					.'<td style="width:180px;" title="'.$row['message'].'">'.mb_substr($row['message'],0,20,'utf-8').'...</td>'
					.'<td style="width:180px;" title="'.$row['repay'].'">'.mb_substr($row['repay'],0,20,'utf-8').'</td>'
					.'<td style="width:60px;">'.$model->getClassType($row['type']).'</td>'
					.'<td style="width:60px;">'.$model->getStatus($row['status']).'</td>'
					.'<td class=""><ul class="list-unstyled" >'
					.'<li><a class="btn btn-primary btn-xs" target="_blank" href="'.$this->createUrl('update', array('id' => $row['id'])).'">审核(回复)</a></li>'
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
