<?php

/**
* 查询公钥api
*/
namespace Yiwangtong\Api;

use Yiwangtong\Api;

class Query extends Common{

	public $txCode = 'FBPK';

	public $branchNo;

	public $merchantNo;

	public function Request(){
		//构建请求数组
		$params = array(
			'dateTime'=>$this->get_dateTime(),
			'txCode'=>$this->txCode,
			'branchNo'=>$this->get_branchNo(),
			'merchantNo'=>$this->get_merchantNo()
		);
		//获得排序后的字符串
		$string = $this->getSignContent($params);
		//对字符串进行签名
		$sign = $this->Sign($string);
		// 构建返回数组
		$responstData = array(
			'version'=>$this->version,
			'charset'=>$this->charset,
			'sign'=>$sign,
			'signType'=>$this->signType,
			'reqData'=>$params
		);
		return $responstData;
	}
	
	
	
}








?>