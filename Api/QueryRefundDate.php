<?php
/**
*按退款日期查询退款API
*/
namespace Yiwangtong\Api;

use Yiwangtong\Api;

class QueryRefundDate extends Common{

	public $beginDate;

	public $endDate;

	public $operatorNo;

	public $nextKeyValue;

	public function Request(){

		//构建请求数组
		$params = array(
			'dateTime'=>$this->get_dateTime(),
			'branchNo'=>$this->get_branchNo(),
			'merchantNo'=>$this->get_merchantNo(),
			'beginDate'=>$this->beginDate,
			'endDate'=>$this->endDate,
			'operatorNo'=>$this->operatorNo,
			'nextKeyValue'=>$this->nextKeyValue
		);
		//拼接字符串
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