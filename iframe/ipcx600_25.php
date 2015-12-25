<?php
/*
*	@获取用户ip地址信息，table尺寸460*25 有边框
*/
	header("Content-Type: text/html; charset=utf-8");
	require_once( '../class/getarea.class.php');   //引入getarea函数
	$clientip =  get_client_ip();   //获取客户端本地ip
	$area = GetArea($clientip);  //调用Area函数 获取地址
?>
<html>
	<head>
		<title> ip地理位置信息 </title>
		
		 <!-- 统计代码 -->
		<STYLE type=text/css>
			A{ TEXT-DECORATION: none }
			A:hover { COLOR: #222222 }
			A:link { COLOR: #222222 }
			A:visited {	COLOR: #222222 }
			BODY{ FONT-SIZE: 9pt; BACKGROUND: #ffffff;TEXT-DECORATION: none;  }
			TD{	FONT-SIZE: 9pt; LINE-HEIGHT: 150%; FONT-FAMILY: 宋体 }
			Table{ cellSpacing:0; cellPadding:0}
		</STYLE>
	</head>
	<body style="margin:0px;">
		<center>
			<table border='0' width='600' cellspacing='1' bgcolor='#cccccc'><tbody>
				<tr>
					<td align=center width='15%' bgcolor='#eeeeee'>您的IP是：</td>
					<td bgcolor='#FFFFFF' width='19%'>&nbsp;<a target="_blank" href="http://ip.liangwei.cc/ip.php?ipdz=<?php echo $clientip ?>" title="ip地理位置详细查询"><?php echo $clientip ?> 
					</td>
					<td align=center width='12%' bgcolor='#eeeeee'>来自：</td>
					<td bgcolor='#FFFFFF' width='56%'>&nbsp;<a target="_blank" href="http://ip.liangwei.cc/" title="本信息来自ip.liangwei.cc"><?php echo "$czipxx"  ?> 
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>
