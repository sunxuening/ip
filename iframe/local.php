<?php
/*
	@获取本地电脑ip地址并且得到位置
*/
	//header("Content-Type:text/html;charset=utf-8");
	require_once( '../class/getarea.class.php');   //引入getarea函数
	$clientip =  get_client_ip();   //获取客户端本地ip
	$area = GetArea($clientip);  //调用Area函数 获取地址
?>
<center>
	<font color="red" >
	您本地IP是:[<?php echo $clientip ?>]   来自：<?php echo "$czipxx"  ?>
	</font>
</center>