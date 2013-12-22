<?php
session_start();
if($_SESSION['usersefid']=='') {
	
	Header("Location: ../login.php");
	exit;
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href="../other/css.css"></link>
<title>Untitled Document</title>
<style type="text/css">
        <!--
        body {
                margin-left: 0px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                background-color: #CCCCCC;
        }
        -->
        </style>
</head>

<body bgcolor=#e6e6e6>
<table width="132"  align="left" bgcolor="#CCCCCC">
          <tr>
	            <td width="132" height="100%" align="center" style="text-align:center;">
		            <fieldset><legend><img src="../other/images/icon_picclass.gif"> <font color="#009900">产品管理</font></legend>
		            	<table width="100%">
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proAdd" target='contentFrame'>产品添加</a><br></td></tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proInq" target='contentFrame'>产品列表</a><br></td> </tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proTypeAdd" target='contentFrame'>类别添加</a><br></td> </tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proTypeInq" target='contentFrame'>类别列表</a><br></td> </tr> 
		                        <tr><td width="100%" height="100%" align="left"  nowrap="nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proTypeAdd_new" target='contentFrame'>新品类别添加</a><br></td> </tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proTypeInq_new" target='contentFrame'>新品类别列表</a><br></td> </tr>
		                 </table>
		            </fieldset>
		        </td>
	      </tr>

	       <tr>
	            <td width="132" height="100%" align="center">
		            <fieldset><legend><img src="../other/images/icon_picclass.gif"> <font color="#009900">其它</font></legend>
		            	<table width="100%">
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=abouts" target='contentFrame'>公司简介</a><br></td></tr>
	                        <?php if( $_SESSION['userid']=="admin"){ ?>	
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=member2343rfwfsda" target='contentFrame'>会员列表</a><br></td></tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proOrderfsafaewqerqw" target='contentFrame'>订单列表</a><br></td></tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=getbookfsafafsafsa" target='contentFrame'>留言列表</a><br></td></tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=editpass" target='contentFrame'>后台密码</a><br></td></tr>
	                 		<?php }else{ ?>	
		                 		<tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=member" target='contentFrame'>会员列表</a><br></td></tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=proOrder" target='contentFrame'>购物列表</a><br></td></tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=getbook" target='contentFrame'>留言列表</a><br></td></tr>
		                        <tr><td width="100%" height="100%" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../other/images/folder-expanded.gif">&nbsp;<a href="../index.php?mod=editpass" target='contentFrame'>后台密码</a><br></td></tr>	
	                 		<?php } ?>
		                 </table>
		            </fieldset>
		        </td>
	      </tr>
</table>
</body>
</html>
