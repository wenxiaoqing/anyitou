<?php
/**
 * @author AkyLau
 * Class QuestionController
 */
class QuestionController extends Controller
{
	/**
     * 当前控制器的权限过滤
	 * @return array action filters
	 */
	/*public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}*/

	/**
     * 当前登录用户对当前控制器权限控制
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

	/**
     * 题目详情操作
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
     * 新增题目操作
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Questionnaire;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Questionnaire']))
		{
			$model->attributes=$_POST['Questionnaire'];
            //构造答案的存储结构
            $answers = $model->setQuestionsAnswer();
            //设置答案内容
            $model->q_answer = $answers;
            $model->q_status = 0;
            $model->add_time = date('Y-m-d H:i:s',time());
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
     * 更新题目信息操作
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $answer = $model->getQuestionAnswer();
        //设置q_answer的输出结构
        $model->q_answer = $answer;
		if(isset($_POST['Questionnaire']))
		{
			$model->attributes=$_POST['Questionnaire'];
            $answers = $model->setQuestionsAnswer();
            //设置答案内容
            $model->q_answer = $answers;
            $model->update_time = date('Y-m-d H:i:s',time());
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
     * 逻辑删除题目操作
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$count = $this->loadModel($id)->updateByPK($id,array('q_status'=>1));
		if(!isset($_GET['ajax'])){
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Questionnaire');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
     * 题目列表操作
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Questionnaire('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Questionnaire']))
			$model->attributes=$_GET['Questionnaire'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    /**
     * 用户答题统计操作
     */
    public function actionTongji(){
        $model=new Questionnaire('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Questionnaire']))
            $model->attributes=$_GET['Questionnaire'];

        $this->render('tongji',array(
            'model'=>$model,
        ));
    }

    /**
     * 问卷调查用户列表
     */
    public function actionUserList(){
        $model=new QuestionAnswer('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['QuestionAnswer']))
            $model->attributes=$_GET['QuestionAnswer'];

        $this->render('userlist',array(
            'model'=>$model,
        ));
    }

    /**
     *
     */
    public function actionSetLucky(){
        if(isset($_GET['mobile']) && isset($_GET['lucky'])){
            $mobile = $_GET["mobile"];
            $lucky  = $_GET["lucky"];
            if($lucky == 0) {
                $counts = Yii::app()->db->createCommand()
                    ->select('count(id) as num')
                    ->from('question_answer')
                    ->where(array('and','mobile=:mobile','lucky=:lucky'),array(':mobile'=>$mobile,'lucky'=>$lucky))
                    ->queryScalar();
                if ($counts > 0) {
                    $sql = 'UPDATE `question_answer` SET `lucky`=1 WHERE `mobile`=' . $mobile;
                    $model = Yii::app()->db->createCommand($sql);
                    $result = $model->execute();
                }
            }else{
                    $counts = Yii::app()->db->createCommand()
                        ->select('count(id) as num')
                        ->from('question_answer')
                        ->where(array('and','mobile=:mobile','lucky=:lucky'),array(':mobile'=>$mobile,'lucky'=>$lucky))
                        ->queryScalar();
                    if($counts > 0){
                        $sql = 'UPDATE `question_answer` SET `lucky`=0 WHERE `mobile`='.$mobile;
                        $model = Yii::app()->db->createCommand($sql);
                        $result = $model->execute();
                    }
            }
            $this->redirect('/question/UserList');
        }
    }

    /**
     * 根据用户列出调查信息
     */
    public function actionAnswerView(){
        $model = new Questionnaire();
        if(isset($_GET['mobile']) && !empty($_GET['mobile'])){
            $mobile = $_GET['mobile'];
            $result = Yii::app()->db->createCommand()
                ->select('a.id,a.q_id,q.q_title,q.q_answer,q.q_type,a.answer,a.answer_time,a.status')
                ->from('question_answer a')
                ->leftJoin('questionnaire q','q.id = a.q_id')
                ->where("a.mobile=:mobile",array(':mobile'=>$mobile))
                ->order('q_id ASC')
                ->queryAll();
            if(!$result){
                $this->redirect('/question/UserList');
            }
            //解析选择题选项
            foreach($result as $key=>$val){
                $answer_arr = json_decode($val["q_answer"],true);
                $text='';
                foreach($answer_arr as $k=>$v){
                    $text .=$k.'.'.$v.' ';
                }
                //去除最后一个|
                $text = rtrim($text, " ");
                $result[$key]["q_answer"] = $text;
            }
            $this->render('answer_view',array('result'=>$result,'model'=>$model));
        }
    }

    /**
     * 根据题目筛选信息
     */
    public function actionTongjiView(){
        $result = array();
        if(isset($_GET['q_id']) && isset($_GET['q_type'])){
            $q_id = $_GET['q_id'];
            $q_type = $_GET['q_type'];
            //根据q_id 获取选项信息
            $res = Questionnaire::model()->findByPk($q_id);
            $q_answer = json_decode($res->q_answer,true);
            switch($q_type){
                case 1:     //单项选择题
                    //统计选项各被用户选择的次数
                    foreach($q_answer as $key=>$val){
                        $counts =  Yii::app()->db->createCommand()
                            ->select('count(id) as num')
                            ->from('question_answer')
                            ->where(array('and','q_id=:q_id','answer=:key'),array(':q_id'=>$q_id,':key'=>$key))
                            ->queryScalar();
                    $result['count'][$key] = $counts;
                    }
                    //统计有多少用户做了此题调查
                    $num = Yii::app()->db->createCommand()
                        ->select('count(id) as num')
                        ->from('question_answer')
                        ->where('q_id=:q_id',array(':q_id'=>$q_id))
                        ->group('mobile')
                        ->queryAll();
                    $result['q_id'] = $res->id;
                    $result['q_title'] = $res->q_title;
                    $result['q_type'] = $res->q_type;
                    $result['q_answer'] = $q_answer;
                    $result['user'] = count($num);
                    break;
                case 2:     //多项选择题
                    foreach($q_answer as $key=>$val){
                        $counts = Yii::app()->db->createCommand()
                            ->select('count(id) as num')
                            ->from('question_answer')
                            ->where(array('and','q_id=:q_id',array('like','answer','%'.$key.'%')),array(':q_id'=>$q_id))
                            ->queryScalar();
                        $result['count'][$key] = $counts;
                    }
                    //统计有多少用户做了此题调查
                    $num = Yii::app()->db->createCommand()
                        ->select('count(id) as num')
                        ->from('question_answer')
                        ->where('q_id=:q_id',array(':q_id'=>$q_id))
                        ->group('mobile')
                        ->queryAll();
                    $result['q_id'] = $res->id;
                    $result['q_title'] = $res->q_title;
                    $result['q_type'] = $res->q_type;
                    $result['q_answer'] = $q_answer;
                    $result['user'] = count($num);
                    break;
                case 3:
                    $u_answer = Yii::app()->db->createCommand()
                        ->select('id,q_id,answer,mobile')
                        ->from('question_answer')
                        ->where('q_id=:q_id',array(':q_id'=>$q_id))
                        ->group('mobile')
                        ->queryAll();
                    $num = Yii::app()->db->createCommand()
                        ->select('count(id) as num')
                        ->from('question_answer')
                        ->where('q_id=:q_id',array(':q_id'=>$q_id))
                        ->group('mobile')
                        ->queryAll();
                    $result['q_id'] = $res->id;
                    $result['q_title'] = $res->q_title;
                    $result['q_type'] = $res->q_type;
                    $result['u_answer'] = $u_answer;
                    $result['user'] = count($num);
                    break;
                case 4:
                    //统计选项各被用户选择的次数
                    foreach($q_answer as $key=>$val){
                        $counts =  Yii::app()->db->createCommand()
                            ->select('count(id) as num')
                            ->from('question_answer')
                            ->where(array('and','q_id=:q_id','answer=:key'),array(':q_id'=>$q_id,':key'=>$key))
                            ->queryScalar();
                        $result['count'][$key] = $counts;
                    }
                    //统计有多少用户做了此题调查
                    $u_answer = Yii::app()->db->createCommand()
                        ->select('id,q_id,answer,mobile')
                        ->from('question_answer')
                        ->where('q_id=:q_id',array(':q_id'=>$q_id))
                        ->queryAll();
                    $result['q_id'] = $res->id;
                    $result['q_title'] = $res->q_title;
                    $result['q_type'] = $res->q_type;
                    $result['q_answer'] = $q_answer;
                    $result['user'] = count($u_answer);
                    $result['u_answer'] = $u_answer;
                    break;
                default:
                    $result = array();

            }
        }
        $this->render('tongji_view',array('result'=>$result));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Questionnaire the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Questionnaire::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Questionnaire $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='questionnaire-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
