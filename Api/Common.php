<?php
/**
*公共继承类
*/
namespace Yiwangtong\Api;

use Yiwangtong\Api;
class Common{

	public $version = '1.0';

	public $charset = 'UTF-8';

	public $sign;

	public $signType = 'SHA-256';

	public $dateTime;//请求时间

	public $merchantSerialNo;//协议开通请求流水号，开通协议时必填。

	public $agrNo = '';//客户协议号。不超过32位的数字字母组合。未签约（首次支付）客户，填写新协议号，用于协议开通；已签约（再次支付）客户，填写该客户已有的协议号。商户必须对协议号进行管理，确保客户与协议号一一对应。

	public $branchNo;//商户分行号

	public $merchantNo;//商户号

	public $userID='';//用于标识商户用户的唯一ID。商户系统内用户唯一标识，不超过20位，数字字母都可以，建议纯数字

	public $mobile='';//商户用户的手机号

	public $lon='';//经度，商户app获取的手机定位数据，如30.949505

	public $lat='';//纬度

	public $riskLevel = '3';//成功签约结果通知地址:首次签约，必填。商户接收成功签约结果通知的地址

	public $returnUrl='';//成功页返回商户地址,支付成功页面上“返回商户”按钮跳转地址。为空则不显示“返回商户”按钮。原生APP可传入一个特定地址（例如:Http://CMBNPRM），并拦截处理自行决定跳转交互。

	/**
	*获取请求时间
	*/
	public function get_dateTime(){
		$str = $this->dateTime;
		if($str=="" || $str==NULL){
			$str = date('YmdHis');
		}
		return $str;
	}
	/**
	*获取分行号
	*/
	public function get_branchNo(){
		$str = '';
		if(BRANCHNO!='' && BRANCHNO!=NULL){
			$str = BRANCHNO;
		}elseif($this->branchNo!='' && $this->branchNo!=null){
			$str = $this->branchNo;
		}else{
			$str = "商户分行号为空";
		}
		return $str;
	}
	/**
	*获取商户号
	*/
	public function get_merchantNo(){
		$str = '';
		if(MERCHANTNO!='' && MERCHANTNO!=null){
			$str = MERCHANTNO;
		}elseif($this->merchantNo!='' && $this->merchantNo!=null){
			$str = $this->merchantNo;
		}else{
			$str = "商户号为空";
		}
		return $str;
	}
	/**
	*拼接字符串函数
	*$params array 数组
	*@return  string $stringToBeSigned
	*/
	public function getSignContent($params) {

		//字典序排序
		ksort($params);

		$stringToBeSigned = "";
		$i = 0;
		foreach ($params as $k => $v) {
			if ($i == 0) {
				$stringToBeSigned .= "$k" . "=" . "$v";
			} else {
				$stringToBeSigned .= "&" . "$k" . "=" . "$v";
			}
			$i++;
		}
		return $stringToBeSigned;
	}
	/**
	*对字符串进行签名
	*/
	public function Sign($strToSign){

		//拼接支付密钥
		$strToSign .= '&'.SMERCHANTKEY;
		//SHA-256签名
		$baSrc = mb_convert_encoding($strToSign,"UTF-8");
		$baResult = hash('sha256', $baSrc);
		//转大写字符串
		$sign = strtoupper($baResult);

		return $sign;
	}	
	/**
	*获取订单日期
	*/
	public function get_date(){
		$str = $this->date;
		if($str=="" || $str==NULL){
			$str = date('Ymd');
		}
		return $str;
	}
	
	
}







?>