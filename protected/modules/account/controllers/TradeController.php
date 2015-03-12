<?php

class TradeController extends Controller
{
    
	public function actionAdmin()
	{
		$model=new UserCashLog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserCashLog'])) {
			$model->attributes=$_GET['UserCashLog'];
		    if(isset($_GET['UserCashLog']['username'])) {
    		    $model->username = $_GET['UserCashLog']['username'];
    		}
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionView()
	{
		$this->render('view');
	}
	
}