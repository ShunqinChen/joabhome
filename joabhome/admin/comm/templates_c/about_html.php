
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>
<style>
body,td,th {
	font-size: 15px;
}
.a1{
background :#999999
}
</style>
<body>

<form name="form2" action="index.php" method="post" >
<input type="hidden" name="mod" value="about">
	<div class='a1' align="center">服务范围</div>
	<div class='a1'>　　　　<textarea name="AboutContent" rows="15" cols="100"><?php
echo $_obj['about'];
?>
</textarea></div>
	<div align="center" class='a1'><input type="submit" name="sub_about" value="提交"></div>
</form>
</table>

</body>
</html>