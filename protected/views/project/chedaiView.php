<?php
/* @var $this BorrowController */
/* @var $model Borrow */

$this->pageTitle = '查看项目';

$this->breadcrumbs=array(
	'项目管理' => array('admin'),
	'查看项目',
);

$this->menu=array(
	array('label'=>'项目列表', 'url'=>array('admin')),
	array('label'=>'编辑项目', 'url'=>array('chedaiUpdate', 'id' => $infoRecord['id'])),
	array('label'=>'创建项目', 'url'=>array('create')),
);

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="<?php if(Yii::app()->request->getParam('type') == 'info' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="#info" data-toggle="tab" >基本信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'detail'){ echo ' active'; } ?>"><a href="#detail" data-toggle="tab" >详细信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'car'){ echo ' active'; } ?>"><a href="#car" data-toggle="tab" >车辆信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'stat'){ echo ' active'; } ?>"><a href="#stat" data-toggle="tab" >统计信息</a></li>
	</ul>
	<div class="tab-content" >
		<div class="tab-pane fade in <?php if(Yii::app()->request->getParam('type') == 'info' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>" id="info">
		<?php echo $this->renderPartial('_chedaiViewInfo', array( 'model' => $infoRecord, 
						'companyModel' => $companyModel,
						'guaranteeModel' => $guaranteeModel,
						'user_name'=>$user_name,
		            )); ?>
		</div>
		<div class="tab-pane fade in <?php if(Yii::app()->request->getParam('type') == 'detail'){ echo ' active'; } ?>" id="detail">
		<?php echo $this->renderPartial('_chedai_viewDetail', array( 'model' => $detailRecord)); ?>
		</div>
		<div class="tab-pane fade in <?php if(Yii::app()->request->getParam('type') == 'car'){ echo ' active'; } ?>" id="car">
		<?php echo $this->renderPartial('_chedai_carView', array( 'model' => $carInfo)); ?>
		</div>
		<div class="tab-pane fade in <?php if(Yii::app()->request->getParam('type') == 'stat'){ echo ' active'; } ?>" id="stat">
            <table class="table table-bordered table-striped detail-view">
            	<colgroup>
            		<col class="col-xs-1">
            		<col class="col-xs-7">
            	</colgroup>
            	<tbody>
            		<tr>
            			<th class="odd" >冻结资金：</th>
            			<td><?php echo UtilClass::formatMoney($freezeData->TransAmt, 2); ?><span class="unit" >元</span></td>
            		</tr>
            		<tr>
            			<th class="odd" >实际融资额：</th>
            			<td><?php echo UtilClass::formatMoney($actuallyInvest, 2); ?><span class="unit" >元</span></td>
            		</tr>
            	</tbody>
            </table>
		</div>
	</div>
</div>