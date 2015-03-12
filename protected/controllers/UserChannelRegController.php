<?php
class UserChannelRegController extends Controller
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
		$models=new UserChannelReg();
		$yesterday=date("Y-m-d",strtotime("-1 day"));
		$defaultStartTime=date("Y-m-d",strtotime("-29 day"));
		$month=strtotime(date("Y-m-d",strtotime("-30 day")));
		$day=strtotime(date("Y-m-d",strtotime("-1 day")));

		if($_POST['UserChannelReg']['starttime']){
			$starttime=$_POST['UserChannelReg']['starttime'];
			if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/",$starttime))
			{
				$starttime=date("Y-m-d",strtotime("-7 day"));
			}
				
			$defaultStartTime=$starttime;
			$models->starttime=$defaultStartTime;
			$month=$starttime;
		}

		if($_POST['UserChannelReg']['endtime']){
			$endtime=$_POST['UserChannelReg']['endtime'];
			if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/",$endtime))
			{
				$endtime=date("Y-m-d",strtotime("-1 day"));
			}
			$yesterday=$endtime;
			$models->endtime=$yesterday;
			$day=$endtime;
		}
			
		if($_POST['search']){
			$search=$_POST['search'];
			foreach($search as $ke=>$ve){
				$search[$ke]="'$search[$ke]'";
				$searchs.=$search[$ke].',';
			}
			$searchs='['.rtrim($searchs,',').']';
			$value=implode(',',$search);
			$sql="select id from user_channel_type where keywords in($value)";
			$data=Yii::app()->db->createCommand($sql)->queryAll();

			$implode=array();
			foreach($data as $key=>$val){
				foreach($val as $k=>$v){
					$implode[$key]="'$v'";
				}
			}

			$value=implode(',',$implode);
			$model=array();
			$type=array();
			$sql="select day from user_channel_reg where type in($value)";
			$empty_type=Yii::app()->db->createCommand($sql)->queryAll();
			if(empty($empty_type)){
				$model='';
				$type='';
				$sql="select keywords from user_channel_type where id in($value)";
				$up_type=Yii::app()->db->createCommand($sql)->queryAll();
			}

			$sql="select number,day,type from user_channel_reg where type in($value) and day>='$defaultStartTime' and day<='$yesterday' order by day desc";
			$type_data=Yii::app()->db->createCommand($sql)->queryAll();

			foreach($type_data as $key=>$v){
				$sql="select keywords from user_channel_type where id='".$v['type']."'";
				$data_name=Yii::app()->db->createCommand($sql)->queryScalar();
				$model[$v['day']][$data_name] = $v['number'];
				$type[$data_name][$v['day']]=$v['number'];
			}

			//图形信息
			$sql="select g.type,t.keywords from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.type in($value) group by g.type desc";
			$keywords=Yii::app()->db->createCommand($sql)->queryAll();

			if($starttime&&$endtime){
				foreach($keywords as $key=>$val){
					for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
						$time=date("Y-m-d",$i);
						$sql="select t.keywords,g.number,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['type']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();
						if(empty($data)){
							$number.='0,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['number'].',';
							}
						}
					}

					$numbers.='{name:"'.$val['keywords'].'",data:['.rtrim($number,',').']},';
					unset($number);
				}
					
				for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
					$date.='"'.substr(date('Y-m-d',$i),'5').'",';
				}
			}else{
				foreach($keywords as $key=>$val){
					for($i=$month;$i<=$day;$i+=(3600*24)){
						$time=date('Y-m-d',$i);

						$sql="select t.keywords,g.number,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['type']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();
							
						if(empty($data)){
							$number.='0,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['number'].',';
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
		}else{
			$data=Yii::app()->db->createCommand()
			->select('id')
			->from('user_channel_type')
			->queryAll();
			$implodeId=array();
			foreach($data as $key=>$val){
				foreach($val as $ke=>$v){
					$implodeId[$key]="'$v'";
				}
			}

			$value=implode(',',$implodeId);
			$sql="select number,day,type from user_channel_reg where type in($value) and day>='$defaultStartTime' and day<='$yesterday' order by day desc";
			$type_data=Yii::app()->db->createCommand($sql)->queryAll();

			$model= array();
			$type=array();
			foreach($type_data as $key=>$v){
				$sql="select keywords from user_channel_type where id='".$v['type']."'";
				$data_name=Yii::app()->db->createCommand($sql)->queryScalar();
				$model[$v['day']][$data_name] = $v['number'];
				$type[$data_name][$v['day']]=$v['number'];
			}

			//统计图形

			$sql="select g.type,t.keywords from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.type group by g.type desc";
			$keywords=Yii::app()->db->createCommand($sql)->queryAll();
			if($starttime&&$endtime){
				foreach($keywords as $key=>$val){
					for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
						$time=date('Y-m-d',$i);
						$sql="select t.keywords,g.number,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['type']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();
						if(empty($data)){
							$number.='0,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['number'].',';
							}
						}
					}
						
					$numbers.='{name:"'.$val['keywords'].'",data:['.rtrim($number,',').']},';
					unset($number);
				}

				for($i=strtotime($starttime);$i<=strtotime($endtime);$i+=86400){
					$date.='"'.substr(date('Y-m-d',$i),'5').'",';
				}
			}else{
				foreach($keywords as $key=>$val){
					for($i=$month;$i<=$day;$i+=(3600*24)){
						$time=date('Y-m-d',$i);
						$sql="select t.keywords,g.number,g.type from user_channel_reg as g,user_channel_type as t where g.type=t.id and g.day='$time' and g.type='".$val['type']."'";
						$data=Yii::app()->db->createCommand($sql)->queryAll();
							
						if(empty($data)){
							$number.='0,';
						}else{
							foreach($data as $ke=>$va){
								$number.=$va['number'].',';
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

		$upType = Yii::app()->db->createCommand()
		->select("keywords")
		->from("user_channel_type")
		->group("name")
		->queryAll();

		$countses = 0;
		foreach($model as $key=>$value){
			if(count($value)>$countses){
				$countses=count($value);
			}
		}

		foreach($type as $key=>$val){
			$array[]=$key;
		}

		foreach($model as $k=>$v){
			foreach($array as $ke=>$va){
				if(!$model[$k][$va]){
					$model[$k][$va]=0;
				}
			}
		}

		$this->render(admin,array(
				'model'=>$model,
				'array'=>$array,
				'upType'=>$upType,
				'chart'=>$chart,
				'date'=>$date,
				'models'=>$models,
				'searchs'=>$searchs,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserChannel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserChannelReg::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserChannel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-channel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
