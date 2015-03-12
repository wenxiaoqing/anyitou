<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看项目预告';

$this->breadcrumbs=array(
	'项目预告管理' => array('noticelist'),
	'查看项目预告',
);

$this->menu=array(
	array('label'=>'项目预告列表', 'url'=>array('noticelist')),
	array('label'=>'创建预告项目', 'url'=>array('noticecreate')),
);


?>

<div class="">
	<table class="table  table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info">
	<thead>
		<tr role="row">
			<th>id</th>
			<th><?php echo $model->getAttributeLabel('title'); ?></th>
			<th><?php echo $model->getAttributeLabel('guarantee'); ?></th>
			<th><?php echo $model->getAttributeLabel('amount'); ?></th>
			<th><?php echo $model->getAttributeLabel('rate'); ?></th>
			<th><?php echo $model->getAttributeLabel('time_limit'); ?></th>
			<th><?php echo $model->getAttributeLabel('finance_time'); ?></th>
			<th><?php echo $model->getAttributeLabel('status'); ?></th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php 
		foreach($projectArrs as $row) {
			echo '<tr class="odd">'
					.'<td class="">'.$row['id'].'</td>'
					.'<td style="width:200px;">'.$row['title'].'</td>'
					.'<td class="">'.$row['guarantee'].'</td>'
					.'<td class="">'.$row['amount'].'</td>'
					.'<td class="">'.$row['rate'].'</td>'
					.'<td class="">'.$row['time_limit'].'</td>'
					.'<td class="">'.date("m-d H:i",$row['finance_time']).'</td>'
					.'<td class="">'.$model->getStatus($row['status']).'</td>'
					.'<td class=""><ul class="list-unstyled" >'
					.'<li><a class="btn btn-primary btn-xs" target="_blank" href="'.$this->createUrl('noticeupdate', array('id' => $row['id'])).'">编辑</a></li>'
					.'<li><a class="btn btn-primary btn-xs" target="_blank" href="'.$this->createUrl('noticeview', array('id' => $row['id'])).'">查看</a></li>'
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
