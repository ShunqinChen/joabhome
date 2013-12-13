<?php
session_start();
if($_SESSION['usersefid']=='') {
	
	echo "<a href='/admin/login.php'>您还没有登录~！单击此处重新登录</a>";
	exit;
}
echo <<< main_html
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>后台管理</title>
</head>

<frameset rows="80,*" cols="*" framespacing="2" frameborder="yes" border="2" bordercolor="#003399">
  <frame src="/printing/admin/main/top.html" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
  <frameset rows="*" cols="140,*" framespacing="2" frameborder="yes" border="2" bordercolor="#003399">
    <frame src="/printing/admin/main/left.html" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" />
    <frame src="/printing/admin/main/right.html" name="mainFrame" id="mainFrame" />
  </frameset>
</frameset>
<noframes><body>
</body>
</noframes></html>

main_html;
?>