<?php
date_default_timezone_set('PRC');
if(is_file($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php')){
    require_once($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php');
}

header("Content-Type:text/html;charset=utf-8");
require_once( 'class/getarea.class.php');   //引入getarea函数
$userip =  get_client_ip();   //获取客户端本地ip
$area =  htmlentities(GetArea($userip));  //调用Area函数 获取地址
// 连主库

// $link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
// if ($link)
// {
	// mysql_select_db(SAE_MYSQL_DB,$link);
	// $ip = htmlentities($_REQUEST["ip"], ENT_NOQUOTES);
	// $address =htmlentities( $_REQUEST["address"]) ;
	// $datetime = htmlentities(date('Y-m-d H:i:s',time()));
	// $sql = "INSERT  INTO `ipinfo` (`ip`,`address`,`userip`,`datetime`) VALUES ('$ip','$address','$userip','$datetime')";
// }
// else
// {
// echo "数据库连接错误,请联系管理员邮箱：liangwei#liangwei.cc" ;
// }

// mysql_query("set names GBK");
// if (!MySQL_query($sql,$link))
// {
	// echo "<script>alert('添加记录失败，请按照过规范认真添加信息。');window.location.href='tijiaoip.html'</script>";
// }
// //mysql_close($link);

echo "<script>alert('添加记录成功，非常感谢您的支持');window.location.href='tijiaoip.html'</script>";

?>