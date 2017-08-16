<?php
/**
*一网通支付api 
*/
namespace Yiwangtong\Api;

use Yiwangtong\Api;

class Pay extends Common{

	public $date;//订单日期 yyyyMMdd

	public $orderNo;//订单号

	public $amount;//金额，固定两位小数，最大11位整数

	public $expireTimeSpan='30';//过期时间跨度必须为大于零的整数，单位为分钟。该参数指定当前支付请求必须在指定时间跨度内完成（从系统收到支付请求开始计时），否则按过期处理。一般适用于航空客票等对交易完成时间敏感的支付请求。

	public $payNoticeUrl;//成功支付结果通知地址

	public $payNoticePara = '';//成功支付结果通知附加参数,该参数在发送成功支付结果通知时，将原样返回商户注意：该参数可为空，商户如果需要不止一个参数，可以自行把参数组合、拼装，但组合后的结果不能带有’&’字符。

	public $clientIP;//商户取得的客户IP，如果有多个IP用逗号”,”分隔。

	public $cardType = '';//允许支付的卡类型,默认对支付卡种不做限制，储蓄卡和信用卡均可支付A:储蓄卡支付，即禁止信用卡支付

	public $signNoticePara = '';//成功签约结果通知附加参数:该参数在发送成功签约结果通知时，将原样返回商户注意：该参数可为空，商户如果需要不止一个参数，可以自行把参数组合、拼装，但组合后的结果不能带有’&’字符。

	public $extendInfo = '';//json格式写入的扩展信息，并使用extendInfoEncrypType指定的算法加密使用详见扩展信息注注意：1.加密后的密文必须转换为16进制字符串2.如果扩展信息字段非空，该字段必填

	public $extendInfoEncrypType = '';//扩展信息的加密算法
		//扩展信息加密类型，取值为RC4或DES
		//加密密钥：取值为RC4时，密钥为商户支付密钥；
		//取值为DES时，密钥为商户支付密钥的前8位，不足8位则右补0
		//注意：如果扩展信息字段非空，该字段必填

	public function Request(){
		// 构建请求数据
		$params=array(
			'dateTime'=>$this->get_dateTime(),
			'branchNo'=>$this->get_branchNo(),
			'merchantNo'=>$this->get_merchantNo(),
			'date'=>$this->get_date(),
			'orderNo'=>$this->orderNo,
			'amount'=>$this->amount,
			'expireTimeSpan'=>$this->expireTimeSpan,
			'payNoticeUrl'=>$this->get_payNoticeUrl(),
			'payNoticePara'=>$this->payNoticePara,
			'returnUrl'=>$this->returnUrl,
			'clientIP'=>$this->get_clientIP(),
			'cardType'=>$this->cardType,
			'agrNo'=>$this->agrNo,
			'merchantSerialNo'=>$this->merchantSerialNo,
			'userID'=>$this->userID,
			'mobile'=>$this->mobile,
			'lon'=>$this->lon,
			'lat'=>$this->lat,
			'riskLevel'=>$this->riskLevel,
			'signNoticeUrl'=>$this->get_signNoticeUrl(),
			'signNoticePara'=>$this->signNoticePara,
			'extendInfo'=>$this->extendInfo,
			'extendInfoEncrypType'=>$this->extendInfoEncrypType
		);

		//生成拼接字符串
		$string = $this->getSignContent($params);
		// var_dump($string);
		//生成签名
		$sign = $this->Sign($string);
		// var_dump($sign);
		//构建返回数组
		$reqData = array(
			'version'=>$this->version,
			'charset'=>$this->charset,
			'signType'=>$this->signType,
			'sign'=>$sign,
			'reqData'=>$params
		);
		
		return $reqData;
	}	
	/**
	*成功签约结果通知地址
	*/
	public function get_signNoticeUrl(){
		$str = '';
		if(SIGNNOTICEURL!='' && SIGNNOTICEURL!=NULL){
			$str = SIGNNOTICEURL;
		}elseif($this->signNoticeUrl!='' && $this->signNoticeUrl!=NULL){
			$str = $this->signNoticeUrl;
		}else{
			$str = "成功签约结果通知地址不能为空";
		}
		return $str;
	}
	
	/**
	*获取支付成功通知地址
	*/
	public function get_payNoticeUrl(){
		$str = "";
		if(PAYNOTICEURL!="" && PAYNOTICEURL!=NULL){
			$str = PAYNOTICEURL;
		}elseif($this->payNoticeUrl!="" && $this->payNoticeUrl!=NULL){
			$str = $this->payNoticeUrl;
		}else{
			$str = "支付成功通知结果地址不能为空";
		}
		return $str;
	}


	/**
	*获取客户端IP
	*/
	public function get_clientIP(){

		$str = $_SERVER['REMOTE_ADDR'];
		return $str;
	}
	
}

?>