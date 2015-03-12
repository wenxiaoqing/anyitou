<?php 
$this->breadcrumbs=array(
	'统计管理'=>array('admin'),
	'投资额信息',
);

$this->menu=array(
	//array('label'=>'项目首页', 'url'=>array('index')),
	//array('label'=>'创建新项目', 'url'=>array('create')),
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(  
    'id'=>'order-form',  
    'enableAjaxValidation'=>false, 
	'method'=>post,
)); ?>
<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">渠道投资信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
	<div>
	<table class="table  table-hover table-bordered dataTable"  aria-describedby="sample_editable_1_info">
		<tr>
			<td style="width:250px;">
		<div class="form-group">
		<label >开始</label>
			<div class="col-md-10">
				<?php echo $form->textField($model,'starttime', array('class' => 'form-control  _datePicker','placeholder' =>date("Y-m-d",strtotime("-7 day")),'maxlength'=>'10')); ?> 
				<?php echo $form->error($model,'starttime', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="form-group">
			<label>结束</label>
			<div class="col-md-10">
				<?php echo $form->textField($model,'endtime', array('class' => 'form-control _datePicker','placeholder' =>date("Y-m-d",strtotime("-1 day")),'maxlength'=>'10')); ?>
				<?php echo $form->error($model,'endtime', array('class'=>'help-block' )); ?>
			</div>
		</div>
		<div class="">
        	<button type="submit" class="" style="margin-left:15px;" id="submitBtn" >搜索</button>
   		 </div>
    </td>
			<td rowspan='2'>
				<?php foreach($channel as $k=>$v):?>
					<div style="width:100px;float:left;"><input type="checkbox" name="search[]"  value="<?php echo $v['id'];?>"/><?php echo $v['keywords']?></div>
				<?php endforeach;?>
			</td>
		</tr>
		<tr>
		</tr>
	</table>
	</div>

<div style="overflow:auto;">
	<table class="table table2  table-hover table-bordered dataTable"  aria-describedby="sample_editable_1_info">
		<?php if($date_amount && $channels) :?>	
				<tr class='tab'><td style='height:30px;background-color:#2e6ab1;'>时间</td>
			<?php foreach($channels as $ke=>$va):?>
				<td style='height:30px;background-color:#2e6ab1;'><?php echo $va;?></td>
			<?php endforeach;?>
				</tr>
			<?php foreach($date_amount as $k=>$v):?>
				<tr><td style='height:30px;'><?php echo $k;?></td>
			<?php for($i=0;$i<count($channels);$i++):?>
				<td style='height:30px;'><?php echo $v[$channels[$i]];?></td>
			<?php endfor;?>
				</tr>
			<?php endforeach;?>
		<?php else:?>
			<tr><td>时间</td>
			<?php foreach($channel as $key=>$val):?>
				<td><?php echo $val['keywords']?></td>
			<?php endforeach;?>
			</tr>	
		<?php endif;?>	
			
	</table>
</div>
<?php $this->endWidget();?>
<div class="text-center" >

<?php 
	//application.extensions.widgets.CCLinkPager
	$this->widget('application.extensions.widgets.CCLinkPager',array('pages'=>$pages, 'header' => '', 'maxButtonCount' => '10', 
						'prevPageLabel' => '上一页', 'nextPageLabel' => '下一页', 'firstPageLabel' => '首页', 
						'lastPageLabel' => '尾页','htmlOptions' => array('class' => 'pagination')));
?>
<?php 
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl ."/plugins/jquery-ui/jquery-ui-datepicker_zh_cn.js", CClientScript::POS_END);
$_script = <<<EOF
$(document).ready(function() {
	$('._datePicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
});
EOF;
Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
?>
</div>
</div>
</div>
<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">投资额图形表</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
    <div class="portlet-body">
<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
</div>
</div>
</div>
<script src="/plugins/ichart/js/highcharts.js" type="text/javascript"></script>
<script src="/plugins/ichart/js/modules/exporting.js" type="text/javascript"></script>
<script  type="text/javascript">
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container',
			defaultSeriesType: 'column',
			width:900,
		},
		title: {
			text: '统计图形表'
		},
		subtitle: {
			text: '来源:普惠安宜'
		},
		xAxis: {
			type:'datetime',
			gridLineWidth: 1,
		 	tickInterval: 2,
			categories: <?php echo $date;?>
			//labels:{
              //  x:45,//调节x偏移
                //y:-35,//调节y偏移
                //rotation:25//调节倾斜角度偏移
             //}
		},
		yAxis: {
			min: 0,
			title: {
				text: '人次/天'
			}
		},
		legend: {
			layout: 'vertical',
			backgroundColor: '#FFFFFF',
			align: 'left',
			verticalAlign: 'top',
			x: 5,
			y: 70
		},
		tooltip: {
			formatter: function() {
				return ''+
					this.x +': '+ this.y +'人次';
			}
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0,
			}
		},
		series:<?php echo $chart;?>
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	var $search=<?php echo $searchs?>;
	$.each($search,function(n,value) {
		$("input[value="+value+"]").attr("checked", true);
	});
})
</script>