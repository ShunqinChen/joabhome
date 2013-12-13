<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<title>无标题文档</title>
</head>
<body>
<div class="sectionHeader">产品列表</div>
<div class="sectionBody">


<form name="form2" action="index.php" method="post" >
<table width=95% border="0" class="grid">

  <tr>
    <td class="gridHeader">网名</td>
    <td class="gridHeader">Email</td>
    <td class="gridHeader">邮编</td>
    <td class="gridHeader">电话</td>
    <td class="gridHeader">时间</td>
    <td class="gridHeader">内容</td>
    <td class="gridHeader">操作</td>

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
echo $_obj['alias'];
?>
</td>
    <td class="row2"><?php
echo $_obj['email'];
?>
</td>
    <td class="row2"><?php
echo $_obj['zipcode'];
?>
</td>
    <td class="row2"><?php
echo $_obj['tel'];
?>
</td>
    <td class="row2"><?php
echo $_obj['msgdate'];
?>
</td>
	<td class="row2"><?php
echo $_obj['msg'];
?>
</td>
	<td class="row2"><a href='#' onclick="if(confirm('确定删除！')) location.href='index.php?mod=getbookdel&id=<?php
echo $_obj['id'];
?>
'"><img src='other/images/del.png' /></a></td>
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