<?php
ini_set("display_errors","off");
	header("Content-Type:text/html;charset=utf-8");
if(is_file($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php')){
    require_once($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php');
}
	
	//@require_once('index.html');
	require_once('./class/getarea.class.php');
	$ipdz =htmlentities($_REQUEST[ipdz], ENT_NOQUOTES); //过滤非法字符
	$area = GetArea($ipdz);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>网站ip地址查询_查询ip地址_域名ip查询_电脑ip地址查询_ip.liangwei.cc</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="免费ip地址查询,电脑ip地址查询,网络ip地址查询,网站ip地址查询,ip地址查询详细地址,ip地理位置查询,域名ip查询工具,如何查询ip地址,ip归属地查询尽在ip.liangwei.cc" />
		<link href="css/css.css"  media="screen" rel="stylesheet" type="text/css" />
		<meta name="baidu-tc-cerfication" content="64f23803438a0bf1a47dc03687e4c109" />
		<script type="text/javascript" src="js/jquery.js" ></script>
	</head>	
	<body>
		<!--#include virtual="/ssi/header.html" -->
		<div cellpadding="0" cellspacing="0" style="  padding:0; height:200px ">
			<table style=" width: 1000px ; margin:  auto;  ">
				<tr>
					<!--#include virtual="/ssi/left.html" -->
					<!--#include virtual="/ssi/headcx.html" -->
					<!--#include virtual="/ssi/right.html" -->
				</tr>
			</table>
			<div  style="margin:auto ; padding:0;width:600px ; height:200px ">
				<table border="0" width="600px" align="center" height="60px" >
					<tr align="center">
						<td>
							<strong><font size="5"  face="微软雅黑"  color="blue"><?php print_r($area[1][3])?> </font> </strong>
						</td>
					</tr>
				</table>
				<table border="0" width="600px" align="center" >
					<tr>
						<td width="155px" align="left"> 
							<li>
								<font color="red" face="微软雅黑" align="left">
									推荐数据(ipip)：
								</font>
							</li>
						</td>
						<td width="auto" align="left">
							<li>
								<font  color="red" face="微软雅黑" align="left">
									<?php 
									if ($ipip[0] === $ipip[1])
										print_r( "$ipip[0]"."$ipip[2]"."$ipip[3]"."$ipip[4]"."$ipip[5]") ;
									elseif($ipip[1] === $ipip[2])
										print_r( "$ipip[0]"."$ipip[1]"."$ipip[3]"."$ipip[4]"."$ipip[5]") ;
									elseif($ipip[2] === $ipip[3])
										print_r( "$ipip[0]"."$ipip[1]"."$ipip[2]"."$ipip[4]"."$ipip[5]") ;
									else
										print_r("$ipip[0]"."$ipip[1]"."$ipip[2]"."$ipip[3]"."$ipip[4]"."$ipip[5]") ;	
									?>
								</font>
							</li>
						</td>
								
					</tr>
					<tr>
						<td width="155px" align="left"> 
							<li>
								<font color="red" face="微软雅黑" align="left">
									参考数据(ip138)：
								</font>
							</li>
						</td>
						<td width="auto" align="left">
							<li>
								<font color="red" face="微软雅黑" align="left">
									<?php print_r($area[1][1]) ?>
								</font>
							</li>
						</td>
					</tr>
					<tr >
						<td width="155px" align="left"> 
							<li>
								<font color="red"  face="微软雅黑"  >
									本站数据(cz88)：
								</font>
							</li>
						</td>
						<td width="auto" align="left">
							<li>
								<font color="red" face="微软雅黑" align="left">
									<?php echo "$czipxx"  ?>
								</font>
							</li>
						</td>
					</tr>
					<tr >
						<td width="155px" align="left"> 
							<li>
								<font color="red"  face="微软雅黑"  >
									参考数据(ip138)：
								</font>
							</li>
						</td>
						<td width="auto" align="left">
							<li>
								<font color="red"  face="微软雅黑"  >
									<?php  print_r($area[1][2])  ?>
								</font>
							</li>
						</td>
					</tr>
				</table>
			</div>
		<!--#include virtual="/ssi/footer.html" -->
		</div>
		<!--#include virtual="/ssi/footerjs.html" -->
	</body>	
</html>