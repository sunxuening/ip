<?php
ini_set("display_errors","off");
	header("Content-Type:text/html;charset=utf-8");
if(is_file($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php')){
    require_once($_SERVER['DOCUMENT_ROOT'].'/360safe/360webscan.php');
}
	@require_once('index.html');
	require_once('./class/getarea.class.php');
	$ipdz =htmlentities($_REQUEST[ipdz], ENT_NOQUOTES); //过滤非法字符
	$area = GetArea($ipdz);
	

?>
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
			<td> 
				<li>
					<font color="red" face="微软雅黑" align="left">
						推荐数据：
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
			<td> 
				<li>
					<font color="red" face="微软雅黑" align="left">
						参考数据：
						<?php print_r($area[1][1]) ?>
					</font>
				</li>
			</td>
		</tr>
		
		<tr >
			<td> 
				<li>
					<font color="red"  face="微软雅黑"  >
						本站数据：
						<?php echo "$czipxx"  ?>
					</font>
				</li>
			</td>
		</tr>
		<tr >
			<td> 
				<li>
					<font color="red"  face="微软雅黑"  >
						参考数据：
						<?php  print_r($area[1][2])  ?>
					</font>
				</li>
			</td>
		</tr>
	</table>
</div>
<div  style="margin-top:20px ;  padding:0; "></div>
<table border="0"  align="center" style="margin:auto; width:500px" top="10">
	<tr align="center">
		<td>
			<font color="#000" face="微软雅黑" >
				Copyrigh &copy;2013 - 2014       liangwei.cc 版权所有
			</font>
		</td>
	</tr>
	<tr align="center">
		<td>
			<font color="#000" face="微软雅黑" >
				如有问题请联系我 E-Mail：liangwei@liangwei.cc       技术支持：<a href="http://www.liangwei.cc" target="_blank">梁伟</a>
			</font>
		</td>
	</tr>
</table>