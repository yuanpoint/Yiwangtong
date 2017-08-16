<?php
/**
*查询订单api
*/
namespace Yiwangtong\Api;
use Yiwangtong\Api;

class OnlyAccounts extends Common{

	public $type;

	public $bankSerialNo;

	public $date;

	public $orderNo;

	public $operatorNo;

	public function Request(){
		//构建请求数组
		$params = array(
			'dateTime'=>$this->get_dateTime(),
			'branchNo'=>$this->get_branchNo(),
			'merchantNo'=>$this->get_merchantNo(),
			'type'=>$this->type,
			'bankSerialNo'=>$this->bankSerialNo,
			'date'=>$this->date,
			'orderNo'=>$this->orderNo,
			'operatorNo'=>$this->operatorNo
		);
		//拼接字符串
		$string = $this->getSignContent($params);

		//获取签名
		$sign = $this->Sign($string);

		//构建返回数组
		$reqData = array(
			'version'=>$this->version,
			'charset'=>$thi->charset,
			'sign'=>$sign,
			'signType'=>$this->signType,
			'reqData'=>$params
		);
		return $reqData;
	}

}











?>