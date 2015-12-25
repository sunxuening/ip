<?php
/*
	@获取本地电脑ip地址并且得到位置
*/
	//header("Content-Type:text/html;charset=utf-8");
	require_once( '../class/getarea.class.php');   //引入getarea函数
	$clientip =  get_client_ip();   //获取客户端本地ip
	$area = GetArea($clientip);  //调用Area函数 获取地址
?>
<html>
	<head>
		<title> 您本地电脑IP地址 </title>
	</head>
	<body style="border:0 ; margin:0px; padding:0 ;">
		<table style=" width: 700px ; margin:  auto; hight: 20px ">
			<center>
				<font color="red" >
				您本地IP是:[<?php echo $clientip ?>]   来自：<?php echo "$czipxx"  ?>
				</font>
			</center>
		</table>
	</body>
</html>