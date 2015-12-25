<?php
/*
*	获取ip地址信息类  by  liangwei
*/
	header("Content-Type:text/html;charset=utf-8");
	require_once( 'getarea.class.php');   //引入getarea函数

	$area = GetArea($_REQUEST[ipadd]);
	
	
	$ipadd = $area[1][1] ;

	echo $ipadd ;
?>
