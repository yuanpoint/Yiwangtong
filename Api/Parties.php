<?php
/**
*签约api
*/
namespace Yiwangtong\Api;

use Yiwangtong\Api;

class Parties extends Common{

	public $noticeUrl;

	public $noticePara;

	public function Request(){
		// 构建请求数组
		$params = array(
			'dateTime'=>$this->get_dateTime(),
			'merchantSerialNo'=>$this->merchantSerialNo,
			'agrNo'=>$this->agrNo,
			'branchNo'=>$this->get_branchNo(),
			'merchantNo'=>$this->get_merchantNo(),
			'mobile'=>$this->mobile,
			'userID'=>$this->userID,
			'lon'=>$this->lon,
			'lat'=>$this->lat,
			'riskLevel'=>$this->riskLevel,
			'noticeUrl'=>$this->get_noticeUrl(),
			'noticePara'=>$this->noticePara,
			'returnUrl'=>$this->returnUrl
		);
		//对数组进行排序
		$string = $this->getSignContent($params);
		echo "这是排序后的字符串，不包括私钥<br/>";
		var_dump($string);
		echo "<br/>";
		echo "这是签名<br/>";
		//获取签名
		$sign  = $this->Sign($string);

		var_dump($sign);
		echo "<br/>";
		// 构建返回数组
		$reqData = array(
			'version'=>$this->version,
			'charset'=>$this->charset,
			'signType'=>$this->signType,
			'sign'=>$sign,
			'reqData'=>$params
		);
		echo "这是最终请求报文<br/>";
		var_dump($reqData);
		// return $reqData;
	}
	/**
	*获取商户接收成功签约结果通知的地址
	*/	
	public function get_noticeUrl(){
		$str = '' ;
		if(NOTICEURL!='' && NOTICEURL!=null){
			$str = NOTICEURL;
		}elseif($this->noticeUrl!='' && $this->noticeUrl!=NULL){
			$str = $this->noticeUrl;
		}else{
			$str = "地址为空";
		}
		return $str;
	}

}








?>
