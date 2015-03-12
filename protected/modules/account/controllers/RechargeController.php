<?php

class RechargeController extends Controller
{
    
	public function actionAdmin()
	{
        $rechargeModel = new UserRecharge('search');
		$rechargeModel->unsetAttributes();
		if(isset($_GET['UserRecharge'])) {
			$rechargeModel->attributes = $_GET['UserRecharge'];
		    if(isset($_GET['UserRecharge']['username'])) {
    		    $rechargeModel->username = $_GET['UserRecharge']['username'];
    		}
		}
        
        $this->render('admin', array(
            'model' => $rechargeModel
        ));
	}
	
}