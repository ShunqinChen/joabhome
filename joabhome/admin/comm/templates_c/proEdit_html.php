<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>�ޱ����ĵ�</title>
</head>
<body>
<div class="sectionHeader">��Ʒ����</div>
<div class="sectionBody">


<form name="form1" action="index.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="mod" value="proEdit">
<input type="hidden" name="id" value="<?php
echo $_obj['id'];
?>
">
<table width=100% class="grid">
  <tr>
    <td class="row3" width="103">��Ʒ����:</td>
    <td width="851" class="row1"><input name="p_name" type="text" value="<?php
echo $_obj['p_name'];
?>
"></td>
  </tr>
  
  <tr>
    <td class="row3" width="103">�������:</td>
    <td width="851" class="row1"><?php
echo $_obj['select'];
?>
</td>
  </tr>
  
  <tr>
    <td class="row3" width="103">��ƷͼƬ:</td>
    <td width="851" class="row1"><input name="pic" type="file" ><?php
echo $_obj['pic'];
?>
</td>
  </tr>
  
  <tr>
    <td class="row3" width="103">���:</td>
    <td width="851" class="row1"><input name="numbers" type="text" value="<?php
echo $_obj['numbers'];
?>
"></td>
  </tr>
  
   <tr>
    <td class="row3" width="103">�Ƿ�Ϊ���:</td>
    <td width="851" class="row1"><?php
echo $_obj['stock'];
?>
</td>
  </tr>
  
  <tr>
    <td class="row3" width="103">�Ƿ�Ϊ��Ʒ:</td>
    <td width="851" class="row1"><?php
echo $_obj['is_new'];
?>
</td>
  </tr>
  
  <tr>
    <td class="row3" width="103">��Ʒ�������:</td>
    <td width="851" class="row1"><?php
echo $_obj['select_new'];
?>
</td>
  </tr>
  
	<tr>
  	<td class="row3" width="103">���:</td>
    <td class="row3" >
	    <table>
	    
	    	<!-- <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>-->
	    	<?php
echo $_obj['pecif'];
?>

	    	
			 
 		</table>
    </td>
  </tr>
    
  <tr>
    <td class="row3" width="103">���:</td>
    <td width="851" class="row1"><textarea name="content" cols="50" rows="8"><?php
echo $_obj['content'];
?>
</textarea></td>
  </tr>
  
  <tr>
    <td colspan="2" class="row1" align="center"><input type="submit" name="sub" value="�ύ" /></td>
  </tr>
  </table>
</form>

</div>
</div>
</body>
</html>


<script language="JavaScript" type="text/javascript">

var frm = new Validator("form1");

frm.addV("p_name", "req", "��Ʒ���Ʋ�Ϊ��");
frm.addV("p_type_id", "req", "�������Ϊ��");
frm.addV("numbers", "req", "��Ų�Ϊ��");
//frm.addV("pecif", "req", "���Ϊ��");
//frm.addV("price", "req", "�۸�Ϊ��");
frm.addV("content", "req", "��鲻Ϊ��");
</script>