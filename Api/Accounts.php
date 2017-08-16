<?php
/**
*按商户日期查询已结账订单API
*/
namespace Yiwangtong\Api;
use Yiwangtong\Api;
class Accounts extends Common{

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
		//获取排序的内容
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