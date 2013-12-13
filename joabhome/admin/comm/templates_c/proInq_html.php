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
<input type="hidden" name="mod" value="proInq" />
请输入产品编号：<input type="text" name="numbers" value="" />
<input type="submit" name="sub" value="查询" />
</form>
<table width=95% border="0" class="grid">

  <tr>
    <td class="gridHeader">产品名称</td>
    <td class="gridHeader">所属类别</td>
    <td class="gridHeader">产品编号</td>
    <td class="gridHeader">点击量</td>
<!--    <td class="gridHeader">日期</td>-->
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
echo $_obj['p_name'];
?>
</td>
    <td class="row2"><?php
echo $_obj['p_type_id'];
?>
</td>
    <td class="row2"><?php
echo $_obj['numbers'];
?>
</td>
    <td class="row2"><?php
echo $_obj['hkfm'];
?>
</td>
<!--    <td class="row2"><?php
echo $_obj['p_up_date'];
?>
</td>-->
	<td class="row2"><a href="index.php?mod=pecifInq&id=<?php
echo $_obj['id'];
?>
">[规格]</a>
	<a href='#' onclick="if(confirm('确定删除！')) location.href='index.php?mod=proDel&id=<?php
echo $_obj['id'];
?>
'">[册除]</a>&nbsp;<a href="index.php?mod=proEdit&id=<?php
echo $_obj['id'];
?>
">[修改]</a></td>
<!--	<a href="index.php?mod=proDel&id=<?php
echo $_obj['id'];
?>
">[删除]</a>-->
  </tr>
  <?php
}
$_obj=$_stack[--$_stack_cnt];}
?>
  <tr><td class="row1" colspan="6"><?php
echo $_obj['links'];
?>
<form name="form222" action="index.php" method="post" >
<input type="hidden" name="mod" value="proInq" />
<input type="text" name="pager" value="" size="4"/>
<input type="submit" name="sub" value="go" />
</form></td></tr>
</table>


</div>
</div>
</body>
</html>