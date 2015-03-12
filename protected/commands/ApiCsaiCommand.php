<?php
/**
 * 希财网统计Command
 * User: AKY
 * Date: 2014/12/3
 * Time: 17:36
 */
class ApiCsaiCommand extends CConsoleCommand{

    private $log_path = '../runtime/csai_console.log';

    public function actionUserList($args){
        try{
            //先获取统计表用户id
            $statistics_user_sql = "select `user_id` from `statistics_csai`";
            $statistics_list = Yii::app()->db->createCommand($statistics_user_sql)->queryAll();

            //获取今天所有来源于希财网注册用户的投资情况
            $user_list_sql = "select `id` as `user_id`,`user_name`,`real_name`,`mobile` from `user` where `channel_key` = 'csai_cn'";
            $user_list = Yii::app()->db->createCommand($user_list_sql)->queryAll();

            //如果都没有获取到记录则写log
            if(empty($statistics_list) && empty($user_list)){
                //表示还没有来源于希财网的用户,也还没有进行任何投资
                $error = array(
                    'code'  =>  100001,
                    'msg'   =>  'no sourced csai_cn User',
                    'time'  =>  date('Y-m-d H:i:s',time())
                );
                @file_put_contents($this->log_path,var_export($error."\n\n",TRUE),FILE_APPEND);
                exit("no sourced csai_cn's user after now");
            }elseif(empty($statistics_list) && !empty($user_list)){
                //如果有来源于希财网的用户，则判断有没有在今天进行投资，没有进行投资则不进行统计。
                //统计表没有记录，则有可能是第一次执行统计脚本
                $user_id = array();
                foreach($user_list as $key=>$val){
                    $user_id[] = $val['user_id'];
                    if($val["real_name"] == ''){
                        $user_list[$key]["real_name"] = '-';
                    }
                }
                $user_id = implode(',',$user_id);
                //新投资的用户需要先更新到统计表
                $builder=Yii::app()->db->schema->commandBuilder;
                $info = $builder->createMultipleInsertCommand('statistics_csai',$user_list)->execute();
                if(!$info){
                    exit('insert statitstics user list error!!!');
                }
                //获取今天新投资的用户和各用户投资总额
                $invest_list = $this->getInvestListByUserId($user_id);
                if(empty($invest_list)){
                    exit("Today,no sourced csai_cn's user had invest item!!! ");
                }
                //更新今天投资用户的总额
                $this->updateStatisticsInfo($invest_list);
                echo "SUCCESS!!!";
            }elseif(!empty($statistics_list) && !empty($user_list)){
                //获取新注册的用户
                $user_id = array();
                $user_ids = array();
                //获取用户列表，和统计列表的差集
                foreach($user_list as $key=>$val){
                    if($val["real_name"] == ""){
                        $user_list[$key]["real_name"] = '-';
                    }
                    $user_ids[] = $val["user_id"];
                    $user_id[$val["user_id"]] = $val['user_id'];
                }
                foreach($statistics_list as $key=>$val){
                    if(in_array($val["user_id"],$user_id)){
                        unset($user_id[$val["user_id"]]);
                    }
                }
                //如果不为空，则需要更新下统计表
                if(!empty($user_id)){
                    $new_user_list = array();
                    foreach($user_list as $key=>$val){
                        if(in_array($val["user_id"],$user_id)){
                            $new_user_list[] = $val;
                        }
                    }
                    //更新统计表信息
                    if(!empty($new_user_list)){
                        //进行批量插入
                        $builder=Yii::app()->db->schema->commandBuilder;
                        $info = $builder->createMultipleInsertCommand('statistics_csai',$new_user_list)->execute();
                        if(!$info){
                            exit('insert statitstics user list error!!!');
                        }
                    }

                }
                //获取今天新投资的用户和投资总额

                $invest_list = $this->getInvestListByUserId(join(',',$user_ids));
                if(empty($invest_list)){
                    exit("Today,no sourced csai_cn's user had invest item!!! ");
                }
                $this->updateStatisticsInfo($invest_list);
                echo "SUCCESS!!!";
            }else{
                //统计表已经存在来源于希财网的投资用户，用户表为空则是sql查询错误
                $error = array(
                    'code'  =>  110001,
                    'msg'   =>  'get user list NULL!!',
                    'time'  =>  date('Y-m-d',strtotime("-1 day")) //获取前一天的日期，表示统计的是哪天的内容，因为统计脚本在第二天执行
                );
                @file_put_contents($this->log_path,var_export($error."\n\n",TRUE),FILE_APPEND);exit();
            }
        }catch (Exception $e){
            Yii::log('run ApiCsaiCommand Error: '.$e->getMessage(),'info');
            exit('run ApiCsaiCommand Error: '.$e->getMessage());
        }
    }

    /**
     * 获取今天来源于希财网的所有用户投资列表
     * @param array $user_id 用户id
     * @return array
     */
    public function getInvestListByUserId($user_id){
        $list = array();
        if(empty($user_id)){
            return $list;
        }
        $day_start_time = date('Y-m-d',strtotime('-1 day')).' 00:00:00';    //因为Command脚本是在凌晨统计前一天的数据
        //$day_start_time = '2014-09-02 00:00:00';    //todo 测试数据
        $day_end_time = date('Y-m-d',strtotime('-1 day')).' 23:59:59';

        $invest_sql = "select * from `user_invest` where `user_id` in (".$user_id.") and `success_time` between '".$day_start_time."' and '".$day_end_time."' and `type` = 1 and `is_true` = 1 and `loans_flag` = 1";
        $invest_list = Yii::app()->db->createCommand($invest_sql)->queryAll();

        if(!empty($invest_list)){
            foreach($invest_list as $k=>$v){
                $list[$v["user_id"]][] = $v['item_amount'];
            }
            //计算每个用户当天投资的总额 key 为user_id values为投资总额
            foreach($list as $k=>$v){
                $list[$k] = array_sum($list[$k]);
            }
        }
        return $list;
    }

    /**
     * 更新统计信息，更新 新投资用户的投资总额
     * @param $invest_list
     */
    private function updateStatisticsInfo($invest_list){
        //更新用户的投资总额
        $transaction = Yii::app()->db->beginTransaction();
        try{
            $update_sql = "update  `statistics_csai` set `invest_total` = `invest_total` + :invest_total,`statistical_time`=:statistical_time where `user_id` = :user_id";
            foreach($invest_list as $key=>$val){
                $invest_total = $val;
                $user_id = $key;
                $statistical_time = date('Y-m-d',strtotime('-1 day')).' 00:00:00';
                $command = Yii::app()->db->createCommand($update_sql);
                $command->bindParam(':invest_total',$invest_total);
                $command->bindParam(':user_id',$user_id);
                $command->bindParam(':statistical_time',$statistical_time);
                $result = $command->execute();
                $transaction->commit();
                if(!$result){
                    $transaction->rollBack();
                    exit("update user invest_total error! by user_id:".$user_id);
                }
            }
            $transaction->commit();
        }catch (Exception $e){
            $transaction->rollBack();
            exit('update statistics info error!!!'.$e->getMessage());
        }
    }

}