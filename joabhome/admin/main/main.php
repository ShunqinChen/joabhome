<?php
session_start();
if($_SESSION['usersefid']=='') {
	
	echo "<a href='/admin/login.php'>����û�е�¼~�������˴����µ�¼</a>";
	exit;
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��̨����</title>
</head>

<frameset rows="80,*" cols="*" framespacing="2" frameborder="yes" border="2" bordercolor="#003399">
	<frame src="./top.html" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
  	<frameset rows="*" cols="160,*" framespacing="2" frameborder="yes" border="2" bordercolor="#003399">
		<frame src="./left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" />
    	<frame src="./right.html" name="mainFrame" id="mainFrame" />
  	</frameset>
</frameset>
<noframes>
<body>

</body>
</noframes>

</html>
