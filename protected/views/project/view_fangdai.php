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
	array('label'=>'编辑项目', 'url'=>array('updateFangdai', 'id' => $infoRecord['id'])),
	array('label'=>'创建项目', 'url'=>array('createFangdai')),
);

?>

<div class="tabbable tabbable-custom tabbable-full-width" >
	<ul class="nav nav-tabs">
		<li class="<?php if(Yii::app()->request->getParam('type') == 'info' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>"><a href="#info" data-toggle="tab" >基本信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'detail'){ echo ' active'; } ?>"><a href="#detail" data-toggle="tab" >详细信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'house'){ echo ' active'; } ?>"><a href="#house" data-toggle="tab" >房产信息</a></li>
		<li class="<?php if(Yii::app()->request->getParam('type') == 'stat'){ echo ' active'; } ?>"><a href="#stat" data-toggle="tab" >统计信息</a></li>
	</ul>
	<div class="tab-content" >
		<div class="tab-pane fade in <?php if(Yii::app()->request->getParam('type') == 'info' || Yii::app()->request->getParam('type') == ''){ echo ' active'; } ?>" id="info">
		<?php echo $this->renderPartial('_fangdai_viewInfo', array( 'model' => $infoRecord, 
						'companyModel' => $companyModel,
						'guaranteeModel' => $guaranteeModel,
						'user_name'=>$user_name,
		            )); ?>
		</div>
		<div class="tab-pane fade in <?php if(Yii::app()->request->getParam('type') == 'detail'){ echo ' active'; } ?>" id="detail">
		<?php echo $this->renderPartial('_fangdai_viewDetail', array( 'model' => $detailRecord)); ?>
		</div>
		<div class="tab-pane fade in <?php if(Yii::app()->request->getParam('type') == 'house'){ echo ' active'; } ?>" id="house">
		<?php echo $this->renderPartial('_fangdai_viewHouse', array( 'model' => $houseInfo)); ?>
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