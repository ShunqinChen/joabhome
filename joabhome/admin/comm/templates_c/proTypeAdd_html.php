<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>�ޱ����ĵ�</title>
</head>
<body>
<div class="sectionHeader">��Ʒ�������</div>
<div class="sectionBody">


<form name="form1" action="index.php" method="post" >
<input type="hidden" name="mod" value="proTypeAdd" />
<table width=95% border="0" class="grid">
	 <tr>
	 	<td  class="row3">��Ʒ������ƣ�</td>
	 	<td  class="row1"><input type="text" name="titleName"></td>
	 	<td  class="row3">�������</td>
	 	<td  class="row1"><?php
echo $_obj['select'];
?>
</td>
	 	<td  class="row1"><input type="submit" name="sub" value="ȷ��"></td>
	 </tr>
 </table> 
</form>



</div>
</div>
</body>
</html>
<script language="JavaScript" type="text/javascript">

var frm = new Validator("form1");

frm.addV("titleName", "req", "��Ʒ������Ʋ�Ϊ��");
</script>