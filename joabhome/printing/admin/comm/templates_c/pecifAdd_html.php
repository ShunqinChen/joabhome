<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>无标题文档</title>
</head>
<body>
<div class="sectionHeader">产品列表</div>
<div class="sectionBody">


<form name="form2" action="index.php" method="post" >
<input type="hidden" name="mod" value="pecifAdd">
<input type="hidden" name="pid" value="<?php
echo $_obj['pid'];
?>
">
<table width=95% border="0" class="grid">

  <tr>
    <td class="gridHeader">&nbsp;</td>
    <td class="gridHeader">规格</td>
    <td class="gridHeader">价格</td>
  </tr> 
  
  <?php
echo $_obj['tr'];
?>

  
  <tr>
    <td class="row2" colspan="3" align="center"><input type="submit" name="sub" value="提交"></td>
  </tr>
</table>
</form>

</div>
</div>
</body>
</html>
