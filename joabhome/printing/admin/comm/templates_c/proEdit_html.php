<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<script language="javascript" type="text/javascript" src="/printing/admin/comm/tiny_mce/tiny_mce.js"></script>
<script language="JavaScript" type="text/javascript">
tinyMCE.init({
	mode : "exact",
	language:"en",
	elements : "descripiton",
	theme : "advanced",
	plugins : "safari,pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
	theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,forecolor,backcolor,|,emotions,link,media,image,|,code",
	theme_advanced_buttons2 : "",
	theme_advanced_buttons3 : "",	
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	force_br_newlines : true,
	content_css : "/printing/admin/comm/tiny_mce/timy_content.css"
});
</script>
<title>无标题文档</title>
</head>
<body>
<div class="sectionHeader">产品修改</div>
<div class="sectionBody">


<form name="form1" action="index.php" method="post" enctype="multipart/form-data" >
<input type="hidden" name="mod" value="proEdit">
<input type="hidden" name="id" value="<?php
echo $_obj['id'];
?>
">
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
    <td class="row3" width="103">描述:</td>
    <td width="851" class="row1"><textarea name="descripiton" id="descripiton" cols="50" rows="5" ><?php
echo $_obj['descripiton'];
?>
</textarea></td>
  </tr>
  
   <tr>
    <td class="row3" width="103">付款方式:</td>
    <td width="851" class="row1"><input name="payment" type="text" value="<?php
echo $_obj['payment'];
?>
"></td>
  </tr>
   
   <tr>
    <td class="row3" width="103">运输方式:</td>
    <td width="851" class="row1"><input name="delivery" type="text" value="<?php
echo $_obj['delivery'];
?>
"></td>
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
//frm.addV("pecif", "req", "规格不为空");
//frm.addV("price", "req", "价格不为空");
frm.addV("content", "req", "简介不为空");
</script>