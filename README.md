这是一网通的说明文档
所有的类均放在class文件夹里面
需要知道的是所有返回的数据均为数组，根据需要自行去处理，比如json


/////////////////////////////////////////////////////
付款api
$Pay = new \Yiwangtong\Api\Pay();
$Pay->orderNo = ' ';
$Pay->amount = '';
$Pay->expireTimeSpan='';
$Pay->payNoticePara = '';
$Pay->returnUrl = '';
$Pay->cardType = '' ;
$Pay->agrNo = '' ;
$Pay->merchantSerialNo = '' ;
$Pay->userID = '' ;
$Pay->mobile = '' ;
$Pay->lon = '' ;
$Pay->lat = '' ;
$Pay->signNoticePara = '' ;
$Pay->extendInfo = '' ;
$Pay->extendInfoEncrypType = '' ;
$respont = $Pay->Request();

//////////////////////////////////////////////////
查询公钥api使用方法
$Query = new \Yiwangtong\Api\Query();
$respont = $Query->Request();
////////////////////////////////////////////////
签约api使用方法
$Parties = new \Yiwangtong\Api\Parties();
$Parties->agrNo = '' ;
$Parties->mobile = ' ';
$Parties->userID,
$Parties->lon = '';
$Parties->lat='';
$Parties->noticePara = '' ;
$Parties->returnUrl = '' ;
$respont = $Parties->Request();
/////////////////////////////////////////////
按商户日期查询已结账订单API
$Accounts = new \Yiwangtong\Api\Accounts();
$Accounts->beginDate = '' ;
$Accounts->endDate = '' ;
$Accounts->operatorNo = '' ;
$Accounts->nextKeyValue = '' ;
$respont = $Accounts->Request();
////////////////////////////////////////////////////
查询入账明细API
$InAccounts = new \Yiwangtong\Api\InAccounts();
$InAccounts->date = '' ;
$InAccounts->operatorNo = '' ;
$InAccounts->nextKeyValue = '' ;
$respont = $InAccounts->Request();
////////////////////////////////////////////////////////
查询单笔订单api
$OnlyAccounts = new \Yiwangtong\Api\OnlyAccounts();
$OnlyAccounts->type = '' ;
$OnlyAccounts->bankSerialNo = '';
$OnlyAccounts->date = '' ;
$OnlyAccounts->orderNo = '' ;
$OnlyAccounts->operatorNo = ' ';
$respont = $OnlyAccounts->Request();
///////////////////////////////////////////////////////////
退款api
$Refund = new \Yiwangtong\Api\Refund();
$Refund->date= '' ;
$Refund->orderNo = '' ;
$Refund->amount = '' ;
$Refund->refundSeriaNo = '' ;
$Refund->desc = '' ;
$Refund->operatorNo = '' ;
$Refund->encrypType = '' ;
$Refund->pwd = ' ';
$respont = $Refund->Request();
///////////////////////////////////////////////////
按退款日期查询退款API
$QueryRefundDate = new \Yiwangtong\Api\QueryRefundDate();
$QueryRefundDate->beginDate = '' ;
$QueryRefundDate->endDate = '' ;
$QueryRefundDate->operatorNo = '' ;
$QueryRefundDate->nextKeyValue = '' ;
$respont = $QueryRefundDate->Request();