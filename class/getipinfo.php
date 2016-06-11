<?php
/*
*	获取ip地址信息类  by  liangwei
*	为思科技术社区实现用户回帖自动根据ip返回归属地功能.
*	案例：http://www.sikejishu.com/forum.php?mod=viewthread&tid=7177 
*/
	header("Content-Type:text/html;charset=utf-8");
	require_once( 'getarea.class.php');   //引入getarea函数

	$area = GetArea($_REQUEST[ipadd]);
	
	
	$ipadd = $area[1][1] ;

	echo $ipadd ;
?>
