<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="./other/css.css"></link>
<script language="JAVASCRIPT" src="./other/js.js"></script>
<title>无标题文档</title>
</head>
<body>
<div class="sectionHeader">订单号：<?php
echo $_obj['ordernum'];
?>
</div>
<div class="sectionBody">

<form name="form2" action="index.php" method="post" >
<table width=95% border="0" class="grid">

  <tr>
<!--    <td class="gridHeader">订单号</td>-->
    <td class="gridHeader">产品编号</td>
    <td class="gridHeader">规格</td>
    <td class="gridHeader">价格</td>
    <td class="gridHeader">数量</td>
    <td class="gridHeader">总价</td>
<!--    <td class="gridHeader">操作</td>-->
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
<!--    <td class="row2"><?php
echo $_obj['ordernum_no'];
?>
</td>-->
    <td class="row2"><?php
echo $_obj['proid'];
?>
</td>
    <td class="row2"><?php
echo $_obj['pecif'];
?>
inch</td>
    <td class="row2"><?php
echo $_obj['price'];
?>
</td>
    <td class="row2"><?php
echo $_obj['nums'];
?>
</td>
    <td class="row2"><?php
echo $_obj['oneprice'];
?>
</td>
<!--    <td class="row2"><?php
echo $_obj['orderTime'];
?>
</td>-->
<!--    <td class="row2"><a href="/admin/index.php?mod=proxx&ordernum=<?php
echo $_obj['ordernum_no'];
?>
">[详细]</td>-->
  </tr>
  <?php
}
$_obj=$_stack[--$_stack_cnt];}
?>
  <tr><td class="row1" colspan="5" align="right">总价:<?php
echo $_obj['allprice'];
?>
</td></tr>
  <tr><td class="row1" colspan="5"><?php
echo $_obj['links'];
?>
</td></tr>
</table>
</form>

</div>
</div>
</body>
</html>
