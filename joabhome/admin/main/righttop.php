<?php
$Day = date('Y年m月d日',time());
echo <<<rightTop

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="../other/css.css"></link>
<title>无标题文档</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>


</head>
 </body>
        <table style='width:100%' cellpadding='0' cellspacing='0' ><tr><td nowrap height='20' align='left' id='showtoc' style='display:none; cursor:hand' onclick='showLeft()'> 
                 <font color=#FFFFFF>显示菜单</font>
                 &nbsp; </td>
                <td height='20' width='80%' align='right' style="filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr='#000A5EC1', EndColorStr='#FF0856BA');">
                    <marquee scrollamount="2">欢迎您 管理员 &nbsp; 今天是 北京时间 $Day  </marquee>
                </td>
                <td align='right' style="filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr='#000A5EC1', EndColorStr='#FF0856BA');">
                </span>&nbsp;&nbsp;<font color='#FFFFFF'>[<a href='../login.php' class='nav' target='_top'>重登录</a>]</font>&nbsp;&nbsp;</td>
                </tr></table>
    </body>
</html>"
rightTop;
?>
