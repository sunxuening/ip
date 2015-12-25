<?php
/*
*	@获取用户ip地址信息，table尺寸460*15 无边框
*/
	header("Content-Type: text/html; charset=utf-8");
	require_once( '../class/getarea.class.php');   //引入getarea函数
	$clientip =  get_client_ip();   //获取客户端本地ip
	$area = GetArea($clientip);  //调用Area函数 获取地址
?>
<html>
	<head>
		<title> ip地理位置信息 </title>
		<STYLE type=text/css>
			A{ TEXT-DECORATION: none }
			A:hover { COLOR: #222222 }
			A:link { COLOR: #222222 }
			A:visited {	COLOR: #222222 }
			BODY{ FONT-SIZE: 9pt; BACKGROUND: #ffffff;TEXT-DECORATION: none;  }
		</STYLE>
	</head>
	<body style="margin:0px;">
		<center>
			IP：<a target="_blank" href="http://ip.liangwei.cc/ip.php?ipdz=<?php echo $clientip ?>" title="ip地理位置详细查询"><?php echo $clientip ?> 
			来自：<a target="_blank" href="http://ip.liangwei.cc/" title="本信息来自ip.liangwei.cc"><?php echo "$czipxx"  ?> 
			</tr>
			</table>
		</center>
	</body>
</html>
