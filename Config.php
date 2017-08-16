<?php
/**
*配置文件
*
*/
namespace Yiwangtong;


//商户分行号
define('BRANCHNO','0571');

//商户商户号
define('MERCHANTNO','001276');

//成功支付结果通知地址，商户接收成功支付结果通知的地址
define('PAYNOTICEURL', 'http://192.168.1.104:85/index.php/Api/Index/yiwantong_url');

//成功签约结果通知地址
define('SIGNNOTICEURL', 'http://192.168.1.104:85/index.php/Api/Index/yiwangtong_urls');

//支付秘钥sMerchantKey
define('SMERCHANTKEY','123456abcdeABCDE');//测试环境

//商户接收成功签约结果通知的地址
define('NOTICEURL', 'http://192.168.1.104:85/index.php/Api/Index/yiwangtong_urls');




?>