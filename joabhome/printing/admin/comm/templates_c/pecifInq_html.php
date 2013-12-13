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

<form name="formpcief" action="index.php" method="post" >
<input type="hidden" name="mod" value="pecifAdd">
<input type="hidden" name="id" value="<?php
echo $_obj['id'];
?>
">
添加几个规格<input type="text" name="pecifnum" value="" />
<input type="submit" name="subpecif" value="添加规格" />
</form>

<form name="form2" action="index.php" method="post" >
<table width=95% border="0" class="grid">

  <tr>
    <td class="gridHeader">规格</td>
    <td class="gridHeader">价格</td>
  </tr> 
  <?php
if (!empty($_obj['rows'])){
if (!is_array($_obj['rows']))
$_obj['rows']=array(array('rows'=>$_obj['rows']));
$_tmp_arr_keys=array_keys($_obj['rows']);
if ($_tmp_arr_keys[0]!='0')
$_obj['rows']=array(0=>$_obj['rows']);
$_stack[$_stack_cnt++]=$_obj;
foreach ($_obj['rows'] as $rowcnt=>$rows) {
$rows['ROWCNT']=$rowcnt;
$rows['ALTROW']=$rowcnt%2;
$rows['ROWBIT']=$rowcnt%2;
$_obj=&$rows;
?> 
  <tr>
    <td class="row2"><?php
echo $_obj['pecif'];
?>
</td>
    <td class="row2"><?php
echo $_obj['price'];
?>
</td>
  </tr>
  <?php
}
$_obj=$_stack[--$_stack_cnt];}
?>
  <tr><td class="row1" colspan="4"><?php
echo $_obj['links'];
?>
</td></tr>
</table>
</form>

</div>
</div>
</body>
</html>
<script language="JavaScript" type="text/javascript">

var frm = new Validator("formpcief");

frm.addV("pecifnum", "req", "添加几个规格不为空");
</script>