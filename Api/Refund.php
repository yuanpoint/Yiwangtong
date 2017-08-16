<?php
/**
*退款api
*/
namespace Yiwangtong\Api;

use Yiwangtong\Api;

class Refund extends Common{

	public $date;

	public $orderNo;

	public $refundSeriaNo;

	public $amount;//退款金额

	public $desc;

	public $operatorNo;

	public $encrypType;

	public $pwd;

	public function Request(){
		//构建请求数组
		$params = array(
			'dateTime'=>$this->get_dateTime(),
			'branchNo'=>$this->get_branchNo(),
			'merchantNo'=>$this->get_merchantNo(),
			'date'=>$this->date,
			'orderNo'=>$this->orderNo,
			'refundSeriaNo'=>$this->refundSeriaNo,
			'amount'=>$this->amount,
			'desc'=>$this->desc,
			'operatorNo'=>$this->operatorNo,
			'encrypType'=>$this->encrypType,
			'pwd'=>$this->pwd
		);
		//拼接字符串
		$string = $this->getSignContent($params);

		//获取签名
		$sign = $this->Sign($string);

		//构建返回数组
		$reqData = array(
			'versinon'=>$this->version,
			'charset'=>$this->charset,
			'sign'=>$sign,
			'signType'=>$this->signType,
			'reqData'=>$params
		);
		return $reqData;
	}
}








?>