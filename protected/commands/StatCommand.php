<?php
class StatCommand extends CConsoleCommand
{
	/*渠道的定时统计*/
	public function actionReg($time='')
	{
		$today=date("Ymd");
		if($time==null || empty($time)){
			$date=date("Ymd",strtotime("-1 day"));
			$day_start_time = date('Y-m-d',strtotime('-1 day')).' 00:00:00';
			$day_end_time = date('Y-m-d',strtotime('-1 day')).' 23:59:59';
		}else{
			$strTime = strtotime($time);
			$date=date('Ymd',$strTime);
			$time=date("Y-m-d",$strTime);
			$day_start_time = $time.' 00:00:00';
			$day_end_time = $time.' 23:59:59';
		}

		/**
		 *统计每天的channel_key注册数
		 */
		$sql="select reg_time,channel_key,count(*) as num from user where reg_time>=:day_start_time and reg_time<=:day_end_time group by channel_key";
		$command =Yii::app()->slave->createCommand($sql);
		$command->bindParam(':day_start_time',$day_start_time);
		$command->bindParam(':day_end_time',$day_end_time);
		$result = $command->queryAll();

		/**
		 * 修改每天的小类注册数
		*/
		if(!empty($result)){
			foreach($result as $key=>$val){
				$channel_key=$val['channel_key'];
				if(!$channel_key){
					$channel_key='others_id';
				}
				$sql="update user_channel set total=:total,total_time=:total_time where channel_key=:channel_key";
				$command = Yii::app()->db->createCommand($sql);
				$command->bindParam(':total',$val['num']);
				$command->bindParam(':total_time',$date);
				$command->bindParam(':channel_key',$channel_key);
				$data = $command->execute();
					
				if(!$data){
					continue;
				}
			}

			/**
			 *根据小类数据统计大类数据
			 */
			$sql="select type_id,sum(total) as num from user_channel where total_time =:time group by type_id";
			$command = Yii::app()->slave->createCommand($sql);
			$command->bindParam(':time',$date);
			$res = $command->queryAll();

			/**
			 * 统计某一时段
			*/
			$total_name=array();
			foreach($res as $key=>$value){
				$sql="select day from user_channel_reg where day=:date and type=:type_id";
				$command=Yii::app()->slave->createCommand($sql);
				$command->bindParam(':date',$date);
				$command->bindParam(':type_id',$value['type_id']);
				$data=$command->queryAll();
				if(!$data){

					/**
					 *修改user_channel_type
					 */
					$total_name[] =$value['type_id'];
					$sql="update user_channel_type set total='".$value['num']."',total_time='$date' where id='".$value['type_id']."'";
					$command = Yii::app()->db->createCommand($sql);
					$command= $command->execute();
					if(!$command){
						continue;
					}

					/**
					 * 大类数据添加到user_channel_reg
					 */
					$sql="insert into user_channel_reg(day,type,number)values(:day,:type,:number)";
					$command = Yii::app()->db->createCommand($sql);
					$command->bindParam(':day',$date);
					$command->bindParam(':type',$value['type_id']);
					$command->bindParam(':number',$value['num']);
					$res = $command->execute();
					if(!$res){
						continue;
					}
				}else{
					/**
					 * 修改大类数据user_channel_reg
					 */

					$sql="update user_channel_type set total='".$value['num']."',total_time='$date' where id='".$value['type_id']."'";
					$command = Yii::app()->db->createCommand($sql);
					$command= $command->execute();
					if(!$command){
						continue;
					}

					$sql="update `user_channel_reg` set `number`=:number where `day`=:day and `type`=:type";
					$command = Yii::app()->db->createCommand($sql);
					$command->bindParam(':day',$date);
					$command->bindParam(':type',$value['type_id']);
					$command->bindParam(':number',$value['num']);
					$data = $command->execute();
					if(!$data){
						continue;
					}
				}
			}

			/**
			 * 统计今天所有的注册数,然后修改user_channel_type
			 * 中id=1 的total
			 */
			$sql="select sum(total) as total from user_channel_type where total_time='$date' and id<>1";
			$num=Yii::app()->slave->createCommand($sql)->queryScalar();

			$sql="update user_channel_type set total='$num',total_time='$date' where id='1'";
			$command = Yii::app()->db->createCommand($sql)->execute();

			$sql="select number from user_channel_reg where day='$date' and type='1'";
			$number = Yii::app()->slave->createCommand($sql)->queryScalar();
			if($number){
				$sql="update user_channel_reg set number='$num' where day='$date' and type='1'";
				$update = Yii::app()->db->createCommand($sql)->execute();
			}else{
				$sql="insert into user_channel_reg(day,type,number)values('".$date."','1','".$num."')";
				$command = Yii::app()->db->createCommand($sql)->execute();
					
				/**
				 * 今天没有注册量的大类也要放到user_channel_reg
				*/
				$sql="select id from user_channel_type";
				$command = Yii::app()->slave->createCommand($sql);
				$result = $command->queryAll();
				$all_name=array();
				foreach($result as $key=>$val){
					$all_name[] = $val['id'];
				}
					
				$no_total_name=array();
				$no_total_name=array_diff($all_name,$total_name);
					
				if(!empty($no_total_name)){
					foreach($no_total_name as $key=>$val){
						if($val!=='1'){
							$sql="insert into user_channel_reg(day,type,number)values(:day,:type,'0')";
							$command = Yii::app()->db->createCommand($sql);
							$command->bindParam(':day',$date);
							$command->bindParam(':type',$val);
							$result = $command->execute();
							if(!$result){
								continue;
							}
						}
					}
				}
			}
		}else{

			/**
			 *没用户注册
			 */
			$sql="select id from user_channel_type";
			$command = Yii::app()->slave->createCommand($sql);
			$data = $command->queryAll();

			foreach($data as $key=>$val){
				$sql="insert into user_channel_reg(day,type,number)values(:day,:type,0)";
				$command = Yii::app()->db->createCommand($sql);
				$command->bindParam(':day',$date);
				$command->bindParam(':type',$val['id']);
				$res = $command->execute();
				if(!$res){
					continue;
				}
			}
		}
		echo "execute success!";
	}



