<?php
$link = mysql_connect("localhost", "joabhome", "5736811")
        or die("Could not connect : " . mysql_error()); 
    mysql_select_db("joabhome_jiankuncai") or die("Could not select database");

if (($_REQUEST['alias']!="") and ($_REQUEST['msg']!="")) {
 
  $serial=md5(uniqid(rand()));
  $alias = $_REQUEST['alias'];
  $ip=$_SERVER['REMOTE_ADDR'];
  $msgdate = time();
  $email = $_REQUEST['email'];
  $msg=$_REQUEST['msg'];
  $flag="1";
  
  $query="INSERT into guestbook(serial, alias, ip, msgdate, email, msg, flag) 
  	values('$serial',  '$alias', '$ip', '$msgdate', '$email', '$msg', '$flag')";
	echo $query;
  mysql_query($query);

  Header("Location: ./getbookindex.php");
  exit;

}else {
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>????</title>
</head>
<body bgcolor=ffffff>
<form method=POST >
<table border=0 cellpadding=2 width=395>
  <tr>
    <td nowrap><font color=004080>代??????</font></td>
    <td width=20%><input type=text name=alias size=8></td>
    <td nowrap><font color=004080>????????</font></td>
    <td width=50%><input type=text name=email size=18></td>
  </tr>
  <tr>
    <td nowrapvalign=top><font color=004080>????</font></td>
    <td width=80% colspan=3><textarea rows=5 name=msg cols=33></textarea></td>
  </tr>
  <tr>
    <td width=100% colspan=4 align=center>
       <input type=submit value="????????">
       <input type=reset value="??????????">
    </td>
  </tr>
</table>
</form>
</body>
</html>

<?php
}
?>


