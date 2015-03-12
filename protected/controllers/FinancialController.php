<?php

class FinancialController extends Controller
{
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserCashLog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserCashLog']))
		{
			$model->attributes=$_POST['UserCashLog'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserCashLog']))
		{
			$model->attributes=$_POST['UserCashLog'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UserCashLog');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserCashLog('search');
		$categorysAttrs= array(
    		  	'repayment_interest_reward' =>'投资奖励收益', 
				'repayment_interest_coupon_int' =>'利息券收益', 
				'repayment_interest_coupon_reb' =>'反利券收益', 
				'collect_fillamount' =>'补全融资额', 
				'invite_reward' =>'邀请奖励', 
				'system' =>'系统支付', 
				'draw_coupon'=>'抵消提现券', 
				'activity_price'=>'活动奖励',
				'debt_sellfee' =>'转让手续费',
    		);
		
		$categorysAttrss= array(
				'repayment_interest_reward',
				'repayment_interest_coupon_int',
				'repayment_interest_coupon_reb',
				'collect_fillamount',
				'invite_reward',
				'system',
				'draw_coupon',
				'activity_price',
				'debt_sellfee',
		);
		
		$model->unsetAttributes(); 
		$model->category=$categorysAttrss;
		
		if(isset($_GET['UserCashLog']))
		{	
			$category=$_GET['UserCashLog']['category'];
			if(empty($category))
			{
				$_GET['UserCashLog']['category']=$categorysAttrss;
			}
			
 			$model->attributes=$_GET['UserCashLog'];
			$date=$_GET['date'];
			$starttime=$_GET['UserCashLog']['starttime'];
			$endtime=$_GET['UserCashLog']['endtime'];
			
			if($starttime||$endtime)
			{
				if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/",$starttime)&&!preg_match("/(\d{4}-\d{2}-\d{2}\d{2}:\d{2}:\d{2})|(\d{2}-\d{2}\d{2}:\d{2}:\d{2})|(\d{2}:\d{2}:\d{2})/",$starttime))
				{
					$total_cash='';
					$model->starttime=$starttime;
					$model->endtime=$endtime;
					$model->addError('starttime','时间选择不正确！');
					$model->addError('endtime','时间选择不正确！');
					$this->render('admin',array(
							'date'=>$date,
							'model'=>$model,
							'categorysAttrs'=>$categorysAttrs,
							'total_cash'=>$total_cash,
					));
					return false;
				}
				
				if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/",$endtime)&&!preg_match("/(\d{4}-\d{2}-\d{2}\d{2}:\d{2}:\d{2})|(\d{2}-\d{2}\d{2}:\d{2}:\d{2})|(\d{2}:\d{2}:\d{2})/",$endtime))
				{
					$total_cash='';
					$model->endtime=$endtime;
					$model->starttime=$starttime;
					$model->addError('starttime','时间选择不正确！');
					$model->addError('endtime','时间选择不正确！');
					$this->render('admin',array(
							'date'=>$date,
							'model'=>$model,
							'categorysAttrs'=>$categorysAttrs,
							'total_cash'=>$total_cash,
					));
					return false;
				}
				
				if($starttime>=$endtime)
				{
					$total_cash='';
					$model->starttime=$starttime;
					$model->endtime=$endtime;
					$model->addError('starttime','时间选择不正确！');
					$model->addError('endtime','时间选择不正确！');
					$this->render('admin',array(
							'date'=>$date,
							'model'=>$model,
							'categorysAttrs'=>$categorysAttrs,
							'total_cash'=>$total_cash,
					));
					return false;
				}
			}
			
			if(($starttime||$endtime) &&$date)
			{
				$total_cash='';
				$model->starttime=$starttime;
				$model->endtime=$endtime;
				$model->addError('starttime','时间选择不正确！');
				$model->addError('endtime','时间选择不正确！');
				$this->render('admin',array(
					'date'=>$date,
					'model'=>$model,
					'categorysAttrs'=>$categorysAttrs,
					'total_cash'=>$total_cash,
				));
				return false;
			}
			
			if(empty($starttime)&&$endtime&&empty($date))
			{
				$total_cash='';
				$model->starttime=$starttime;
				$model->endtime=$endtime;
				$model->addError('starttime','时间选择不正确！');
				$model->addError('endtime','时间选择不正确！');
				$this->render('admin',array(
						'date'=>$date,
						'model'=>$model,
						'categorysAttrs'=>$categorysAttrs,
						'total_cash'=>$total_cash,
				));
				return false;
			}
			
			if($starttime&&empty($endtime) &&empty($date))
			{
				$total_cash='';
				$model->starttime=$starttime;
				$model->endtime=$endtime;
				$model->addError('starttime','时间选择不正确！');
				$model->addError('endtime','时间选择不正确！');
				$this->render('admin',array(
						'date'=>$date,
						'model'=>$model,
						'categorysAttrs'=>$categorysAttrs,
						'total_cash'=>$total_cash,
				));
				return false;
			}
			
			if(isset($_GET['UserCashLog']['starttime'])&&isset($_GET['UserCashLog']['endtime'])&&isset($_GET['date'])){
				if(empty($starttime)&&empty($endtime) &&empty($date))
				{
					$model->category=$category;
					$sql="select sum(cash_num) as total_cash from user_cash_log where category='$category' and cash_status='$cash_status' group by category";
					$total_cash=Yii::app()->db->createCommand($sql)->queryScalar();
				}
			}
			
			if($starttime&&$endtime)
			{
				$model->starttime=$starttime;
				$model->endtime=$endtime;
				$model->category=$category;
				$sql="select sum(cash_num) as total_cash from user_cash_log where category='$category' and cash_status='$cash_status' and deal_time>='$starttime' and deal_time<='$endtime' group by category";
				$total_cash=Yii::app()->db->createCommand($sql)->queryScalar();
			}
			
			if($date&&empty($starttime)&&empty($endtime))
			{
				$model->category=$category;
				$deal_time=date('Y-m-d H:i:s',strtotime($date));
				if(empty($deal_time))
				{
					$deal_time='0000-00-00 00:00:00';
				}
				$sql="select sum(cash_num) as total_cash from user_cash_log where category='$category' and cash_status='$cash_status' and deal_time>='$deal_time' group by category";
				$total_cash=Yii::app()->db->createCommand($sql)->queryScalar();
			}
			
			if(empty($total_cash))
			{
				$total_cash='0.00';
			}
		}
		
		$this->render('admin',array(
			'model'=>$model,
			'categorysAttrs'=>$categorysAttrs,
			'total_cash'=>$total_cash,
			'date'=>$date,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserCashLog the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserCashLog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserCashLog $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-cash-log-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
