<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>�ޱ����ĵ�</title>
</head>
<body>
<div class="sectionHeader">��Ʒ�б�</div>
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
    <td class="gridHeader">���</td>
    <td class="gridHeader">�۸�</td>
  </tr> 
  
  <?php
echo $_obj['tr'];
?>

  
  <tr>
    <td class="row2" colspan="3" align="center"><input type="submit" name="sub" value="�ύ"></td>
  </tr>
</table>
</form>

</div>
</div>
</body>
</html>