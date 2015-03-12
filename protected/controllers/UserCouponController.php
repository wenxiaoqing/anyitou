<?php

class UserCouponController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionView($id)
	{
		$userModel=UserCoupon::model()->findByAttributes(array('id'=>$id));
		$this->render('view',array('model' => $userModel));			
	}

	public function actionAdmin()
	{

		$model=new UserCoupon('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserCoupon'])) {
			$model->attributes= $_GET['UserCoupon'];
		}
		
		$this->render('admin',array(
				'model'=>$model,
		));
	}
	
      public function actionCreate()
	   {
	   
	   		$model=new UserCoupon;
	   		$sourceAttrs=require(dirname(__FILE__).'/../classes/coupon.php');
	   		$sourceAttrs=$sourceAttrs['source_type'];
			if(isset($_POST['UserCoupon'])){
				$user_name=$_POST['UserCoupon']['user_name'];
				$coupon_name=$_POST['UserCoupon']['name'];
				$item_title=$_POST['UserCoupon']['item_title'];
				$source_id=$_POST['UserCoupon']['source_id'];
				
				if(isset($source_id))
				{
					$source_id=0;
				}
				
				
 				$post=User::model()->findByAttributes(array('user_name'=>$user_name));
 				$user_id=$post->id;
				$couponName=CouponClass::model()->findByAttributes(array('name'=>$coupon_name));
				$coupon_id=$couponName->id;
 				$item=ItemInfo::model()->findByAttributes(array('item_title'=>$item_title));
 				$item_id=$item->id;
 				
 				if(!($post||$couponName||$itemTitle))
 				{
 					$model->addError('user_id','用户不存在或不能为空!');
 					$model->addError('coupon_id','无此类优惠券或不能为空!');
 					$model->addError('item_id','不存在此项目或不能为空!');
  					$this->render('create',array(
  							'model'=>$model,
  							'sourceAttrs'=>$sourceAttrs,
  							
  					));
  					return false;
 				}
			
 				$model->item_id=$item_id;
				$model->user_id=$user_id;
				$model->coupon_id=$coupon_id;
				$_POST['UserCoupon']['source_id']=$source_id;
				$model->attributes=$_POST['UserCoupon']['source_id'];
				$model->attributes=$_POST['UserCoupon'];
				if($model->validate()){
					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
			
			$this->render('create',array(
					'model'=>$model,
					'sourceAttrs'=>$sourceAttrs,
			));
	  }
	  
	public function actionUpdate($id)
	{
		$model=UserCoupon::model()->findByAttributes(array('id'=>$id));
		$sourceAttrs=require(dirname(__FILE__).'/../classes/coupon.php');
		$sourceAttrs=$sourceAttrs['source_type'];
		if(isset($_POST['UserCoupon']))
		{
			$begin_time=$_POST['UserCoupon']['begin_time'];
			$end_time=$_POST['UserCoupon']['end_time'];
			if($begin_time>$end_time)
			{
				$mode->addError('begin_time','开始时间大于结束时间!');
				$this->render('update',array(
						'model'=>$model,
						'sourceAttrs'=>$sourceAttrs,
					));
				return false;
			}
			$user_name=$_POST['UserCoupon']['user_name'];
			$coupon_name=$_POST['UserCoupon']['name'];
			$item_title=$_POST['UserCoupon']['item_title'];
			$source_id=$_POST['UserCoupon']['source_id'];
			if(isset($source_id))
			{
				$source_id=0;
			}
			$post=User::model()->findByAttributes(array('user_name'=>$user_name));
			$user_id=$post->id;
			$couponName=CouponClass::model()->findByAttributes(array('name'=>$coupon_name));
			$coupon_id=$couponName->id;
			$itemTitle=ItemInfo::model()->findByAttributes(array('item_title'=>$item_title));
			$item_id=$itemTitle->id;
			
			if(!($post||$couponName||$itemTitle))
			{
				$model->addError('user_id','用户不存在或不能为空!');
 					$model->addError('coupon_id','无此类优惠券或不能为空!');
 					$model->addError('item_id','不存在此项目或不能为空!');
				$this->render('update',array(
						'model'=>$model,
						'sourceAttrs'=>$sourceAttrs,
				));
				return false;
			}
			
			$model->user_id=$user_id;
			$model->coupon_id=$coupon_id;
			$model->item_id=$item_id;
			$_POST['UserCoupon']['source_id']=$source_id;
			$model->attributes=$_POST['UserCoupon']['source_id'];
			$model->attributes=$_POST['UserCoupon'];
			if($model->validate()){
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
		}
			
		$this->render('update',array(
				'model'=>$model,
				'sourceAttrs'=>$sourceAttrs,
		));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		UserCoupon::model()->deleteAllByAttributes(array('id' => $id));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	/**
	 * 处理jquery自动完成请求, 返回匹配的数据
	 *
	 */
	public function actionAutocomplete()
	{
		$term = $_GET['term'];
		$User = new User();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('user_name', $term);
		$criteria->limit = 10;
		$records = $User->findAllByAttributes(array(), $criteria);
	
		$response = array();
		foreach($records as $record) {
			$tmprow = array();
			$tmprow['value'] = $record->user_name;
			$tmprow['label'] = $record->user_name;
			$response[] = $tmprow;
		}
		echo json_encode($response);
		exit();
	}
	
	public function actionNameAutocomplete()
	{
		$term = $_GET['term'];
		$name = new CouponClass();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('name', $term);
		$criteria->limit = 10;
		$records = $name->findAllByAttributes(array(), $criteria);
	
		$response = array();
		foreach($records as $record) {
			$tmprow = array();
			$tmprow['value'] = $record->name;
			$tmprow['label'] = $record->name;
			$response[] = $tmprow;
		}
		echo json_encode($response);
		exit();
	}
	
	public function actionItemAutocomplete()
	{
		$term = $_GET['term'];
		$item = new ItemInfo();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('item_title', $term);
		$criteria->limit = 10;
		$records = $item->findAllByAttributes(array(), $criteria);
	
		$response = array();
		foreach($records as $record) {
			$tmprow = array();
			$tmprow['value'] = $record->item_title;
			$tmprow['label'] = $record->item_title;
			$response[] = $tmprow;
		}
		echo json_encode($response);
		exit();
	}
	  
	
}