	/*****渠道投资统计*****/

	public function actionInvest($time='')
	{
		if($time==null || empty($time)){
			$date=date("Ymd",strtotime("-1 day"));
			$day_start_time = date('Y-m-d',strtotime('-1 day')).' 00:00:00';
			$day_end_time = date('Y-m-d',strtotime('-1 day')).' 23:59:59';
		}else{
			$strTime = strtotime($time);
			$date=date("Ymd",$strTime);
			$day_start_time = $time.' 00:00:00';
			$day_end_time = $time.' 23:59:59';
		}

		/**
		 * 统计channel_key 每天的总数
		 */
		$sql="select u.channel_key,sum(i.item_amount) as num from user as u,user_invest as i where i.invest_time>=:day_start_time and i.invest_time<=:day_end_time and i.type='1' and i.status='1' and i.user_id=u.id group by u.channel_key";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':day_start_time',$day_start_time);
		$command->bindParam(':day_end_time',$day_end_time);
		$data = $command->queryAll();

		if(!empty($data))
		{
			foreach($data as $key=>$val)
			{
				if(empty($val['channel_key']))
				{
					$val['channel_key']='others_id';
				}

				$sql="select type_id from user_channel where channel_key='".$val['channel_key']."'";
				$result=Yii::app()->db->createCommand($sql)->queryScalar();
				$arr[$key]['type_id']=$result;
				$arr[$key]['num']=$val['num'];
			}

			/**
			 *根据type_id 分组
			 *统计每个渠道投资额和总投资额
			 */
			$sum=0;
			foreach($arr as $k=>$v)
			{
				if(!isset($res[$v['type_id']]))
				{
					$res[$v['type_id']] = '';
				}
				$res[$v['type_id']] += $v['num'];
				$sum += $arr[$k]['num'];
			}
			$res['1']=$sum;

			/**
			 * 判断user_channel_reg 中 是否存在昨天或某一天每一渠道数据
			 * 没有就插入,有就更新
			 */
			foreach($res as $key=>$val)
			{
				$sql="select type from user_channel_reg where type=:type and day=:day";
				$command = Yii::app()->db->createCommand($sql);
				$command->bindParam(':type',$key);
				$command->bindParam(':day',$date);
				$result = $command->queryScalar();

				if(!$result)
				{
					$sql="insert into user_channel_reg(type,day,number,invest_amount)values(:type,:day,0,:invest_amount)";
					$command = Yii::app()->db->createCommand($sql);
					$command->bindParam(':type',$key);
					$command->bindParam(':day',$date);
					$command->bindParam(':invest_amount',$val);
					$data = $command->execute();
				}else{
					$sql="update user_channel_reg set invest_amount=:invest_amount where day=:day and type=:type";
					$command = Yii::app()->db->createCommand($sql);
					$command->bindParam(':day',$date);
					$command->bindParam(':type',$key);
					$command->bindParam(':invest_amount',$val);
					$data = $command->execute();
				}
			}
			echo "execute success!";
		}else{
			echo "no invest_amount from time='$date'";
		}
	}
}