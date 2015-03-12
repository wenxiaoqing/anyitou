<?php

class CouponClassController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionView($id)
	{
		$couponClass = CouponClass::model()->findByAttributes(array('id' => $id));
		$couponModel=new CouponNature;
					$couponNature = Yii::app()->db->createCommand()
					->select("id,coupon_id,name,keyword,limit_value,descript")
					->from("coupon_nature")
					->where("coupon_id=:coupon_id",array(':coupon_id'=>$id))
  					->queryAll();
  		
		$this->render('view',array(
				'model' => $couponClass,
				'couponModel'=>$couponModel,
				'couponNature'=>$couponNature,
		));
	}
	
	public function actionAdmin(){
		
		$model=new CouponClass('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['CouponClass'])) {
			$model->attributes=$_GET['CouponClass'];
		}
 		$this->render('admin',array(
  				'model'=>$model,
 				'categoryAttrs'=>$categoryAttrs,
  		));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		CouponClass::model()->deleteAllByAttributes(array('id' => $id));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	
	public function actionUpdate($id)
	{
		$config = require(Yii::app()->basePath.'/classes/Coupon.php');
		$model = CouponClass::model()->findByAttributes(array('id' => $id));
		if(isset($_POST['CouponClass']))
		{
			$type=$_POST['CouponClass']['category'];
			$post=CouponClass::model()->findByAttributes(array('category'=>$type));
			if(!$post)
			{
				$model->addError('category','优惠券类型不存在');
				$this->render('create',array(
						'model'=>$model,	
					));
			}
		
			$model->attributes=$_POST['CouponClass'];
			$model->addup_use=$_POST['CouponClass']['addup_use'];
			$model->use_rules=$_POST['CouponClass']['use_rules'];
			if($model->validate()) {
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		$categoryAttrs = $config['category'];
		$this->render('update',array(
				'model'=>$model,
				'categoryAttrs'=>$categoryAttrs,
		));
	}
	
	public function actionCreate()
	{
		$config = require(Yii::app()->basePath.'/classes/Coupon.php');
		$model=new CouponClass;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['CouponClass'])) {
			$model->addup_use=$_POST['CouponClass']['addup_use'];
			$model->use_rules=$_POST['CouponClass']['use_rules'];
			$model->attributes = $_POST['CouponClass'];
			if($model->validate()) {
				if($model->save()) {
					$this->redirect(array('view','id'=>$model->id));
				}
			}
		}
		
		$categoryAttrs = $config['category'];
		$this->render('create',array(
				'model'=>$model,
				'categoryAttrs'=>$categoryAttrs,
		));
	}
	
	
	
	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='coupon-class-form')
		{
				
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * 处理jquery自动完成请求, 返回匹配的数据
	 *
	 */
	public function actionAutocomplete()
	{
		$term = $_GET['term'];
		$User = new CouponClass();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('category', $term);
		$criteria->limit = 10;
		$records = $User->findAllByAttributes(array(), $criteria);
	
		$response = array();
		foreach($records as $record) {
			$tmprow = array();
			$tmprow['value'] = $record->id;
			$tmprow['label'] = $record->category;
			$response[] = $tmprow;
		}
		echo json_encode($response);
		exit();
	}
	
	/*修改优惠券属性*/
	public function actionNatureUpdate()
	{	
 			$id=$_POST['id'];
 			$model=CouponNature::model()->findByPk($id);
 			$model->name=$_POST['name'];
 			$model->keyword=$_POST['keyword'];
 			$model->limit_value=$_POST['limit_value'];
 			$model->descript=$_POST['descript'];
 			$a['id']=$_POST['id'];
 			$a['coupon_id']=$_POST['coupon_id'];
 			$a['name']=$_POST['name'];
 			$a['keyword']=$_POST['keyword'];
 			$a['limit_value']=$_POST['limit_value'];
 			$a['descript']=$_POST['descript'];
			if($model->save())
			{
				echo json_encode(array($a));
 			}else{
 				echo json_encode(0);
			}
	}
		
	
	
	/*创建数据*/
	public function actionNatureCreate()
	{	
		
			$model=new CouponNature;
			$name=$_POST['name'];
			$coupon_id=$_POST['coupon_id'];
			$keyword=$_POST['keyword'];
			$limit_value=$_POST['limit_value'];
			$descript=$_POST['descript'];
			
			$model->coupon_id=$coupon_id;
			$model->name=$name;
			$model->keyword=$keyword;
			$model->limit_value=$limit_value;
			$model->descript=$descript;
		
		if($model->save())
		{
			$data=CouponNature::model()->findByAttributes(array('name'=>$name,'coupon_id'=>$coupon_id,'keyword'=>$keyword,'limit_value'=>$limit_value,'descript'=>$descript));
			$a['id']=$data->id;
			$a['coupon_id']=$data->coupon_id;
			$a['name']=$data->name;
			$a['keyword']=$data->keyword;
			$a['limit_value']=$data->limit_value;
			$a['descript']=$data->descript;
			echo json_encode(array($a));
		}else{
			//echo json_encode(array(0));'
			echo "error";
		}
		
	}
	
	/*ajax删除数据*/
	public function actionNatureDelete()
	{	
		$id=$_POST['id'];
		$del=CouponNature::model()->deleteByPk($id);
		if($del>0)
		{
			$a['id']=$_POST['id'];
			echo json_encode(array($a));
		}else{
			echo "error";
		}
		
	}
}
	
	
