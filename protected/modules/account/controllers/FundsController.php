<?php

class FundsController extends Controller
{
	public function actionAdmin()
	{
		$UserFunds = new UserFunds();

		$model = new UserFunds('search');
		$model->unsetAttributes();
		if(isset($_GET['UserFunds'])) {
			$model->attributes = $_GET['UserFunds'];
			if(isset($_GET['UserFunds']['username'])) {
				$model->username = $_GET['UserFunds']['username'];
			}
		}

		$this->render('admin', array(
				'model' => $model
		));
	}

	public function actionIncomeAndExpenses()
	{
		$model=new UserCashLog();
		$user_id=$_POST['user_id'];
			
		/**
		 * 统计当期账户余额use_money,
		 * 冻结资金frozen_money及
		 * 累加的总额total
		 */
		$sql="select use_money,frozen_money,all_assets from user_funds where user_id='$user_id'";
		$total_amount=Yii::app()->db->createCommand($sql)->queryAll();
			
		foreach($total_amount as $key=>$val)
		{
			if(empty($val['use_money'])){
				$val['use_money']='0.00';
			}
			if(empty($val['frozen_money'])){
				$val['frozen_money']='0.00';
			}
			if(empty($val['all_assets'])){
				$val['all_assets']='0.00';
			}
			$all_assets=$val['frozen_money']+$val['use_money'];
			$str_total_amount='<table width="60%"  cellpadding="2" cellspacing="0" border="1">
					<tr style="height:30px;"><td rowspan="2" style="color:blue;width:100px;">账户:</td><td style="width:100px;">余额:</td><td style="width:100px;">'.$val['use_money'].'</td><td rowspan="2" style="width:100px;">总计:</td><td rowspan="2" style="width:100px;">'.$all_assets.'</td></tr>
							<tr><td style="width:100px;">冻结金额:</td><td  style="width:100px;">'.$val['frozen_money'].'</td></tr></table>';

		}

		/**
		 * 统计每个category对应的收入
		 */
		$sql="select category,sum(cash_num) as cash_num from user_cash_log where user_id='$user_id' and cash_status='1' group by category";
		$income_money=Yii::app()->db->createCommand($sql)->queryAll();

		$income_moneys=array();
		foreach($income_money as $key=>$val)
		{
			//$income_moneys[$key]['category']=$model->categorys[$val['category']]['label'];
			$income_moneys[$key]['category']=$model->categorys[$val['category']];
			$income_moneys[$key]['cash_num']=$val['cash_num'];
			$total_income+=$val['cash_num'];
		}

		if(empty($total_income)){
			$total_income='0.00';
		}
		$num=count($income_moneys)+1;
		$str1_income_moneys='<table width="60%"  cellpadding="2" cellspacing="0" border="1">
				<tr style="height:30px;red;">
				<td rowspan='.$num.' style="color:red;width:100px;">收入:</td>
						<td style="width:100px;"></td>
						<td style="width:100px;"></td>
						<td rowspan='.$num.' style="width:100px;">总数:</td>
								<td rowspan='.$num.' style="width:100px;">'.$total_income.'</td>
										</tr>';

		foreach($income_moneys as $key=>$val)
		{
			$str2_income_moneys.='<tr style="height:30px;red;">
					<td style="width:100px;">'.$val['category'].'</td>
							<td style="width:100px;">'.$val['cash_num'].'</td>
									</tr>';

		}

		$str3_income_moneys='</table>';
		$str_income_moneys=$str1_income_moneys.$str2_income_moneys.$str3_income_moneys;

		/**
		 * 查看每个category 对应的支 出
		 */
		$sql="select category,sum(cash_num) as cash_num from user_cash_log where user_id='$user_id' and cash_status='2' group by category";
		$expense_money=Yii::app()->db->createCommand($sql)->queryAll();
		$expense_moneys=array();
		foreach($expense_money as $key=>$val)
		{
			//$expense_moneys[$key]['category']=$model->categorys[$val['category']]['label'];
			$expense_moneys[$key]['category']=$model->categorys[$val['category']];
			$expense_moneys[$key]['cash_num']=$val['cash_num'];
			$total_expense+=$val['cash_num'];
		}

		if(empty($total_expense)){
			$total_expense='0.00';
		}
		$num=count($expense_moneys)+1;
		$str1_expense_moneys='<table width="60%"  cellpadding="2" cellspacing="0" border="1">
				<tr style="height:30px;red;">
				<td rowspan='.$num.' style="width:100px;color:green;">支出:</td>
						<td style="width:100px;"></td>
						<td style="width:100px;"></td>
						<td rowspan='.$num.' style="width:100px;">总数:</td>
								<td rowspan='.$num.' style="width:100px;">'.$total_expense.'</td>
										</tr>';

		foreach($expense_moneys as $key=>$val)
		{
			$str2_expense_moneys.='<tr style="height:30px;solid;red;">
					<td style="width:100px;">'.$val['category'].'</td>
							<td style="width:100px;">'.$val['cash_num'].'</td>
									</tr>';

		}
		$str3_expense_moneys='</table>';
		$str_expense_moneys=$str1_expense_moneys.$str2_expense_moneys.$str3_expense_moneys;

		//收入与支出的差额
		$difference=round($total_income-$total_expense,2);
		
		if(empty($difference)){
			$difference='0.00';
		}

		$str_difference='<table width="60%"   border="1">
				<tr style="height:30px;border:1px;solid;"><td style="color:blue;width:130px;">差额:</td><td style="text-align:center;">'.$difference.'</td></tr>
						</table>';
		$str=$str_total_amount.$str_income_moneys.$str_expense_moneys.$str_difference;
		echo json_encode($str);

	}
}

