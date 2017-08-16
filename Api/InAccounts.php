<?php
/**
*查询入账明细api
*/
namespace Yiwangtong\Api;

use Yiwangtong\Api;

class InAccounts extends Common{

	public $date;//查询日期

	public $operatorNo;//操作员

	public $nextKeyValue; //续传键值

	public function Request(){
		//构建请求数组
		$params = array(
			'dateTime'=>$this->get_dateTime(),
			'branchNo'=>$this->get_branchNo(),
			'merchantNo'=>$this->get_merchantNo(),
			'date'=>$this->date,
			'operatorNo'=>$this->operatorNo,
			'nextKeyValue'=>$this->nextKeyValue
		);
		//排序数组拼接字符串
		$string = $this->getSignContent($params);
		//获取签名
		$sign = $this->Sign($string);
		//构建返回数组
		$reqData = array(
			'version'=>$this->version,
			'charset'=>$this->charset,
			'sign'=>$sign,
			'signType'=>$this->signType,
			'reqData'=>$params
		);

		return $reqData;
	}

}
















?>