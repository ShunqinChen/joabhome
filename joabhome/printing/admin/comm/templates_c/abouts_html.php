<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>无标题文档</title>
</head>
<body>
<div class="sectionHeader">公司简介与联系我们</div>
<div class="sectionBody">


<form name="form1" action="index.php" method="post" >
<input type="hidden" name="mod" value="abouts" />
<input type="hidden" name="id" value="<?php
echo $_obj['id'];
?>
" />
<table width=95% border="0" class="grid">
	 <tr>
	 	<td  class="row3">公司简介：</td>
	 	<td  class="row1"><textarea cols="100" rows="12" name="abouts"><?php
echo $_obj['abouts'];
?>
</textarea></td>
	 </tr>
	 <tr>
	 	<td  class="row3">联系我们:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="contact"><?php
echo $_obj['contact'];
?>
</textarea></td>
	 </tr>
	 
	 <tr>
	 	<td  class="row3">management:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="management"><?php
echo $_obj['management'];
?>
</textarea></td>
	 </tr>
	   <tr>
	 	<td  class="row3">Service & Support:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="service"><?php
echo $_obj['service'];
?>
</textarea></td>
	 </tr>
	  
	 <tr>
	 	<td  class="row3">R & D:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="rd"><?php
echo $_obj['rd'];
?>
</textarea></td>
	 </tr>
	
	 <tr>
	 	<td  class="row1"  colspan="2" align="center"><input type="submit" name="sub" value="确定"></td>
	 </tr>
	 
	 
 </table> 
</form>

</div>
</div>
</body>
</html>
