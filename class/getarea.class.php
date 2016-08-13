<?php
/*
*
	@使用ip通过纯真数据库，ip138 来获取数据
*
*/
ini_set("display_errors","off"); 
error_reporting(0);
require_once('czip.class.php'); //引入纯真数据库查询类
//require_once('IP.class.php'); //引入ipip.net
function GetArea($ipdzcs)
	{
		htmlentities($ipdzcs, ENT_NOQUOTES);
		global $location ;    //全局变量
		global $zsip ;
		global $czipxx ;  //纯真ip信息
		global $ipip;
		$useragent = "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0";
		if (strpos($ipdzcs, "*"))     //判断ip地址中是否包含“*”，包含就替换成0，不包含直接使用
			$ipdz = str_replace("*", "0", $ipdzcs);
		else
			$ipdz = $ipdzcs;
		$ipdz = trim("$ipdz"); //去除ip地址中空格
		$iplocation = new IpLocation(); 
		$location = $iplocation->getlocation($ipdz);  //将纯真数据库的ip地址拿出来经过ip138去查询
		
		if ($location == 1)
		{	
			$Area[1][1] = "您输入的".'"'.$ipdz.'"'."地址格式有误，请核对后重新输入";   //参考数据1
			$Area[1][2] = "您输入的".'"'.$ipdz.'"'."地址格式有误，请核对后重新输入"; //参考数据2
			$czipxx = "您输入的".'"'.$ipdz.'"'."地址格式有误，请核对后重新输入";
			$ipip[0] = "您输入的".'"'.$ipdz.'"'."地址格式有误，请核对后重新输入";
		}		
		else
		{
			$zsip = $location[ip] ;
			$czipxx = $location[country].$location[area];  //直接将纯真数据库数据返回给“参考数据(ip138)”内容
			$czipxx = iconv('GB2312', 'UTF-8//IGNORE',  $czipxx);
			$ch = curl_init();
			$url = "http://www.ip138.com/ips138.asp?ip=".$zsip."&action=2";
			$timeout = 60;
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,TRUE);
			curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_TIMEOUT, $timeout);
			$contents = curl_exec($ch);
			$contents = iconv('GB2312', 'UTF-8//IGNORE',  $contents);
			$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE); 
			curl_close($ch); 
			if( $httpcode <> 200 and $httpcode <> 301 and $httpcode <> 302 )   //若ip138出问题了，直接显示纯真数据库数据
				{
						$Area[1][1] = $czipxx;   //参考数据1
						$Area[1][2] = $czipxx;  //参考数据2
						$Area[1][3] = "您查询的IP: $zsip";
				}
			else
					{
						preg_match_all('|<li>本站数据：.*</li>|',$contents,$rsR);
						$rsR[0][0] = str_replace("<li>本站数据：", "", $rsR[0][0]);
						preg_match_all('|<li>参考数据1：.*</li>|',$contents,$rsB);
						$rsB[0][0] = str_replace("<li>参考数据1：", "", $rsB[0][0]);
						//preg_match_all('|<h1>.*</h1>|',$contents,$rsC);
						$pos = strpos($rsR[0][0],'</li>');	
						$pos1 = strpos($rsB[0][0],'</li>');
						$Area[1][1] = substr_replace($rsR[0][0],'',$pos);   //参考数据1
						$Area[1][2] = substr_replace($rsB[0][0],'',$pos1);  //参考数据2
						$Area[1][3] = "您查询的IP: $zsip";
						//$Area[1][3] = $rsC[0][0];
					}
			//调用ipip.net数据		
			$ch = curl_init();
			$urlipip = "http://freeapi.ipip.net/".$zsip;
			$timeout = 80;
			curl_setopt ($ch, CURLOPT_URL, $urlipip);
			curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,TRUE);
			curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_TIMEOUT, $timeout);
			$ipip = curl_exec($ch);
			$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE); 
			curl_close($ch); 
			if($httpcode <> 200 and $httpcode <> 301 and $httpcode <> 302)
				 {
					$ipip = array('0' => $Area[1][1]);
				}
			else
				{ 
					 $ipip = json_decode($ipip, true); 
				 }		 		 
		}	
		return $Area;
	}
function get_client_ip()
{
	$ip=false;
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
	{
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip)
		{
			array_unshift($ips, $ip); $ip = FALSE;
		}
		for ($i = 0; $i < count($ips); $i++)
		{
			if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i]))
			{
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

?>