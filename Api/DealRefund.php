<?php
/**
*已处理退款查询API
*/
namespace Yiwangtong\Api;
use Yiwangtong\Api;

class DealRefund extends Common{

	public $type;

	public $orderNo;

	public $date;

	public $merchantSerialNo;

	public $bankSerialNo;

	public function Request(){

		//构建请求数组
		$params = array(
			'dateTime'=>$this->get_dateTime(),
			'branchNo'=>$this->get_branchNo(),
			'mewrchantNo'=>$this->get_merchantNo(),
			'type'=>$this->type,
			'orderNo'=>$this->orderNo,
			'date'=>$this->date,
			'merchantSerialNo'=>$this->merchantSerialNo,
			'bankSerialNo'=>$this->bankSerialNo
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