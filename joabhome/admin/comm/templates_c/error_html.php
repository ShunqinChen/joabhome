<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<title>��̨����ϵͳ</title>

</head>
<div class="sectionHeader">&nbsp;��Ϣ��ʾ
</div>
<div class="sectionBody">
<div align="center">
<table width=95% border="0" class="grid">
	<tr>
	   <td class="gridHeader" align="center">ϵͳ��ʾ��Ϣ</td>
	</tr>
	<tr>
	  <td height="58"  class="row3">
		<div>
		  <p>�����Ϣ:</p>
		  <p align="center"><?php
echo $_obj['message'];
?>
</p>
		  <br>
		  </div>
	  </td>
	</tr>
	<tr>
	  <td class="row3" align="center">
		<?php
if ($_obj['urlFile'] == ""){
?> 
		<a href="javascript:history.back();"><em>�����˴�����>>></em></a>
		<?php
} else {
?> 
		<a href="/admin/index.php?mod=<?php
echo $_obj['urlFile'];
?>
"><em>�����˴�����>>></em></a>
		<?php
}
?> 
	  </td>
	</tr>
</table>
</div>

</div>
</div>
</html>
</div>
