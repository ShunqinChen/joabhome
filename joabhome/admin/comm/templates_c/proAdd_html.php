<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>无标题文档</title>
</head>
<body>
<div class="sectionHeader">产品添加</div>
<div class="sectionBody">


<form name="form1" action="index.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="mod" value="proAdd">
<table width=100% class="grid">
  <tr>
    <td class="row3" width="103">产品名称:</td>
    <td width="851" class="row1"><input name="p_name" type="text" value="<?php
echo $_obj['p_name'];
?>
"></td>
  </tr>
  
  <tr>
    <td class="row3" width="103">所属类别:</td>
    <td width="851" class="row1"><?php
echo $_obj['select'];
?>
</td>
  </tr>
  
  <tr>
    <td class="row3" width="103">产品图片:</td>
    <td width="851" class="row1"><input name="pic" type="file" ><?php
echo $_obj['pic'];
?>
</td>
  </tr>
  
  <tr>
    <td class="row3" width="103">编号:</td>
    <td width="851" class="row1"><input name="numbers" type="text" value="<?php
echo $_obj['numbers'];
?>
"></td>
  </tr>
  
   <tr>
    <td class="row3" width="103">是否为库存:</td>
    <td width="851" class="row1"><?php
echo $_obj['stock'];
?>
</td>
  </tr>
   
  <tr>
    <td class="row3" width="103">是否为新品:</td>
    <td width="851" class="row1"><?php
echo $_obj['is_new'];
?>
</td>
  </tr>
  
  <tr>
    <td class="row3" width="103">新品所属类别:</td>
    <td width="851" class="row1"><?php
echo $_obj['select_new'];
?>
</td>
  </tr>
  
	<tr>
  	<td class="row3" width="103">规格:</td>
    <td class="row3" >
	    <table>
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="0" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="08x10inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="1" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="12x16inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="2" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="16x20inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="3" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="20x24inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="4" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="20x28inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="5" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="24x36inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="6" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="24x48inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="7" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="30x40inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="8" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="36x48inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
	    	 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="9" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="48x72inch" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			 </tr>
			 
 		</table>
    </td>
  </tr>
    
  <tr>
    <td class="row3" width="103">简介:</td>
    <td width="851" class="row1"><textarea name="content" cols="50" rows="8"><?php
echo $_obj['content'];
?>
</textarea></td>
  </tr>
  
  <tr>
    <td colspan="2" class="row1" align="center"><input type="submit" name="sub" value="提交" /></td>
  </tr>
  </table>
</form>

</div>
</div>
</body>
</html>


<script language="JavaScript" type="text/javascript">

var frm = new Validator("form1");

frm.addV("p_name", "req", "产品名称不为空");
frm.addV("p_type_id", "req", "所属类别不为空");
frm.addV("numbers", "req", "编号不为空");
frm.addV("pecif", "req", "规格不为空");
frm.addV("price", "req", "价格不为空");
frm.addV("content", "req", "简介不为空");
</script>