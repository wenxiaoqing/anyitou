<?php
header("Content-type:text/html;charset=utf-8");
class UserChannelController extends Controller
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    $model = $this->loadModel($id);
	   $UserChannelReg=new UserChannelReg();
	   $UserChannelReg->type=$model->keyword;
		$this->render('view',array(
			'model' =>$model,
			'UserChannelReg'=>$UserChannelReg,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful,the browser will be redirected to the 'view' page.
	 */
	
	public function actionCreate()
	{
		$model = new UserChannel('create');
		$this->performAjaxValidation($model);
		if(isset($_POST['UserChannel']))
		{
			$channel_key=$_POST['UserChannel']['channel_key'];
			$type_id=$_POST['UserChannel']['type_id'];
				
			if(preg_match("/[\x7f-\xff]/", $type_id))
			{
				$model->addError('type_id','渠道不能为中文!');
				$this->render('create',array(
						'model'=>$model,
				));
				return false;
			}
			if(preg_match("/[\x7f-\xff]/",$channel_key))
			{
				$model->addError('channel_key','渠道键不能为中文!');
				$this->render('create',array(
						'model'=>$model,
				));
				return false;
			}
				
			$channel_key_exists=UserChannel::model()->findByAttributes(array('channel_key'=>$channel_key));
			if($channel_key_exists)
			{
				$model->addError('channel_key','channel_key不能重复!');
				$this->render('create',array(
					'model'=>$model,	
				));
				return false;
			}
				
			$data=UserChannelType::model()->findByAttributes(array('name'=>$type_id));
			if(!$data)
			{
				$model->addError('type_id','不存在此渠道!');
				$this->render('create',array(
						'model'=>$model,
				));
				return false;
			}
				
			if(!empty($channel_key))
			{
				$model->type_id=$data->id;
				$model->plan=$_POST['UserChannel']['plan'];
				$model->group=$_POST['UserChannel']['group'];
				$model->title=$_POST['UserChannel']['title'];
				$model->channel_key=$_POST['UserChannel']['channel_key'];
				if($model->save())
				{
					$this->redirect(array('view','id'=>$model->id));
				}
			}else{
				$model->type_id=$data->id;
				$model->plan=$_POST['UserChannel']['plan'];
				$model->group=$_POST['UserChannel']['group'];
				$model->title=$_POST['UserChannel']['title'];
				if($model->save())
				{
					$insertId=Yii::app()->db->getLastInsertID();
					$channel_key=$type_id.'_'.$insertId;
					$model=$this->loadModel($insertId);
					$model->channel_key=$channel_key;
					if($model->save())
					{
						$this->redirect(array('view','id'=>$model->id));
					}
				}
			}
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
		$type_id=$model->type_id;
		$data=UserChannelType::model()->findByPk($type_id);
		$model->type_id=$data->name;
		
		if(isset($_POST['UserChannel']))
		{
			$type_id=$_POST['UserChannel']['type_id'];
			if(preg_match("/[\x7f-\xff]/", $type_id))
			{
				$model->addError('type_id','帐户名不能为中文!');
				$this->render('update',array(
						'model'=>$model,
				));
				return false;
			}
		
			$data=UserChannelType::model()->findByAttributes(array('name'=>$type_id));
			if(!$data)
			{
				$model->addError('type_id','不存在此渠道!');
				$this->render('update',array(
						'model'=>$model,
				));
				return false;
			}
		
			$model->type_id=$data->id;;
			$model->plan=$_POST['UserChannel']['plan'];
			$model->group=$_POST['UserChannel']['group'];
			$model->title=$_POST['UserChannel']['title'];
			if($model->validate())
			{
				if($model->save())
				{
					$this->redirect(array('view','id'=>$model->id));
				}
			}
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
		$dataProvider=new CActiveDataProvider('UserChannel');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UserChannel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserChannel'])){
			$model->attributes=$_GET['UserChannel'];
		}
		if(isset($_GET['type_id'])){
			$model->type_id=$_GET['type_id'];
		}
		
		$this->render('admin',array(
			'model'=>$model,
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
		$model=UserChannel::model()->findByPk($id);
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
	
	/**
	 * 处理jquery自动完成请求, 返回匹配的数据
	 *
	 */
	public function actionAutocomplete()
	{
		$term = $_GET['term'];
		
		$User = new UserChannelType();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('name', $term);
		$criteria->limit = 10;
		$records = $User->findAllByAttributes(array(), $criteria);
	
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
	/**
	 * 查看channel_key是否存在
	 */
	public function actionChannelKey()
	{
		$term = $_GET['term'];
		$User = new UserChannel();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('channel_key', $term);
		$criteria->limit = 10;
		$records = $User->findAllByAttributes(array(), $criteria);
	
		$response = array();
		foreach($records as $record) {
			$tmprow = array();
			$tmprow['value'] = $record->channel_key;
			$tmprow['label'] = $record->channel_key;
			$response[] = $tmprow;
		}
		echo json_encode($response);
		exit();
	}
	
	/**
	 * 查看关键词
	 */
	public function actionKeywordView()
	{
		$UserChannelReg=new UserChannelReg();
		$UserChannelReg->type=$model->keyword;
		$channel_key=$_GET['channel_key'];
		
		$model=UserChannel::model()->findByAttributes(array('channel_key'=>$channel_key));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		$this->render('view',array(
				'model'=>$model,
				'UserChannelReg'=>$UserChannelReg,
		));
	}
	
	
	
	
	/*Excel导入*/
	public function actionExcelUpload()
	{
		Yii::import("application.thirdlib.phpexcel.*");
		set_time_limit(0);
		$tmp_file =$_FILES['inputExcel']['tmp_name'];
		$name=$_FILES['inputExcel']['name'];
		$file_types =explode(".",$name);
		$file_type = $file_types[count($file_types)-1];
		 
		/*判别是不是.xls文件，判别是不是excel文件*/
		if (strtolower($file_type)!= "xlsx" && strtolower($file_type)!= "xls")
		{
			echo '{"code":1,"message":"文件格式不正确!"}';
			exit();
		}
		
		$objPHPExcel = new PHPExcel();
		//读入上传文件
		if($_FILES){
			if ($_FILES["inputExcel"]["error"] > 0)
			{
				echo '{"code":1,"message":"文件错误!"}';
				exit();
			}
		
			if (file_exists("data/excel/".$_FILES["inputExcel"]["name"]))
			{
				echo '{"code":1,"message":"文件已存在!"}';
				exit();
			}else if(!move_uploaded_file($_FILES["inputExcel"]["tmp_name"],"data/excel/".$_FILES["inputExcel"]["name"])){
				echo '{"code":1,"message":"文件移动失败,请检查文件名!"}';
				exit();
			}
		
			$objPHPExcel = PHPExcel_IOFactory::load("data/excel/".$_FILES["inputExcel"]["name"]);
			$currentSheet = $objPHPExcel->getSheet(0); /* * 读取excel文件中的第一个工作表 */
			$allColumn = $currentSheet->getHighestColumn();/**取得最大的列号*/
			$allRow = $currentSheet->getHighestRow(); /* * 取得一共有多少行 */
			PHPExcel_Cell::columnIndexFromString(); //字母列转换为数字列 如:AA变为27
			
			for($currentRow = 2; $currentRow <= $allRow; $currentRow = $currentRow + 1) {
				$account =$currentSheet->getCellByColumnAndRow(0, $currentRow)->getValue();
				$plan = $currentSheet->getCellByColumnAndRow(1, $currentRow)->getValue();
				$group =  $currentSheet->getCellByColumnAndRow(2, $currentRow)->getValue();
				$title =  $currentSheet->getCellByColumnAndRow(3, $currentRow)->getValue();
				
				$account_name=Yii::app()->db->createCommand()
				->select('name')
				->from('user_channel_type')
				->where("name=:name",array(':name'=>$account))
				->queryScalar();

				//判断是否到最后一行数据
				if(empty($account_name) && !empty($plan)){
					echo '{"code":1,"message":"不存在'.$account.'账户!"}';
					exit();								
				}
				
				if(preg_match("/[\x7f-\xff]/",$account_name)){
					echo '{"code":1,"message":"渠道不能为中文!"}';
					exit();
				}
			}
		
			for($currentRow = 2; $currentRow <= $allRow; $currentRow = $currentRow + 1) {
				$account = $currentSheet->getCellByColumnAndRow(0, $currentRow)->getValue();
				$plan = $currentSheet->getCellByColumnAndRow(1, $currentRow)->getValue();
				$group =  $currentSheet->getCellByColumnAndRow(2, $currentRow)->getValue();
				$title =  $currentSheet->getCellByColumnAndRow(3, $currentRow)->getValue();

				if(empty($account)&&empty($plan)){
					echo '{"code":0,"message":"导入成功!"}';
					exit();
				}
				
				if(!$group){
					$group='';
				}
				if(!plan){
					$plan='';
				}
				if(!title){
					$title='';
				}
				
				$type_id = Yii::app()->db->createCommand()
				->select("id")
				->from("user_channel_type")
				->where('name=:name', array(':name'=>$account))
				->queryScalar();
				
					$sql="insert into `user_channel`(`plan`,`type_id`,`group`,`title`)values(:plan,:type_id,:group,:title)";
					$command = Yii::app()->db->createCommand($sql);
					$command->bindParam(':plan',$plan);
					$command->bindParam(':type_id',$type_id);
					$command->bindParam(':group',$group);
					$command->bindParam(':title',$title);
					$data = $command->execute();
		
					$insertId=Yii::app()->db->getLastInsertID();
					
					$channel_key=$account.'_'.$insertId;
					$res = Yii::app()->db->createCommand()->update('user_channel', array('channel_key'=>$channel_key), 'id=:id',array(':id'=>$insertId));
					if(!$res){
						echo '{"code":1,"message":"修改channe_key失败!"}';
						exit();
					}
			}
		
			if($res){
				echo '{"code":0,"message":"全部导入成功!"}';
				exit();
			}else{
				echo '{"code":1,"message":"导入失败!"}';
				exit();
			}
			
		}
		
	}
	
	/*Excel导出*/
	public function actionExcelOutport(){
		$sql="select t.`name`,u.`plan`,u.`group`,u.`title`,u.`channel_key` from `user_channel_type` as t,`user_channel` as u where t.`id`=u.`type_id`";
		$command=Yii::app()->db->createCommand($sql);
		$model=$command->queryAll();
		//require_once'/protected/classes/excelOutportClass.php';
		Yii::import("application.thirdlib.phpexcel.*");
		
		$resultPHPExcel = new PHPExcel();
		$resultPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
		$resultPHPExcel->getActiveSheet()->setCellValue('A1','渠道');
		$resultPHPExcel->getActiveSheet()->setCellValue('B1','推广计划');
		$resultPHPExcel->getActiveSheet()->setCellValue('C1','推广组');
		$resultPHPExcel->getActiveSheet()->setCellValue('D1','关键词');
		$resultPHPExcel->getActiveSheet()->setCellValue('E1','链接');
		
		$i = 2;
		foreach($model as $item){
			$resultPHPExcel->getActiveSheet()->setCellValue('A'.$i,$item['name']);
			$resultPHPExcel->getActiveSheet()->setCellValue('B'.$i,$item['plan']);
			$resultPHPExcel->getActiveSheet()->setCellValue('C'.$i,$item['group']);
			$resultPHPExcel->getActiveSheet()->setCellValue('D'.$i,$item['title']);
			$resultPHPExcel->getActiveSheet()->setCellValue('E'.$i,'http://www.anyitou.com/channel/?from='.$item['channel_key']);
			$i ++;
		}
		
		$outputFileName = 'total.xls';
		$xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel);
		//ob_start(); ob_flush();
		
		header("Content-Type:application/force-download");
		header("Content-Type:application/octet-stream");
		header("Content-Type:application/download");
		header('Content-Disposition:inline;filename="'.$outputFileName.'"');
		header("Content-Transfer-Encoding: binary");
		header("Expires:Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified:".gmdate("D, d M Y H:i:s") ."GMT");
		header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		header("Pragma:no-cache");
		
		$finalFileName =(Yii::app()->basePath.'/runtime/'.time().'.xls');
		$xlsWriter->save($finalFileName);
		echo file_get_contents($finalFileName);
	}
}
