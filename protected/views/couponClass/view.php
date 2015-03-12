<?php
/* @var $this CouponClassController */
/* @var $model CouponClass */

$this->breadcrumbs=array(
	'优惠券列表'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'返回列表', 'url'=>array('admin')),
	
);
?>
<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">基本信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
     <div class="portlet-body">
      <?php if($model) :?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		'name' => 'id',
		'type' => 'raw',
		'value' => '<p id="coupon">'.$model->id.'</p>',
		),
		'name',
		'pic_link',
		'small_pic_link',
		'category',
		'price',
		'begin_time',
		'delay',
		'num',
		'descript',
		//'status',
		//'part_use',
	array(
		'name'=>'part_use',
		'value'=>$model->getPartUse(),
	),
	array(
		'name'=>'addup_use',
		'value'=>$model->getAddup(),
	),
	array(
		'name' => 'status',
		'value' => $model->getBaseStatus(),
	),
		'use_rules',
		
	),
)); ?>
  <?php else: ?>
   <div class="alert alert-info">
		没有资金账户
	</div>
    <?php endif;?>
</div>
</div>

<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#coupon-class-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'couponModel'=>$couponModel,
)); ?>
</div>

<div style="overflow:auto;">
<div class="portlet box blue" >
    <div class="portlet-title">
    	<div class="caption">属性信息</div>
    	<div class="tools">
    		<a href="javascript:;" class="collapse"></a>
    	</div>
    </div>
     <div class="portlet-body">
	<table class="table  table-hover table-bordered dataTable"  aria-describedby="sample_editable_1_info">
	<tr role="row">
			<th>id</th>
			<th><?php echo $couponModel->getAttributeLabel('coupon_id'); ?></th>
			<th><?php echo $couponModel->getAttributeLabel('name'); ?></th>
			<th><?php echo $couponModel->getAttributeLabel('keyword'); ?></th>
			<th><?php echo $couponModel->getAttributeLabel('limit_value'); ?></th>
			<th><?php echo $couponModel->getAttributeLabel('descript'); ?></th>
			<th>操作</th>
		</tr>
		<?php foreach($couponNature as $row){?>
			<tr class='table'  name='<?php echo $row['id']?>'>
				<td class='' value="<?php echo $row['id']?>"><?php echo $row['id']?></td>
				<td class="coupon_id"  name="<?php echo $row['coupon_id']?>" id='coupon_id'><?php echo $row['coupon_id']?></td>
				<td class='mod' name='<?php echo $row['id']?>' value="<?php echo $row['name']?>" data='name'><?php echo $row['name']?></td>
				<td class='mod' name='<?php echo $row['id']?>' value="<?php echo $row['keyword']?>" data='keyword'><?php echo $row['keyword']?></td>
				<td class='mod' name='<?php echo $row['id']?>' value="<?php echo $row['limit_value']?>" data='limit_value'><?php echo $row['limit_value']?></td>
				<td class='mod' name='<?php echo $row['id']?>' value="<?php echo $row['descript']?>" data='descript'><?php echo $row['descript']?></td>
				<td>
					<ul class="list-unstyled">
						<li><a class="btn btn-primary btn-xs update"  data_name='mod' name="<?php echo $row['id']?>" >修改</a></li>
						<li><a class="btn btn-primary btn-xs delete"  name="<?php echo $row['id']?>"">删除</a></li>
					</ul>
				</td>
			</tr>
		<?php }?>
	</table>

<div>
	<button id="submit">
		<img style="width:50px;height:30px;border:1px;" src="/images/social/submit.jpg"/>
	</button>
</div>
<div class="text-center" >
<!--<?php 
	//application.extensions.widgets.CCLinkPager
	$this->widget('application.extensions.widgets.CCLinkPager',array('pages'=>$pages, 'header' => '', 'maxButtonCount' => '1', 
						'prevPageLabel' => '上一页', 'nextPageLabel' => '下一页', 'firstPageLabel' => '首页', 
						'lastPageLabel' => '尾页', 'htmlOptions' => array('class' => 'pagination')));
