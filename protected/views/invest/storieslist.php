<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看投资故事';

$this->breadcrumbs=array(
	'投资故事管理' => array('storieslist'),
	'查看投资故事',
);

$this->menu=array(
	array('label'=>'投资故事列表', 'url'=>array('storieslist')),
	array('label'=>'创建投资故事', 'url'=>array('storiescreate')),
);


?>

<div class="">
	<table class="table  table-striped table-hover table-bordered dataTable table-condensed" id="sample_editable_1" aria-describedby="sample_editable_1_info">
	<thead>
		<tr role="row">
			<th>id</th>
			<th><?php echo $model->getAttributeLabel('title'); ?></th>
			<th><?php echo $model->getAttributeLabel('sendtime'); ?></th>
			<th><?php echo $model->getAttributeLabel('recommend'); ?></th>
			<th><?php echo $model->getAttributeLabel('status'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php 
		foreach($projectArrs as $row) {
			echo '<tr class="odd">'
					.'<td class="">'.$row['id'].'</td>'
					.'<td style="width:220px;">'.$row['title'].'</td>'
					.'<td class="">'.$row['sendtime'].'</td>'
					.'<td class="">'.$model->getRecommendType($row['recommend']).'</td>'
					.'<td class="">'.$model->getStatus($row['status']).'</td>'
					.'<td class=""><ul class="list-unstyled" >'
					.'<li><a class="btn btn-primary btn-xs" target="_blank" href="'.$this->createUrl('storiesupdate', array('id' => $row['id'])).'">编辑</a></li>'
					.'<li><a class="btn btn-primary btn-xs" target="_blank" href="'.$this->createUrl('storiesview', array('id' => $row['id'])).'">查看</a></li>'
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
