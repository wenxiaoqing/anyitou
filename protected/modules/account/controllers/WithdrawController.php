<?php

class WithdrawController extends Controller
{
	public function actionAdmin()
	{
		$model=new UserCashOut('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserCashOut'])) {
			$model->attributes=$_GET['UserCashOut'];
		    if(isset($_GET['UserCashOut']['username'])) {
    		    $model->username = $_GET['UserCashOut']['username'];
    		}
		    if(isset($_GET['UserCashOut']['realname'])) {
    		    $model->realname = $_GET['UserCashOut']['realname'];
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