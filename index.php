<?php
/**
* 一网通支付启动页
*author: yuanpoint 
* time 2017.7.18
*/
namespace Yiwangtong;

use Yiwangtong\Api;


//Yiwangtong要求PHP环境必须大于PHP5.3
if (!substr(PHP_VERSION, 0, 3) >= '5.3') {
    return "Fatal error: Yiwangtong requires PHP version must be greater than 5.3(contain 5.3). Because Yiwangtong used php-namespace";
}
// 定义根目录
define('Yiwangtong_ROOT_PATH',dirname(__FILE__) . '/');

//载入配置文件
require_once Yiwangtong_ROOT_PATH . 'Config.php';

//载入公共继承类
require_once Yiwangtong_ROOT_PATH . 'Api/Common.php';

//载入一网通的支付api类
require_once Yiwangtong_ROOT_PATH . 'Api/Pay.php';

//载入一网通的查询公钥api类
require_once Yiwangtong_ROOT_PATH . 'Api/Query.php';

//载入一网通的签约api类
require_once Yiwangtong_ROOT_PATH . 'Api/Parties.php';

//载入一网通的按商户日期查询已结账订单API类
require_once Yiwangtong_ROOT_PATH . 'Api/Accounts.php';

//载入一网通入账明细查询api的类
require_once Yiwangtong_ROOT_PATH . 'Api/InAccounts.php';

//载入查询单笔订单api类
require_once Yiwangtong_ROOT_PATH . 'Api/OnlyAccounts.php';

//载入退款api
require_once Yiwangtong_ROOT_PATH . 'Api/Refund.php';

//载入按退款日期查询退款api
require_once Yiwangtong_ROOT_PATH . 'Api/QueryRefundDate.php';

//载入已处理退款查询API
require_once Yiwangtong_ROOT_PATH . 'Api/DealRefund.php';




?>