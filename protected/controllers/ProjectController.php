<?php

class ProjectController extends Controller
{
    
    public $_projectClass = null;
    
    public function init()
    {
        parent::init();
        $this->_projectClass = new ProjectClass();
    }

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAdmin()
	{
		
		$model=new ItemInfo;
		if(isset($_GET['ItemInfo']))
		{
			$item_title=$_GET['ItemInfo']['item_title'];
			$guaranteeCompany=$_GET['ItemInfo']['guarantee_id'];
			$guarantee_company=$_GET['ItemInfo']['guarantee_id'];
			if($guarantee_company==!null)
			{
				$data=GuaranteeInfo::model()->findByAttributes(array('name'=>$guarantee_company));
				
				if($data)
				{
					$guarantee_company=$data->id;
				}else {
					$guarantee_company='null';
				}
			}
			
			//如果是借款企业
			$company=$_GET['ItemInfo']['company_id'];
			$company_id=$_GET['ItemInfo']['company_id']; 
			$data=FinancingCompany::model()->findByAttributes(array('name'=>$company_id));
			if($data)
			{
				$company_id=$data->id;
			}
			
			//如果是借款人
			$data=User::model()->findByAttributes(array('user_name'=>$company_id));
			if($data)
			{
				$user_id=$data->id;
				$company_id=FinancingCompany::model()->findByAttributes(array('user_id'=>$user_id));
				$company_id=$company_id->id;
			}
		
			$item_category=$_GET['ItemInfo']['category'];
			$invest_status=$_GET['ItemInfo']['invest_status'];
			$begin_time=$_GET['ItemInfo']['begin_time'];
			$repayment_time=$_GET['ItemInfo']['repayment_time'];
			
			if((preg_match("/[\x7f-\xff]/", $begin_time))){
				$model->addError('begin_time','格式不正确');
				$this->render('_search',array(
						'model'=>$model,
						));
				return false;
			}
			
			if((preg_match("/[\x7f-\xff]/", $repayment_time))){
				$model->addError('repayment_time','格式不正确');
				$this->render('_search',array(
						'model'=>$model,
						));
				return false;
			}
		}
		
		$dataReader = Yii::app()->db->createCommand()
		->select("id")
		->from("item_info")
		->where('status<>:status', array(':status'=> -1))
		->andWhere(array('like','item_title','%'.$item_title.'%'))
		->andWhere(array('like','guarantee_id','%'.$guarantee_company.'%'))
		->andWhere(array('like','company_id','%'.$company_id.'%'))
		->andWhere(array('like','category','%'.$item_category.'%'))
		->andWhere(array('like','invest_status','%'.$invest_status.'%'))
		->andWhere(array('like','begin_time','%'.$begin_time.'%'))
		->andWhere(array('like','repayment_time','%'.$repayment_time.'%'))
		->order('invest_status asc, id desc')
		->query();
		
		$criteria = new CDbCriteria();
		$pages = new CPagination($dataReader->rowCount);
		$pages->pageSize = 10;
		$pages->applyLimit($criteria);
		$projectArrs = Yii::app()->db->createCommand()
		->select("*")
		->from("item_info")
		->where('status<>:status', array(':status'=> -1))
		->andWhere(array('like','item_title','%'.$item_title.'%'))
		->andWhere(array('like','guarantee_id','%'.$guarantee_company.'%'))
		->andWhere(array('like','company_id','%'.$company_id.'%'))
		->andWhere(array('like','category','%'.$item_category.'%'))
		->andWhere(array('like','invest_status','%'.$invest_status.'%'))
		->andWhere(array('like','begin_time','%'.$begin_time.'%'))
		->andWhere(array('like','repayment_time','%'.$repayment_time.'%'))
		->order('id desc')
		->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
		->queryAll();
		
		$companyIds = array();
		foreach($projectArrs as $record){
			$companyIds[] = $record['company_id'];
		}
		
		//获取企业信息
		$FinancingCompany = new FinancingCompany();
		$companyRecords = $FinancingCompany->findAllByAttributes(array('id' => $companyIds), array('index' => 'id'));
		
		
		$model->item_title=$item_title;
		$model->category=$item_category;
		$model->invest_status=$invest_status;
		$model->begin_time=$begin_time;
		$model->repayment_time=$repayment_time;
		$model->guarantee_id=$guaranteeCompany;
		$model->company_id=$company;
		$this->render('admin', array(
				'model' => $model,
				'projectArrs' => $projectArrs,
				'companyRecords' => $companyRecords,
				'pages' => $pages
		));
		
		/*$dataReader = Yii::app()->db->createCommand()
                ->select("id")
                ->from("item_info")
                ->where('status<>:status', array(':status'=> -1))
                ->order('invest_status asc, id desc')
				->query();
		$criteria = new CDbCriteria();
		$pages = new CPagination($dataReader->rowCount);
		$pages->pageSize = 10;
		$pages->applyLimit($criteria);
		$projectArrs = Yii::app()->db->createCommand()
                ->select("*")
                ->from("item_info")
                ->where('status<>:status', array(':status'=> -1))
                ->order('id desc')
				->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
				->queryAll();
		
		$companyIds = array();
		foreach($projectArrs as $record){
		    $companyIds[] = $record['company_id'];
		}
		
        //获取企业信息
		$FinancingCompany = new FinancingCompany();
		$companyRecords = $FinancingCompany->findAllByAttributes(array('id' => $companyIds), array('index' => 'id'));
		
		$model = new ItemInfo();
		$this->render('admin', array( 
			'model' => $model, 
    		'projectArrs' => $projectArrs,
		    'companyRecords' => $companyRecords,
    		'pages' => $pages 
		));
		
		/*$model = new ItemInfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ItemInfo'])) {
			$model->attributes=$_GET['ItemInfo'];
		}
		$this->render('admin',array(
			'model'=>$model,
		));*/
		
	}

