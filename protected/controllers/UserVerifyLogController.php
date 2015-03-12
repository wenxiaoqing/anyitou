<?php
/**
 * Created by PhpStorm.
 * User: AKY
 * Date: 2015/1/16
 * Time: 10:13
 */
class UserVerifyLogController extends Controller{

    /**
     * 获取用户列表
     */
    public function actionAdmin(){
        $model=new User('search');
        $model->unsetAttributes();
        // clear any default values
        if(isset($_GET['User'])) {
            $model->attributes=$_GET['User'];
        }

        if(isset($_GET['channel'])) {
            $model->channel_key= urldecode($_GET['channel']);
        }
        if(isset($_GET['user_id'])) {
            $model->channel_key= $_GET['user_id'];
        }
        if(isset($_GET['user_name'])) {
            $model->channel_key= urldecode($_GET['user_name']);
        }
        if(isset($_GET['isinvested']) && intval($_GET['isinvested'])) { // 投资过
            $model->invest_num = '>0';
        }
        if(isset($_GET['regtime'])) {
            $model->reg_time= urldecode($_GET['regtime']);
        }
        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * 根据用户ID 获取用户信息的审核记录
     */
    public function actionVerifyInfo(){
        if(isset($_POST['user_id']) && !empty($_POST['user_id'])){
            $user_id = (int)$_POST['user_id'];

            $criteria = new CDbCriteria();
            $data = array();
            $che_dai = new Verify();
            $configs = $che_dai->getConfig();

            $criteria->compare('user_id',$user_id);
            $criteria->addInCondition('type',array_keys($configs['user_verify_type']));
            $user_verify_log = new UserVerifyLog();
            $re = $user_verify_log->findAll($criteria);

            foreach($re as $k=>$v){
                $result[$k] = $v->attributes;
            }

            //重构数据
            $results = array();
            $data = array();
            if(!empty($result)){
                foreach($result as $k=>$v){
                    $results[$v['type']] = $v;
                }
            }

            foreach($configs['user_verify_type'] as $k=>$v){
                //如果用户没有任何审核数据，直接跳出循环
                if(empty($results)){
                    $data[$k]['user_id'] = $user_id;
                    $data[$k]['type_name'] = $v;
                    $data[$k]['type'] = $k;
                    $data[$k]['status'] = 0;
                    $data[$k]['verify_time'] = '0000-00-00 00:00:00';
                    continue;
                }

                //检索用户的审核信息，没有的类型，则填充为未审核状态
                if(isset($results[$k])){
                    $data[$k]['user_id'] = $results[$k]['user_id'];
                    $data[$k]['type_name'] = $v;
                    $data[$k]['type'] = $results[$k]['type'];
                    $data[$k]['status'] = $results[$k]['status'];
                    $data[$k]['verify_time'] = $results[$k]['verify_time'];
                }else{
                    $data[$k]['user_id'] = $user_id;
                    $data[$k]['type_name'] = $v;
                    $data[$k]['type'] = $k;
                    $data[$k]['status'] = 0;
                    $data[$k]['verify_time'] = '0000-00-00 00:00:00';
                }
            }
            $data = array_values($data);
            exit(json_encode(array('status'=>1,'msg'=>'','data'=>$data)));
        }else{
            exit(json_encode(array('status'=>0,'msg'=>'参数user_id有误','data'=>'')));
        }
    }

    /**
     * 设置审核状态
     */
    public function actionSetVerifyInfo(){
        if(isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['type']) && !empty($_POST['type'])){
            $user_id = (int)$_POST['user_id'];
            $type = (int)$_POST['type'];

            //查询当前用户和信息类型是否存在，存在则不进行更新。
            $criteria = new CDbCriteria();
            $criteria->compare('user_id',$user_id);
            $criteria->compare('type',$type);

            $count = UserVerifyLog::model()->find($criteria);
            if(!empty($count)){
                exit(json_encode(array('status'=>0,'msg'=>'非法请求','data'=>'')));
            }
            $user_verify_log = new UserVerifyLog();
            $user_verify_log->user_id = $user_id;
            $user_verify_log->type = $type;
            $user_verify_log->status = 1;
            $user_verify_log->verify_time = date('Y-m-d H:i:s',time());

            $result = $user_verify_log->insert();
            if($result > 0){
                exit(json_encode(array('status'=>1,'msg'=>'','data'=>'')));
            }else{
                exit(json_encode(array('status'=>0,'msg'=>'请求失败','data'=>'')));
            }
        }else{
            exit(json_encode(array('status'=>0,'msg'=>'请求失败','data'=>'')));
        }


    }
}