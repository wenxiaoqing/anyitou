<?php
class UserChannelInvestController extends Controller
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
				'model' =>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful,the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

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
		$this->performAjaxValidation($model);
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
		if(!isset($_POST['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UserChannelReg');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserChannelReg();
		$yesterday=date("Y-m-d",strtotime("-1 day"));
		$defaultStartTime=date("Y-m-d",strtotime("-30 day"));
		$month=strtotime(date("Y-m-d",strtotime("-30 day")));
		$day=strtotime(date("Y-m-d",strtotime("-1 day")));
		/**
		 * 修改默认的时间为传过来的时间
		*/
		if($_POST['UserChannelReg']['starttime'])
		{
			$starttime=$_POST['UserChannelReg']['starttime'];
			if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/",$starttime))
			{
				$starttime=date("Y-m-d",strtotime("-7 day"));

			}

			$defaultStartTime=$starttime;
			$model->starttime=$defaultStartTime;
			$month=$starttime;
		}

		if($_POST['UserChannelReg']['endtime'])
		{
			$endtime=$_POST['UserChannelReg']['endtime'];
			if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/",$endtime))
			{
				$endtime=date("Y-m-d",strtotime("-1 day"));
			}
			$yesterday=$endtime;
			$model->endtime=$yesterday;
			$day=$endtime;
		}

		/**
		 * checkbox传过来值时
		 */
		if($_POST['search'])
		{
			$search=$_POST['search'];
			foreach($search as $ke=>$va)
			{
				$searchs.=$search[$ke].',';
				$type.="'".$va."',";
			}

			$searchs='['.rtrim($searchs,',').']';
			$type=rtrim($type,',');
			$sql="select t.keywords,g.day,g.invest_amount from user_channel_reg as g,user_channel_type as t where g.day>='$defaultStartTime' and g.day<='$yesterday' and g.type=t.id and type in($type) order by g.day desc";
			$channel_amount=Yii::app()->db->createCommand($sql)->queryAll();

			//图形
			if($starttime&&$endtime)
			{
				$sql="select id,name,keywords from user_channel_type where id in($type) group by name desc";
				$keywords=Yii::app()->db->createCommand($sql)->queryAll();

				foreach($keywords as $key=>$val){
					for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
						$time=date('Y-m-d',$i);
						$sql="select t.keywords,g.invest_amount,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['id']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();

						if(empty($data)){
							$number.='0.00,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['invest_amount'].',';
							}
						}
					}

					$numbers.='{name:"'.$val['keywords'].'",data:['.rtrim($number,',').']},';
					unset($number);
				}
				for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
					$date.='"'.substr(date('Y-m-d',$i),'5').'",';
				}
				/*$date='['.rtrim($date,',').']';
				 $chart='['.$numbers.']';*/
			}
			else
			{
				$sql="select id,name,keywords from user_channel_type where id in($type) group by name desc";
				$keywords=Yii::app()->db->createCommand($sql)->queryAll();

				foreach($keywords as $key=>$val){
					for($i=$month;$i<=$day;$i+=(3600*24)){
						$time=date('Y-m-d',$i);
						$sql="select t.keywords,g.invest_amount,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['id']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();

						if(empty($data)){
							$number.='0.00,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['invest_amount'].',';
							}
						}
					}

					$numbers.='{name:"'.$val['keywords'].'",data:['.rtrim($number,',').']},';
					unset($number);
				}
				for($i=$month;$i<=$day;$i+=(3600*24)){
					$date.='"'.substr(date('Y-m-d',$i),'5').'",';
				}

			}
				
			$date='['.rtrim($date,',').']';
			$chart='['.$numbers.']';
		}
		else
		{
			$sql="select t.keywords,g.day,g.invest_amount from user_channel_reg as g,user_channel_type as t where g.day>='$defaultStartTime' and g.day<='$yesterday' and g.type=t.id  order by g.day desc";
			$channel_amount=Yii::app()->db->createCommand($sql)->queryAll();
				
			//图形统计
			if($starttime&&$endtime)
			{
				$sql="select id,name,keywords from user_channel_type group by name desc";
				$keywords=Yii::app()->db->createCommand($sql)->queryAll();

				foreach($keywords as $key=>$val){
					for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
						$time=date('Y-m-d',$i);
						$sql="select t.keywords,g.invest_amount,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['id']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();

						if(empty($data)){
							$number.='0.00,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['invest_amount'].',';
							}
						}
					}

					$numbers.='{name:"'.$val['keywords'].'",data:['.rtrim($number,',').']},';
					unset($number);
				}
				for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
					$date.='"'.substr(date('Y-m-d',$i),'5').'",';
				}
			}
			else
			{
				$sql="select id,name,keywords from user_channel_type group by name desc";
				$keywords=Yii::app()->db->createCommand($sql)->queryAll();

				foreach($keywords as $key=>$val){
					for($i=$month;$i<=$day;$i+=(3600*24)){
						$time=date('Y-m-d',$i);
						$sql="select t.keywords,g.invest_amount,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['id']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();

						if(empty($data)){
							$number.='0.00,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['invest_amount'].',';
							}
						}
					}

					$numbers.='{name:"'.$val['keywords'].'",data:['.rtrim($number,',').']},';
					unset($number);
				}
				for($i=$month;$i<=$day;$i+=(3600*24)){
					$date.='"'.substr(date('Y-m-d',$i),'5').'",';
				}

			}
				
			$date='['.rtrim($date,',').']';
			$chart='['.$numbers.']';
		}

		foreach($channel_amount as $key=>$val)
		{
			$date_amount[$val['day']][$val['keywords']]=$val['invest_amount'];
			$channel_type[$val['keywords']][$val['day']]=$val['invest_amount'];
		}
			
		foreach($channel_type as $key=>$val)
		{
			$channels[] = $key;
		}
			
		foreach($date_amount as $ke=>$va)
		{
			foreach($channels as $k=>$v)
			{
				if(!$date_amount[$ke][$v])
				{
					$date_amount[$ke][$v]='0.00';
				}
			}
		}

		$channel=Yii::app()->db->createCommand()
		->select('id,keywords')
		->from('user_channel_type')
		->group('name')
		->queryAll();

		$this->render('admin',array(
				'model'=>$model,
				'channel'=>$channel,
				'date_amount'=>$date_amount,
				'channels'=>$channels,
				'date'=>$date,
				'chart'=>$chart,
				'searchs'=>$searchs,
		));
	}

	public function loadModel($id)
	{
		$model=UserChannelReg::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserChannelReg $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-channel-reg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