	public function actionCreate()
	{	
		
		if(isset($_POST['ItemInfo'])) {
			$ProjectClass = new ProjectClass();
			$id = $ProjectClass->create($_POST['ItemInfo']);
			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('update', array('id' => $id));
				$response['message'] = '创建项目成功!';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建项目失败！';
			}

			echo json_encode($response);
			exit();

		} else {
			$model = new ItemInfo();
			if(!$_GET)
			{
				$model->category='invest';
			}else{
				$model->category=$_GET['type'];
			}
			$model->reward_apr = '0';
			$model->begin_time = date('Y-m-d');
			$GuaranteeInfo = new GuaranteeInfo();
	        $guaranteeModels = $GuaranteeInfo->findAll();	
			$this->render('create', array(
							'model' => $model, 
                            'guaranteeModels' => $guaranteeModels,
			            ));
		}
	}
	
	/**
	 * 车贷
	 */
	public function actionCreateChedai()
	{	
		if(isset($_POST['ItemInfo'])) {
			$ProjectClass = new ProjectClass();
			$id = $ProjectClass->create($_POST['ItemInfo']);
			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('chedaiUpdate', array('id' => $id));
				$response['message'] = '创建项目成功!';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建项目失败！';
			}

			echo json_encode($response);
			exit();

		} else {
			$model = new ItemInfo();
			$model->pay_type='2';
			$model->investment=10;
			if(!$_GET)
			{
				$model->category='invest';
			}else{
				$model->category=$_GET['type'];
			}
			$model->reward_apr = '0';
			$model->begin_time = date('Y-m-d');
			$GuaranteeInfo = new GuaranteeInfo();
	        $guaranteeModels = $GuaranteeInfo->findAll();

	        $FinancingCompany = new FinancingCompany();
	        $companyModel = $FinancingCompany->findAll();
	        
			$this->render('_chedaiForm', array(
							'model' => $model, 
                            'companyModel' => $companyModel,
							'guaranteeModels' => $guaranteeModels,
			            ));
		}
	}

	/**
	 * 车贷
	 */
	public function actionCreateFangdai()
	{	
		if(isset($_POST['ItemInfo'])) {
			$ProjectClass = new ProjectClass();
			$id = $ProjectClass->create($_POST['ItemInfo']);
			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('chedaiUpdate', array('id' => $id));
				$response['message'] = '创建项目成功!';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建项目失败！';
			}

			echo json_encode($response);
			exit();

		} else {
			$model = new ItemInfo();
			$model->pay_type = '1';
			$model->investment = 100;
			$model->category='fangdai';
			$model->reward_apr = '0';
			$model->begin_time = date('Y-m-d');
			$GuaranteeInfo = new GuaranteeInfo();
	        $guaranteeModels = $GuaranteeInfo->findAll();

	        $FinancingCompany = new FinancingCompany();
	        $companyModel = $FinancingCompany->findAll();
	        
			$this->render('createFangdai', array(
							'model' => $model, 
                            'companyModel' => $companyModel,
							'guaranteeModels' => $guaranteeModels,
			            ));
		}
	}
	
	
	public function updateInfo()
	{
		$ProjectClass = new ProjectClass();
		$id = intval($_GET['id']);
		if(isset($_POST['ItemInfo'])) {
			$result = $ProjectClass->updateInfo($id, $_POST['ItemInfo']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息成功！';
				$response['url'] = $this->createUrl('update', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息失败！';
			}
			echo json_encode($response);
			exit();
			
		} else {
			$model = $ProjectClass->getInfoById($id);
			
			// 获取企业信息
			$FinancingCompany = new FinancingCompany();
			$companyModel = $FinancingCompany->findByPk($model->company_id);
			
			// 获取担保机构信息
			$GuaranteeInfo = new GuaranteeInfo();
			$guaranteeModel = $GuaranteeInfo->findByPk($model->guarantee_id);
			
			$GuaranteeInfo = new GuaranteeInfo();
	        $guaranteeModels = $GuaranteeInfo->findAll();
	        
	        //借款人
	        $user=new User();
	        $borrower_user = $user->findByPk($model->borrower_user_id);
	        
			$this->render('update', array( 
				'model' => $model,
			    'companyModel' => $companyModel,
			    'guaranteeModels' => $guaranteeModels,
				'borrower_user' => $borrower_user,
			));
		}
	}
	
	/**
	 * 车贷信息
	 */
	public function chedaiUpdateInfo()
	{
		$ProjectClass = new ProjectClass();
		$id = intval($_GET['id']);
		if(isset($_POST['ItemInfo'])) {
			$result = $ProjectClass->updateInfo($id, $_POST['ItemInfo']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息成功！';
				$response['url'] = $this->createUrl('chedaiUpdate', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息失败！';
			}
			echo json_encode($response);
			exit();
				
		} else {
			$model = $ProjectClass->getInfoById($id);
			// 获取企业信息
			$FinancingCompany = new FinancingCompany();
			$evaluation_companys= $FinancingCompany->findAll();
			 
			$companyModel = $FinancingCompany->findByPk($model->company_id);
			//$evaluation_company = $FinancingCompany->findByPk($model->evaluation_company_id);
			// 获取担保机构信息
			
			$GuaranteeInfo = new GuaranteeInfo();
			$guaranteeModel = $GuaranteeInfo->findByPk($model->guarantee_id);
			
			$GuaranteeInfo = new GuaranteeInfo();
			$guaranteeModels = $GuaranteeInfo->findAll();
			//借款人
			$user=new User();
			$user_name=$user->findByPk($model->borrower_user_id);
			$this->render('chedaiUpdate', array(
					'model' => $model,
					'companyModel' => $companyModel,
					'guaranteeModels' => $guaranteeModels,
					'evaluation_companys'=>$evaluation_companys,
					'user_name'=>$user_name,
					'guaranteeModel'=>$guaranteeModel,
			));
		}
	}
	
	/**
	 * 车贷信息
	 */
	public function fangdaiUpdateInfo()
	{
	    $ProjectClass = new ProjectClass();
	    $id = intval($_GET['id']);
	    if(isset($_POST['ItemInfo'])) {
	        $result = $ProjectClass->updateInfo($id, $_POST['ItemInfo']);
	        if($result == true) {
	            $response['status'] = true;
	            $response['code'] = $ProjectClass->errorCode;
	            $response['error'] = $ProjectClass->error;
	            $response['message'] = '更新项目信息成功！';
	            $response['url'] = $this->createUrl('updateFangdai', array('id' => $id));
	        } else {
	            $response['status'] = false;
	            $response['code'] = $ProjectClass->errorCode;
	            $response['error'] = $ProjectClass->error;
	            $response['message'] = '更新项目信息失败！';
	        }
	        echo json_encode($response);
	        exit();
	
	    } else {
	        $model = $ProjectClass->getInfoById($id);
	        // 获取企业信息
	        $FinancingCompany = new FinancingCompany();
	        $companyModel= $FinancingCompany->findAll();
			
	        // 获取担保机构信息
	        $GuaranteeInfo = new GuaranteeInfo();
	        $guaranteeModel = $GuaranteeInfo->findByPk($model->guarantee_id);
	        
	        $GuaranteeInfo = new GuaranteeInfo();
	        $guaranteeModels = $GuaranteeInfo->findAll();
	        //借款人
	        $user=new User();
	        $borrower_user = $user->findByPk($model->borrower_user_id);
	        $this->render('updateFangdai', array(
                    'model' => $model,
					'companyModel' => $companyModel,
					'guaranteeModels' => $guaranteeModels,
                    'evaluation_companys' => $evaluation_companys,
                    'borrower_user' => $borrower_user,
                    'guaranteeModel'=>$guaranteeModel,
				));
			}
		}

	public function updateDetail()
	{
		$ProjectClass = new ProjectClass();
		
		$id = intval($_GET['id']);
		
		if(isset($_POST['ItemDetails'])) {
			$result = $ProjectClass->updateDetail($id, $_POST['ItemDetails']);
			
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息成功！';
				$response['url'] = $this->createUrl('update', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息失败！';
			}
			echo json_encode($response);
			exit();
		} else {
			$model = $ProjectClass->getDetailById($id);
			if(empty($model)) {
			    $model = $ProjectClass->getDetailModel();
			}
			$this->render('update', array( 'model' => $model ));
		}
	}

    /**
     * 更新项目审核信息
     * @param int $pid 项目ID
     */
    public function updateVerify($pid){
        $che_dai = new Verify();
        $item_info = new ItemInfo();
        $item_where = new CDbCriteria();
        $item_where->select = 'category';
        $result = $item_info->findByPk($pid,$item_where);
        $category = $result->attributes['category'];

        $configs = $che_dai->getConfig();
        $criteria = new CDbCriteria();
        $criteria->compare('pid',$pid);
        $criteria->addInCondition('type',array_keys($configs['item_category_verify_type'][$category]));
        $result= array_map(function($record) {
            return $record->attributes;
        }, ItemVerifyLog::model()->findAll($criteria));

        //重构数据
        $results = array();
        $data = array();
        if(!empty($result)){
            foreach($result as $k=>$v){
                $results[$v['type']] = $v;
            }
        }
        foreach($configs['item_category_verify_type'][$category] as $k=>$v){
            //如果用户没有任何审核数据，直接跳出循环
            if(empty($results)){
                $data[$k]['pid'] = $pid;
                $data[$k]['type_name'] = $v;
                $data[$k]['type'] = $k;
                $data[$k]['status'] = 0;
                $data[$k]['verify_time'] = '0000-00-00 00:00:00';
                continue;
            }

            //检索用户的审核信息，没有的类型，则填充为未审核状态
            if(isset($results[$k])){
                $data[$k]['pid'] = $results[$k]['pid'];
                $data[$k]['type_name'] = $v;
                $data[$k]['type'] = $results[$k]['type'];
                $data[$k]['status'] = $results[$k]['status'];
                $data[$k]['verify_time'] = $results[$k]['verify_time'];
            }else{
                $data[$k]['pid'] = $pid;
                $data[$k]['type_name'] = $v;
                $data[$k]['type'] = $k;
                $data[$k]['status'] = 0;
                $data[$k]['verify_time'] = '0000-00-00 00:00:00';
            }
        }
        
        $data = array_values($data);
        if($category == 'chedai') {
            $this->render('chedaiUpdate',array('data'=>$data));
        } elseif($category == 'fangdai') {
            $this->render('updateFangdai',array('data'=>$data));
        } else{
            $this->render('update',array('data'=>$data));
        }
    }

    /**
     * 设置审核状态
     */
    public function actionSetVerifyInfo(){
        if(isset($_POST['pid']) && !empty($_POST['pid']) && isset($_POST['type']) && !empty($_POST['type'])){
            $pid = (int)$_POST['pid'];
            $type = $_POST['type'];

            //查询当前项目和信息类型是否存在，存在则不进行更新。
            $criteria = new CDbCriteria();
            $criteria->compare('pid',$pid);
            $criteria->compare('type',$type);

            $count = ItemVerifyLog::model()->find($criteria);
            if(!empty($count)){
                exit(json_encode(array('status'=>0,'msg'=>'非法请求','data'=>'')));
            }
            $item_verify_log = new ItemVerifyLog();
            $item_verify_log->pid = $pid;
            $item_verify_log->type = $type;
            $item_verify_log->status = 1;
            $item_verify_log->verify_time = date('Y-m-d H:i:s',time());

            $result = $item_verify_log->insert();
            if($result > 0){
                exit(json_encode(array('status'=>1,'msg'=>'','data'=>'')));
            }else{
                exit(json_encode(array('status'=>0,'msg'=>'请求失败','data'=>'')));
            }
        }else{
            exit(json_encode(array('status'=>0,'msg'=>'请求失败','data'=>'')));
        }
    }

	
	/**
	 * 车贷修改详细
	 */
	public function chedaiUpdateDetail()
	{
		$ProjectClass = new ProjectClass();
	
		$id = intval($_GET['id']);
	
		if(isset($_POST['ItemDetails'])) {
			$result = $ProjectClass->updateDetail($id, $_POST['ItemDetails']);
				
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息成功！';
				$response['url'] = $this->createUrl('chedaiUpdate', array('id' => $id,'type'=>'detail'));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目信息失败！';
			}
			echo json_encode($response);
			exit();
		} else {
			$model = $ProjectClass->getDetailById($id);
			if(empty($model)) {
				$model = $ProjectClass->getDetailModel();
			}
			$this->render('chedaiUpdate', array( 'model' => $model ));
		}
	}
	
	/**
	 * 房贷修改详细
	 */
	public function fangdaiUpdateDetail()
	{
	    $ProjectClass = new ProjectClass();
	
	    $id = intval($_GET['id']);
	
	    if(isset($_POST['ItemDetails'])) {
	        $result = $ProjectClass->updateDetail($id, $_POST['ItemDetails']);
	
	        if($result == true) {
	            $response['status'] = true;
	            $response['code'] = $ProjectClass->errorCode;
	            $response['error'] = $ProjectClass->error;
	            $response['message'] = '更新项目信息成功！';
	            $response['url'] = $this->createUrl('updateFangdai', array('id' => $id,'type'=>'detail'));
	        } else {
	            $response['status'] = false;
	            $response['code'] = $ProjectClass->errorCode;
	            $response['error'] = $ProjectClass->error;
	            $response['message'] = '更新项目信息失败！';
	        }
	        echo json_encode($response);
	        exit();
	    } else {
	        $model = $ProjectClass->getDetailById($id);
	        if(empty($model)) {
	            $model = $ProjectClass->getDetailModel();
	        }
	        $this->render('updateFangdai', array( 'model' => $model ));
	    }
	}
	
	/**
	 * 更新项目信息
	 *
	 */
	public function actionUpdate()
	{
		if( isset($_GET['type']) && $_GET['type'] == 'detail') {
			$this->updateDetail();
		} else if(isset($_GET['type']) && $_GET['type'] == 'verify' && isset($_GET['id'])){
            $this->updateVerify($_GET['id']);
        } else{
			$this->updateInfo();
		}
	}
	
	/**
	 * 更新车贷项目信息
	 */
	public function actionChedaiUpdate()
	{
		if( isset($_GET['type']) && $_GET['type'] == 'detail') {
			$this->chedaiUpdateDetail();
		}elseif(isset($_GET['type']) && $_GET['type'] == 'verify' && isset($_GET['id'])){
            $this->updateVerify($_GET['id']);
        }elseif( isset($_GET['type']) && $_GET['type'] == 'car') {
			$this->chedaiUpdateCar();
		}else{
			$this->chedaiUpdateInfo();
		}
	}
	
	/**
	 * 更新车贷项目信息
	 */
	public function actionUpdateFangdai()
	{
	    if(!isset($_GET['id']) || empty($_GET['id'])) {
	        $this->redirectMessage('项目不存在', 'info', 3, $this->createUrl('admin'));
	    }
	    if($_GET['type'] == 'detail') {
	        $this->fangdaiUpdateDetail();
	    }elseif($_GET['type'] == 'verify'){
	        $this->updateVerify($_GET['id']);
	    }elseif( isset($_GET['type']) && $_GET['type'] == 'house') {
	        $this->fangdaiUpdateHouse();
	    }else{
	        $this->fangdaiUpdateInfo();
	    }
	}
		
	/*修改推荐状态*/
	public function actionRecommend()
	{
		if($_POST['isrecommend']!=''){
 			$id =$_POST['id'];
 			$_POST['isrecommend']==1?$changVal=0:$changVal=1;
 			$post=ItemInfo::model()->findByPk($id);
 			$post->isrecommend =$changVal;
				if($post->save()){
 					echo $changVal;
				}
			}
		}
	
	/*
	 * 查看项目信息
	 * 
	 */
	public function actionView()
	{
		$id = intval($_GET['id']);
		
		// 获取项目基本信息
		$infoRecord = $this->_projectClass->getInfoById($id);
		
		if(empty($infoRecord)) {
			$this->redirectMessage('您查看的项目不存在!', 'info', 3, $this->createUrl('admin'));
		}
		
		$viewMethod = 'view'.ucfirst($infoRecord['category']);
		if(method_exists($this, $viewMethod) == false) {
		    $viewMethod = 'viewInvest';
		}
		
		$this->$viewMethod($id, $infoRecord);
	}
	
	public function viewInvest($id, $infoRecord)
	{
	    // 获取项目详情信息
	    $detailRecord = $this->_projectClass->getDetailById($id);
	    
	    // 获取企业信息
	    $FinancingCompany = new FinancingCompany();
	    $companyModel = $FinancingCompany->findByPk($infoRecord->company_id);
	    
	    // 获取担保机构信息
	    $GuaranteeInfo = new GuaranteeInfo();
	    $guaranteeModel = $GuaranteeInfo->findByPk($infoRecord->guarantee_id);
	    
	    // 获取冻结资金
	    $CorpFreezeLog = new CorpFreezeLog();
	    $freezeData = $CorpFreezeLog->findByAttributes(array('item_id' => $id, 'status' => 1, 'is_guar' => 0, 'is_unfreeze' => '0'));
	    
	    //实际投资额
	    $sql="select sum(money) as num from user_invest where status=1 and debt_status=0 and type=1 and item_id='$id'";
	    $actuallyInvest=Yii::app()->db->createCommand($sql)->queryScalar();
	    
	    $user =new User();
	    $user_name=$user->findByPk($infoRecord->borrower_user_id);
	    $this->render('view', array(
	        'infoRecord' => $infoRecord,
	        'detailRecord' => $detailRecord,
	        'companyModel' => $companyModel,
	        'guaranteeModel' => $guaranteeModel,
	        'freezeData' => $freezeData,
	        'user_name'=>$user_name,
	    	'actuallyInvest'=>$actuallyInvest,
	    ));
	}
	
	public function viewFangdai($id, $infoRecord)
	{
	    // 获取项目详情信息
	    $detailRecord = $this->_projectClass->getDetailById($id);
	    
	    // 获取回购机构信息
	    $FinancingCompany = new FinancingCompany();
	    $companyModel = $FinancingCompany->findByPk($infoRecord->evaluation_company_id);
	    
	    // 获取评价机构信息
	    $GuaranteeInfo = new GuaranteeInfo();
	    $guaranteeModel = $GuaranteeInfo->findByPk($infoRecord-> guarantee_id);
	    
	    // 获取冻结资金
	    $CorpFreezeLog = new CorpFreezeLog();
	    $freezeData = $CorpFreezeLog->findByAttributes(array('item_id' => $id, 'status' => 1, 'is_guar' => 0, 'is_unfreeze' => '0'));
	    
	    //实际投资额
	    $sql="select sum(money) as num from user_invest where status=1 and debt_status=0 and type=1 and item_id='$id'";
	    $actuallyInvest=Yii::app()->db->createCommand($sql)->queryScalar();
	    
	    //获取用户名
	    $user = new User();
	    $user_name = $user->findByPk($infoRecord->borrower_user_id);
	     
	    // 获取房产信息
	    $ItemFangdaiHouse = new ItemFangdaiHouse();
	    $houseInfo = $ItemFangdaiHouse->findByAttributes(array('pid' => $id));
	     
	    $this->render('view_fangdai', array(
	        'infoRecord' => $infoRecord,
	        'detailRecord' => $detailRecord,
	        'companyModel' => $companyModel,
	        'guaranteeModel' => $guaranteeModel,
	        'freezeData' => $freezeData,
	        'user_name'=>$user_name,
	        'houseInfo' => $houseInfo ? $houseInfo : $ItemFangdaiHouse,
	    	'actuallyInvest'=>$actuallyInvest,
	    ));
	}
	
	public function viewChedai($id, $infoRecord)
	{
	    // 获取项目详情信息
	    $detailRecord = $this->_projectClass->getDetailById($id);
	    
	    // 获取回购机构信息
	    $FinancingCompany = new FinancingCompany();
	    $companyModel = $FinancingCompany->findByPk($infoRecord->evaluation_company_id);
	    
	    // 获取评价机构信息
	    $GuaranteeInfo = new GuaranteeInfo();
	    $guaranteeModel = $GuaranteeInfo->findByPk($infoRecord-> guarantee_id);
	    
	    // 获取冻结资金
	    $CorpFreezeLog = new CorpFreezeLog();
	    $freezeData = $CorpFreezeLog->findByAttributes(array('item_id' => $id, 'status' => 1, 'is_guar' => 0, 'is_unfreeze' => '0'));
	    
	    //实际投资额
	    $sql="select sum(money) as num from user_invest where status=1 and debt_status=0 and type=1 and item_id='$id'";
	    $actuallyInvest=Yii::app()->db->createCommand($sql)->queryScalar();
	    
	    //获取用户名
	    $user=new User();
	    $user_name=$user->findByPk($infoRecord->borrower_user_id);
	    
	    // 获取企业信息
	    $ItemChedaiCar = new ItemChedaiCar();
	    $carInfo = $ItemChedaiCar->findByAttributes(array('item_id' => $id));
	   
	    $this->render('chedaiView', array(
	        'infoRecord' => $infoRecord,
	        'detailRecord' => $detailRecord,
	        'companyModel' => $companyModel,
	        'guaranteeModel' => $guaranteeModel,
	        'freezeData' => $freezeData,
	        'user_name'=>$user_name,
	        'carInfo' => $carInfo ? $carInfo : $ItemChedaiCar,
	    	'actuallyInvest'=>$actuallyInvest,
	    ));
	}
	
	/**
	 * 车贷项目详细
	 */
	public function actionChedaiView()
	{
		$ProjectClass = new ProjectClass();
	
		$id = intval($_GET['id']);
	
		// 获取项目基本信息
		$infoRecord = $ProjectClass->getInfoById($id);
	
		if(empty($infoRecord)) {
			$this->redirectMessage('您查看的项目不存在!', 'info', 3, $this->createUrl('admin'));
		}
	
		// 获取项目详情信息
		$detailRecord = $ProjectClass->getDetailById($id);
	
		// 获取回购机构信息
		$FinancingCompany = new FinancingCompany();
		$companyModel = $FinancingCompany->findByPk($infoRecord->evaluation_company_id);
	
		// 获取评价机构信息
		$GuaranteeInfo = new GuaranteeInfo();
		$guaranteeModel = $GuaranteeInfo->findByPk($infoRecord-> guarantee_id);
	
		// 获取冻结资金
		$CorpFreezeLog = new CorpFreezeLog();
		$freezeData = $CorpFreezeLog->findByAttributes(array('item_id' => $id, 'status' => 1, 'is_guar' => 0, 'is_unfreeze' => '0'));
		
		//实际投资额
		$sql="select sum(money) as num from user_invest where status=1 and debt_status=0 and type=1 and item_id='$id'";
		$actuallyInvest=Yii::app()->db->createCommand($sql)->queryScalar();
		
		//获取用户名
		$user=new User();
		$user_name=$user->findByPk($infoRecord->borrower_user_id);
		
		// 获取企业信息
		$ItemChedaiCar = new ItemChedaiCar();
		$carInfo = $ItemChedaiCar->findByAttributes(array('item_id' => $id));
		
		$this->render('chedaiView', array(
				'infoRecord' => $infoRecord,
				'detailRecord' => $detailRecord,
				'companyModel' => $companyModel,
				'guaranteeModel' => $guaranteeModel,
				'freezeData' => $freezeData,
				'user_name'=>$user_name,
                'carInfo' => $carInfo ? $carInfo : $ItemChedaiCar,
				'actuallyInvest'=>$actuallyInvest,
		));
	}
	
	/**
	 * 审核项目
	 *
	 */
	public function actionVerify($id)
	{
	    $response = array();
	    $ProjectClass = new ProjectClass();
	    
	    $id = intval($id);
	    $status = intval($_POST['status']);
		
		// 获取项目基本信息
		$res = $ProjectClass->verify($id, $status);
		
		if($res) {
			$response['status'] = true;
			$response['code'] = '0000';
			$response['info'] = '操作成功!';
		} else {
			$response['status'] = false;
			$response['code'] = $ProjectClass->errorCode;
			$response['error'] = $ProjectClass->error;
			$response['info'] = '操作失败!';
		}
		
		echo json_encode($response);
		exit();
	}

    /**
     * 上传项目资料图片
     */
    public function actionSetAttachments(){
        if(isset($_GET['ajax']) && $_GET['ajax'] == 'edit'){
            $id = $_GET['id'];
            $criteria = new CDbCriteria();
            $criteria->compare('status',0);
            $re_img = ItemAttachments::model()->findByPk($id,$criteria)->attributes;
        }else{
            $pid = $_GET['pid'];
            $verify_type = $_GET['verify_type'];
        }

        $uploadPath = '/data/item/img/';
        $saveDir = date('Ym').'/'.date('d').'/';

        $UploadClass = new UploadClass();
        $UploadClass->setUploadPath(APP_DIR .$uploadPath);
        $res = $UploadClass->uploadImage($_FILES['imgFile'], $saveDir);
        $response = array();
        if($res != false) {
            $imgUrl = $uploadPath.$saveDir.$res['file_name'];
            //更新数据库
            if($_GET['ajax'] == 'edit'){
                @unlink(Yii::getPathOfAlias('webroot').$re_img['url']);
                $count = ItemAttachments::model()->updateByPk($_GET['id'],array('url'=>$imgUrl));
                if($count > 0){
                    $response['error'] = 0;
                    $response['url'] = $imgUrl;
                }else{
                    $response['error'] = 1;
                    $response['message'] = "更新数据失败";
                }
            }else{
                $attach = new ItemAttachments();
                $attach->type = $verify_type;
                $attach->pid = $pid;
                $attach->display_order = 0;
                $attach->url = $imgUrl;
                $attach->add_time = date('Y-m-d H:i:s',time());
                $result = $attach->save();
                $last_id = $attach->getPrimaryKey();
                $response['error'] = 0;
                $response['url'] = $imgUrl;
                $response['data'] = $last_id;
            }
        } else {
            $response['error'] = 1;
            $response['message'] = $_FILES['imgFile']['name'][0].'上传失败！'.$UploadClass->error;
        }

        $this->echoJson($response);
    }

    /**
     * 更新项目文件信息
     */
    public function actionSetAttach(){
        $name = $_POST['name'];
        $sort = (int)$_POST['sort'];
        $id = $_POST['id'];

        if(!empty($id) && $sort !== '' && !empty($name)){
            $data['name'] = $name;
            $data['display_order'] = $sort;
            $count = ItemAttachments::model()->updateByPk($id,$data);
            if($count > 0){
                $this->echoJson(array('status'=>1,'msg'=>'','data'=>''));
            }
            $this->echoJson(array('status'=>0,'msg'=>'如果信息没有修改，不需要操作提交','data'=>''));
        }else{
            $this->echoJson(array('status'=>0,'msg'=>'请填写表单信息','data'=>''));
        }
    }

    /**
     * 获取项目审核文件信息
     */
    public function actionGetAttachments(){
        $pid = $_POST['pid'];
        $type = $_POST['type'];
        $criteria = new CDbCriteria();
        $criteria->compare('pid',$pid);
        $criteria->compare('type',$type);
        $criteria->compare('status',0);
        $result= array_map(function($record) {
            return $record->attributes;
        }, ItemAttachments::model()->findAll($criteria));
        if(empty($result)){
            $this->echoJson(array('status'=>0,'msg'=>'此审核类型暂时没有图片文件','data'=>''));
        }
        $this->echoJson(array('status'=>1,'msg'=>'','data'=>$result));
    }

    /**
     * 获取某个审核文件信息
     */
    public function actionGetAttachImg(){
        $id = $_POST['id'];
        $criteria = new CDbCriteria();
        $criteria->compare('status',0);
        $result = ItemAttachments::model()->findByPk($id,$criteria)->attributes;
        if(empty($result)){
            $this->echoJson(array('status'=>0,'msg'=>'','data'=>''));
        }
        $this->echoJson(array('status'=>1,'msg'=>'','data'=>$result));
    }

    /**
     * 删除某个审核文件（物理删除）
     */
    public function actionDelAttach(){
        $id = (int)$_POST['id'];
        $criteria = new CDbCriteria();
        $criteria->compare('status',0);
        $result = ItemAttachments::model()->findByPk($id,$criteria)->attributes;
        if(empty($result)){
            $this->echoJson(array('status'=>0,'msg'=>'非法操作，删除数据不存在','data'=>''));
        }
        $data = ItemAttachments::model()->deleteByPk($id,$criteria);
        if(!$data){
            $this->echoJson(array('status'=>0,'msg'=>'删除失败','data'=>''));
        }
        @unlink(Yii::getPathOfAlias('webroot').$result['url']);
        $this->echoJson(array('status'=>1,'msg'=>'删除成功','data'=>''));
    }

	
	/**
	 * 开放项目
	 *
	 */
	public function actionOpen($id)
	{
	    $response = array();
	    $response['status'] = false;
	    $ProjectClass = new ProjectClass();    
	    $id = intval($id);   
	    if(Yii::app()->request->isPostRequest && $_POST['ItemInfo']) {
	        $res = $ProjectClass->updateInvestStatus($id, $_POST['ItemInfo']);
	        if($res == true) {
	            $response['status'] = true;
	            $response['code'] = '0000';
	            $response['info'] = '操作成功！';
	        } else {
	            $response['status'] = false;
	            $response['code'] = $ProjectClass->errorCode;
	            $response['info'] = '操作失败！';
	            $response['error'] = $ProjectClass->error;
	        }
	    }
		
		$this->echoJson($response);
	}

	//项目预告
	public function actionNoticelist()
	{
		$count = Yii::app()->db->createCommand()
				->select("count(*) as num")
				->from("cms_notice_invest")
				->queryRow();
		if ($count)
			$rowCount = $count['num'];
		else 
			$rowCount = 0;
		$criteria = new CDbCriteria();
		$pages = new CPagination($rowCount);
		$pages->pageSize = 10;
		$pages->applyLimit($criteria);
		$projectArrs = Yii::app()->db->createCommand()
                ->select("*")
                ->from("cms_notice_invest")
                ->order('id desc')
				->limit($pages->pageSize, $pages->currentPage*$pages->pageSize)
				->queryAll();
		$model = new CmsNoticeInvest();
		$this->render('noticelist', array( 
			'model' => $model, 
    		'projectArrs' => $projectArrs,
    		'pages' => $pages 
		));

	}

	// 查看项目预告信息
	public function actionNoticeView()
	{
		$ProjectClass = new ProjectClass();
		$id = intval($_GET['id']);
		//获取项目预告基本信息
		$notice = $ProjectClass->getNoticeById($id);
		if(empty($notice)) {
			$this->redirectMessage('您查看的项目不存在!', 'info', 3, $this->createUrl('noticelist'));
		}
		$this->render('noticeview', array( 
			'model' => $notice,
		));
	}
	//编辑项目预告
	public function actionNoticeUpdate()
	{
		$ProjectClass = new ProjectClass();
		$id = intval($_GET['id']);
		if(isset($_POST['CmsNoticeInvest'])) {
			$_POST['CmsNoticeInvest']['finance_time'] = strtotime($_POST['CmsNoticeInvest']['finance_time']);
			$result = $ProjectClass->noticeupdateInfo($id, $_POST['CmsNoticeInvest']);
			if($result == true) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目预告信息成功！';
				$response['url'] = $this->createUrl('noticeupdate', array('id' => $id));
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '更新项目预告信息失败！';
			}
			echo json_encode($response);
			exit();
			
		} else {
			$model = $ProjectClass->getNoticeById($id);
			$model['finance_time'] = date("Y-m-d H:i:s",$model['finance_time']);
			$this->render('noticeupdate', array( 
				'model' => $model,
			));
		}
	}

	//编辑项目预告
	public function actionNoticeCreate()
	{
		if(isset($_POST['CmsNoticeInvest'])) {
			$ProjectClass = new ProjectClass();
			$id = $ProjectClass->noticeCreate($_POST['CmsNoticeInvest']);

			if($id > 0) {
				$response['status'] = true;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['url'] = $this->createUrl('noticeupdate', array('id' => $id));
				$response['message'] = '创建项目预告成功！';
			} else {
				$response['status'] = false;
				$response['code'] = $ProjectClass->errorCode;
				$response['error'] = $ProjectClass->error;
				$response['message'] = '创建项目预告失败！';
			}

			echo json_encode($response);
			exit();

		} else {
			$model = new CmsNoticeInvest();
			$this->render('noticecreate', array(
							'model' => $model, 
			            ));
		}
	}	
	
	/**
	 * 车贷信息
	 */
	public function chedaiUpdateCar()
	{
	    $pid = intval($_GET['id']);
	    
	    $ItemChedaiCarModel = new ItemChedaiCar();
	    
	    $model = $ItemChedaiCarModel->findByAttributes(array('item_id'=>$pid));
	    
	    if(isset($_POST['ItemChedaiCar'])) {
	        if($model) {
	            $model->attributes=$_POST['ItemChedaiCar'];
	            $saveRes = $model->save();
	        } else {
	            $ItemChedaiCarModel->attributes=$_POST['ItemChedaiCar'];
	            $saveRes = $ItemChedaiCarModel->save();
	        }
	        if($saveRes) {
	            $response['status'] = true;
	            $response['message'] = '更新车辆信息成功！';
	            $response['url'] = $this->createUrl('chedaiUpdate', array('id' => $pid, 'type'=>'car'));
	        } else {
	            $response['status'] = false;
	            $response['message'] = '更新车辆信息失败！';
	        }
	        $this->echoJson($response);
	    } else {
    		$this->render('chedaiUpdate',array(
    			'model'=>$model ? $model : $ItemChedaiCarModel,
    		));
	    }
	}
	
	/**
	 * 车贷信息
	 */
	public function fangdaiUpdateHouse()
	{
	    $pid = intval($_GET['id']);
	     
	    $ItemFangdaiHouseModel = new ItemFangdaiHouse();
	     
	    $model = $ItemFangdaiHouseModel->findByAttributes(array('pid'=>$pid));
	     
	    if(isset($_POST['ItemFangdaiHouse'])) {
	        if($model) {
	            $model->attributes = $_POST['ItemFangdaiHouse'];
	            $saveRes = $model->save();
	        } else {
	            $ItemFangdaiHouseModel->attributes=$_POST['ItemFangdaiHouse'];
	            $saveRes = $ItemFangdaiHouseModel->save();
	        }
	        if($saveRes) {
	            $response['status'] = true;
	            $response['message'] = '更新房产信息成功！';
	            $response['url'] = $this->createUrl('updateFangdai', array('id' => $pid, 'type'=>'house'));
	        } else {
	            $response['status'] = false;
	            $response['message'] = '更新房产信息失败！';
	        }
	        $this->echoJson($response);
	    } else {
	        $this->render('updateFangdai',array(
	            'model'=>$model ? $model : $ItemFangdaiHouseModel,
	        ));
	    }
	}
}
