<?php

class CmsController extends Controller
{
	/**
	 * 
	 * 获取文章分类
	 */
	public function actionGetClass()
	{
		$response = array();
		
		$this->echoJson($response);
	}
}