?>-->
</div>
</div>
</div>
</div>
<script type="text/javascript">
	$('body').on('click','.update',function()
	{
		 var self=$(this);
		 if(self.attr('data_name')=="sub")
			{
					var id=self.attr('name');
					var coupon_id=$("td[class='coupon_id']").attr('name');
					var name=$(".t"+id+"[name='name']").val();
					var keyword=$(".t"+id+"[name='keyword']").val();
					var limit_value=$(".t"+id+"[name='limit_value']").val();
					var descript=$(".t"+id+"[name='descript']").val();
					
					$.ajax({
						type:'POST',
						url:'/CouponClass/NatureUpdate',
						data:{id:id,coupon_id:coupon_id,name:name,keyword:keyword,limit_value:limit_value,descript:descript},
						dataType:'json',
						success:function(data)
						{
							if(data)
							{
								var data=eval(data);
								var id=data[0].id;
								var coupon_id=data[0].coupon_id;
								var name=data[0].name;
								var keyword=data[0].keyword;
								var limit_value=data[0].limit_value;
								var descript=data[0].descript;
								var name='<td class="mod" id="name" data="name" value="'+name+'" name="'+id+'">'+name+'</td>';
								var keyword='<td class="mod" data="keyword" value="'+keyword+'" name="'+id+'">'+keyword+'</td>';
								var limit_value='<td class="mod" data="limit_value" value="'+limit_value+'" name="'+id+'">'+limit_value+'</td>';
								var descript='<td class="mod" data="descript" value="'+descript+'" name="'+id+'">'+descript+'</td>';
								var btn='<td><ul class="list-unstyled"><li><a class="btn btn-primary btn-xs update" name="'+id+'" data_name="mod">修改</a></li><li><a class="btn btn-primary btn-xs delete"  name="'+id+'">删除</a></li></ul></td>';
								
								$('tr[name='+id+'] td:nth-child(3)').replaceWith("'"+name+"'");
								$('tr[name='+id+'] td:nth-child(4)').replaceWith("'"+keyword+"'");
								$('tr[name='+id+'] td:nth-child(5)').replaceWith("'"+limit_value+"'");
								$('tr[name='+id+'] td:nth-child(6)').replaceWith("'"+descript+"'");
								$('tr[name='+id+'] td:nth-child(7)').replaceWith("'"+btn+"'");
							}
						}
					})	
			}
		 
			if($(".update").attr('data_name')=='mod')
			{ 
				var self=$(this);
				var selfSubmitName=self.attr('name');
				var objInput=$("td[name="+selfSubmitName+"]");
				self.attr('data_name','sub');
				self.html('提交');
				objInput.each(
					function()
					{
						var self=$(this);
						var oldText=$.trim(self.text());
						var input=$("<input type='text' class='"+'t'+selfSubmitName+"'  name='"+self.attr('data')+"' value='"+oldText +"'/>");	
						self.html(input);
					}
				)
			}
		})
		
		$('body').on('click','#submit',function()
		{
			var coupon_id=$('#coupon').html();
			var prev=$('table:last tr:last-child').attr('name');
			var id=parseFloat(prev)+parseFloat(1);
			if(!prev)
			{
				var	id=1;
			}
			var str='<tr name='+id+'>';
			 str+='<td class="'+'t'+id+'" value="">'+id+'</td>';
			 str+='<td id="coupon_id" class="coupon_id" name="'+coupon_id+'">'+coupon_id+'</td>';
			 str+='<td class="mod" data="name" value="" name=""><input type="text" class="'+'t'+id+'"  name="name" class=""  value=""></td>';
			 str+='<td class="mod" data="keyword" value="" name=""><input type="text" class="'+'t'+id+'" name="keyword" class=""  value=""></td>';
			 str+='<td class="mod" data="limit_value" value="" name=""><input type="text" class="'+'t'+id+'" name="limit_value" class=""  value=""></td>';
			 str+='<td class="mod" data="descript" value="" name=""><input type="text" class="'+'t'+id+'" name="descript" class=""  value=""></td>';
			 str+='<td>';
			 str+='<ul class="list-unstyled">';
			 str+='<li>';
			 str+='<a id="update" class="btn btn-primary btn-xs create_data" name="'+id+'" data_name="create_data">提交</a>';
			 str+='</li>';
			 str+='<li>';
			 str+='</li>';
			 str+='</ul></td></tr>'; 
			$('table:last tr:last-child').after("'"+str+"'");
		})
		
		$('body').on('click','.create_data',function(){
			 var self=$(this);
						var id=self.attr('name');
						var coupon_id=$("td[class='coupon_id']").attr('name');
						var name=$(".t"+id+"[name='name']").val();
						var keyword=$(".t"+id+"[name='keyword']").val();
						var limit_value=$(".t"+id+"[name='limit_value']").val();
						var descript=$(".t"+id+"[name='descript']").val();
						$.ajax({
							type:'POST',
							url:'/CouponClass/NatureCreate',
							data:{coupon_id:coupon_id,name:name,keyword:keyword,limit_value:limit_value,descript:descript},
							dataType:'json',
							success:function(data)
							{
								if(data)
								{
									var data=eval(data);
									var sid=data[0].id;
									var coupon_id=data[0].coupon_id;
									var name=data[0].name;
									var keyword=data[0].keyword;
									var limit_value=data[0].limit_value;
									var descript=data[0].descript;

									 var str='<tr name='+sid+'>'
									 	str+='<td class="mod"  data="id" value="'+sid+'" name="">'+sid+'</td>';
									 	str+='<td class="mod" data="coupon_id" value="'+coupon_id+'" name="">'+coupon_id+'</td>';
									 	str+='<td class="mod" id="name" data="name" value="'+name+'" name="'+sid+'">'+name+'</td>';
									 	str+='<td class="mod" data="keyword" value="'+keyword+'" name="'+sid+'">'+keyword+'</td>';
									 	str+='<td class="mod" data="limit_value" value="'+limit_value+'" name="'+sid+'">'+limit_value+'</td>';
									 	str+='<td class="mod" data="descript" value="'+descript+'" name="'+sid+'">'+descript+'</td>';
									 	str+='<td><ul class="list-unstyled"><li><a  class="btn btn-primary btn-xs update" name="'+sid+'" data_name="mod">修改</a></li><li><a class="btn btn-primary btn-xs delete"  name="'+sid+'" target="_blank">删除</a></li></ul></td>';
									 	str+='</tr>';
									 	$('table:last tr:last-child').replaceWith("'"+str+"'");
								}
							}
						})	
		})
		
		$('body').on('click','.delete',function(){
			var self=$(this);
			var id=self.attr('name');
			$.ajax({
				type:'POST',
				url:'/CouponClass/NatureDelete',
				data:{id:id},
				dataType:'json',
				success:function(data)
				{
					if(data)
					{
						var data=eval(data);
						var id=data[0].id;
						self.parent().parent().parent().parent().remove();
					}
				}
			})	
		})
</script>