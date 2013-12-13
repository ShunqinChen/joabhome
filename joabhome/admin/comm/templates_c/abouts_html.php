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
	 	<td  class="row1"><textarea cols="100" rows="10" name="brief"><?php
echo $_obj['brief'];
?>
</textarea></td>
	 </tr>
	 
	 <tr>
	 	<td  class="row3">Service Center:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="service"><?php
echo $_obj['service'];
?>
</textarea></td>
	 </tr>
	  
	 <tr>
	 	<td  class="row3">FAQ:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="faq"><?php
echo $_obj['faq'];
?>
</textarea></td>
	 </tr>
	 	  
	 <tr>
	 	<td  class="row3">News:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="news"><?php
echo $_obj['news'];
?>
</textarea></td>
	 </tr>
	 	  
	 <tr>
	 	<td  class="row3">PayMent:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="payment"><?php
echo $_obj['payment'];
?>
</textarea></td>
	 </tr>
	 	  
	 <tr>
	 	<td  class="row3">Shippment:</td>
	 	<td  class="row1"><textarea cols="100" rows="10" name="shippment"><?php
echo $_obj['shippment'];
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
