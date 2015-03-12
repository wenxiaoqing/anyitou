<?php
class CallRecordController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model =CallRecord::model()->findByAttributes(array('id'=>$id));
		$this->render('view',array(
				'model' => $model,
		));
	}

	public function actionAdmin()
	{
	    $model=new CallRecord('search');
	    $model->unsetAttributes();  // clear any default values
	    if(isset($_GET['CallRecord'])) {
	    	$model->attributes=$_GET['CallRecord'];
	    }

		$this->render('admin',array(
				'model' => $model,
		));
	}
	
	public function actionCreate()
	{
		$model=new CallRecord;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['CallRecord']))
		{
			$user_name=$_POST['CallRecord']['user_name'];
			$post=User::model()->findByAttributes(array('user_name'=>$user_name));
			if(!$post)
			{
				$model->addError('user_id','用户不存在或用户不能为空!');
					$this->render('create',array(
							'model'=>$model,
					));
					return false;
			}
			$user_id=$post->id;
			$model->user_id=$user_id;
			$model->attributes=$_POST['CallRecord'];
			
			if($model->validate()) {
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
				'model'=>$model,
		));
	}
	
	public function actionUpdate($id)
	{
		$model=CallRecord::model()->findByPk($id);
		$user_id=$model->user_id;
		$post=User::model()->findByAttributes(array('id'=>$user_id));
		$model->user_name=$post->user_name;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['CallRecord']))
		{
		
			$model->attributes=$_POST['CallRecord'];
			
			if($model->validate()) {
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
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
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserChannel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CallRecord::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * 处理jquery自动完成请求, 返回匹配的数据
	 *
	 */
	public function actionAutocomplete()
	{
		$term = $_GET['term'];
		$User = new User();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('user_name',$term);
		$criteria->limit = 10;
		$records = $User->findAllByAttributes(array(), $criteria);
	
		$response = array();
		foreach($records as $record) {
			$tmprow = array();
			$tmprow['value'] = $record->user_name;
			$tmprow['label'] = $record->user_name;
			$response[] = $tmprow;
		}
		echo json_encode($response);
		exit();
	}
	
	/**
	 * 外呼记录
	 * 
	 */
	
	public function actionRecordOutput()
	{
		//$service_id=Yii::app()->user->id;
		//$model=CallRecord::model()->findAllByAttributes(array('service_id'=>$service_id));
		$model=CallRecord::model()->findAll();
		
		Yii::import("application.thirdlib.phpexcel.*");
		$resultPHPExcel = new PHPExcel();
		$resultPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$resultPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
		$resultPHPExcel->getActiveSheet()->setCellValue('A1','客户ID');
		$resultPHPExcel->getActiveSheet()->setCellValue('B1','客户名称');
		$resultPHPExcel->getActiveSheet()->setCellValue('C1','外呼状态');
		$resultPHPExcel->getActiveSheet()->setCellValue('D1','满意度');
		$resultPHPExcel->getActiveSheet()->setCellValue('E1','外呼时间');
		$resultPHPExcel->getActiveSheet()->setCellValue('F1','描述');
		
		$i = 2;
		foreach($model as $item){
			$user_name=$item->user->user_name;
			$mod=User::model()->findByAttributes(array('user_name'=>$user_name));
			$user_id=$mod->id;
			$resultPHPExcel->getActiveSheet()->setCellValue('A'.$i,$user_id);
			$resultPHPExcel->getActiveSheet()->setCellValue('B'.$i,$item->user->user_name);
			$resultPHPExcel->getActiveSheet()->setCellValue('C'.$i,$item->getTypeStatus());
			$resultPHPExcel->getActiveSheet()->setCellValue('D'.$i,$item->getSatisfaction());
			$resultPHPExcel->getActiveSheet()->setCellValue('E'.$i,$item->time);
			$resultPHPExcel->getActiveSheet()->setCellValue('F'.$i,$item->descript);
			$i ++;
		}
		
		$outputFileName = 'callRecord.xls';
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