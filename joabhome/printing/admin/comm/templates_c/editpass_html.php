<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>无标题文档</title>
</head>
<body>
<div class="sectionHeader">修改密码</div>
<div class="sectionBody">


<form name="form1" action="index.php" method="post" >
<input type="hidden" name="mod" value="printing@dsfsdfsdfsew!@wfe" />
<table width=95% border="0" class="grid">
	 <tr><td colspan="5" class="row3" align="center">修改后台登录密码</td></tr>
	 <tr>
	 	<td  class="row3">用户名：</td>
	 	<td  class="row1"><input type="text" name="adminusername" value="<?php
echo $_obj['adminusername'];
?>
"></td>
	 	<td  class="row3">密码：</td>
	 	<td  class="row1"><input type="password" name="adminpass" value="<?php
echo $_obj['adminpass'];
?>
"></td>
	 	<td  class="row1"><input type="submit" name="subadmin" value="确定"></td>
	 </tr>
 </table> 
</form>
<br>
<form name="form11" action="index.php" method="post" >
<input type="hidden" name="mod" value="printing@dsfsdfsdfsew!@wfe" />
<table width=95% border="0" class="grid">
	 <tr><td colspan="5" class="row3" align="center">修改数据库密码</td></tr>
	 <tr>
	 	<td  class="row3">用户名：</td>
	 	<td  class="row1"><input type="text" name="datausername" value="<?php
echo $_obj['datausername'];
?>
"></td>
	 	<td  class="row3">密码：</td>
	 	<td  class="row1"><input type="password" name="datapass" value="<?php
echo $_obj['datapass'];
?>
"></td>
	 	<td  class="row1"><input type="submit" name="subdata" value="确定"></td>
	 </tr>
 </table> 
</form>




</div>
</div>
</body>
</html>
<script language="JavaScript" type="text/javascript">

var frm = new Validator("form1");

frm.addV("adminusername", "req", "后台用户名不为空");
frm.addV("adminpass", "req", "后台密码不为空");
</script>
<script language="JavaScript" type="text/javascript">

var frm = new Validator("form11");

frm.addV("datausername", "req", "数据库用户名不为空");
frm.addV("datapass", "req", "数据库密码不为空");
</script>