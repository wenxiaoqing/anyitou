<?php
/**
 * 希财网 管理控制器
 * User: AkyLau
 * Date: 2014/12/4
 * Time: 17:24
 */
class ApiCsaiController extends Controller{

    /**
     * 获取来源于希财网的用户
     */
    public function actionUserList(){
        $model=new StatisticsCsai('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['StatisticsCsai']))
            $model->attributes=$_GET['StatisticsCsai'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * 根据用户ID查看用户的所有投资项目
     */
    public function actionUserInvest(){
        $date = date('Y-m-d');
        $user_id = (int)$_GET["user_id"];
        if(isset($_GET['submit']) && !empty($_GET['submit'])){
            if(!empty($_GET['time']) && !empty($user_id)){
                $date = $_GET['time'];
                $user_id = $_GET["user_id"];
            }else{
$_script = <<<EOF
BootstrapDialog.alert({title: '提示信息', message: '请选择需要查看月份的任意一天', buttonLabel:'确定'});
EOF;
                Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
            }
        }
        $month = $this->getthemonth($date);
        $first_day = $month['first']." 00:00:00";
        $last_day = $month['last']." 23:59:59";
        //验证此用户ID是否允许希财网查看
        $statistics = new StatisticsCsai();
        $criteria = new CDbCriteria();
        $criteria->addCondition('user_id = '.$user_id);
        $info = $statistics->findAll($criteria);
        //如果没有获取到用户信息，则提示
        if(empty($info)){
$_script = <<<EOF
BootstrapDialog.alert({title: '提示信息', message: '抱歉，无法获取当前用户信息', buttonLabel:'确定'});
EOF;
            Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
            //throw new CHttpException(404,'抱歉，暂时没发现此用户信息！');
        }else{
            //分页
            $criteria_page=new CDbCriteria();
            $sql = "SELECT t.*,t2.item_title,t2.begin_time,t2.repayment_time FROM user_invest t LEFT JOIN item_info t2 ON t.item_id = t2.id where t.is_true = 1 and t.status = 1 and t2.invest_status IN (1,2,3,4) and t.user_id = :user_id and t.loans_flag = 1 and t.type = 1 and t.success_time BETWEEN '".$first_day."' AND '".$last_day."'";
            $command = Yii::app()->db->createCommand($sql);
            $command->bindParam(':user_id',$user_id);
            $all_list = $command->queryAll();
            $count = count($all_list);
            $pages = new CPagination($count);
            $pages->pageSize = 20;
            $pages->applyLimit($criteria_page);

            $sql = "SELECT t.*,t2.item_title,t2.begin_time,t2.repayment_time FROM user_invest t LEFT JOIN item_info t2 ON t.item_id = t2.id where t.is_true = 1 and t.status = 1 and t2.invest_status IN (1,2,3,4) and t.user_id = :user_id and t.loans_flag = 1 and t.type = 1 and t.success_time BETWEEN '".$first_day."' AND '".$last_day."' ORDER BY t.success_time DESC LIMIT :offset,:limit";
            $command = Yii::app()->db->createCommand($sql);
            $command->bindParam(':user_id',$user_id);
            $offset = $pages->currentPage*$pages->pageSize;
            $command->bindParam(':offset', $offset);
            $limit = $pages->pageSize;
            $command->bindParam(':limit', $limit);

            //查询数据
            $list = $command->queryAll();
            $invest_list = array();
            if(!empty($list)){
                //分组统计
                foreach($list as $key=>$val){
                    //todo 计算月佣金
                    $time = $this->daysbetweendates($val["repayment_time"],$val["success_time"]);
                    if($time <= 180){
                        $list[$key]['commission'] = $val["item_amount"] * 0.003;
                    }
                    if($time > 180){
                        $list[$key]['commission'] = $val["item_amount"] * 0.006;
                    }
                }
            }else{
                $_script = <<<EOF
BootstrapDialog.alert({title: '提示信息', message: '此用户并在此期内并无任何投资', buttonLabel:'确定'});
EOF;
                Yii::app()->getClientScript()->registerScript(__CLASS__, $_script);
            }
        }
        $this->render('user_invest',array('list'=>$list,'pages'=>$pages,'user_id'=>$user_id,'date'=>$date));
    }

    /**
     * 根据用户ID和项目ID查看用户的投资记录
     */
    public function actionInvestInfo(){
        $start_time = date('Y-m-d',strtotime('-1 day'))." 23:59:59";
        $user_id = (int)$_GET["user_id"];
        $item_id = (int)$_GET["item_id"];
        //验证此用户ID是否允许希财网查看
        $statistics = new StatisticsCsai();
        $criteria = new CDbCriteria();
        $criteria->addCondition('user_id = '.$user_id);
        $info = $statistics->find($criteria);
        if(!$info){
            throw new CHttpException(404,'抱歉，暂时没发现此用户信息！');
        }

        $invest_createria = new CDbCriteria();
        $count_sql = "SELECT COUNT(t.id) as num from `user_invest` t LEFT JOIN `item_info` t2 ON t.item_id = t2.id WHERE t.user_id = :user_id and t.item_id=:item_id and t.is_true = 1 and t.loans_flag = 1 and t.status = 1 and t.type = 1 and t2.invest_status IN (1,2,3,4) and t.success_time <= '".$start_time."'";
        $command = Yii::app()->db->createCommand($count_sql);
        $command->bindParam(':user_id',$user_id);
        $command->bindParam(':item_id',$item_id);
        $count = $command->queryScalar();
        $pages = new CPagination($count);
        $pages->pageSize = 4;
        $pages->applyLimit($invest_createria);

        $list_sql = "SELECT t.*,t2.item_title from `user_invest` t LEFT JOIN `item_info` t2 ON t.item_id = t2.id WHERE t.user_id = :user_id and t.item_id=:item_id and t.is_true = 1 and t.loans_flag = 1 and t.status = 1 and t.type = 1 and t2.invest_status IN (1,2,3,4) and t.success_time <= '".$start_time."' ORDER BY t.success_time DESC LIMIT :offset,:limit";
        $command = Yii::app()->db->createCommand($list_sql);
        $command->bindParam(':user_id',$user_id);
        $command->bindParam(':item_id',$item_id);
        $offset = $pages->currentPage*$pages->pageSize;
        $command->bindParam(':offset', $offset);
        $limit = $pages->pageSize;
        $command->bindParam(':limit', $limit);

        //查询数据
        $list = $command->queryAll();
        $this->render('invest_info',array("list"=>$list,"pages"=>$pages));
    }


    /**
     * 计算两个日期直接的天数
     * @param $date1
     * @param $date2
     * @return float
     */
    private function daysbetweendates($date1, $date2){
        $date1 = strtotime($date1);
        $date2 = strtotime(date('Y-m-d',strtotime($date2)));
        $days = ($date1 - $date2)/86400 + 1;
        return $days;
    }

    /**
     * 根据时间获取所属月份的第一天和最后一天
     * @param $date
     * @return array
     */
    public function getthemonth($date){
        $firstday = date('Y-m-01', strtotime($date));
        $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
        return array('first'=>$firstday,'last'=>$lastday);
    }
}