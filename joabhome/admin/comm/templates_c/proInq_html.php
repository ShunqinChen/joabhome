<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<title>�ޱ����ĵ�</title>
</head>
<body>
<div class="sectionHeader">��Ʒ�б�</div>
<div class="sectionBody">

<form name="form2" action="index.php" method="post" >
<input type="hidden" name="mod" value="proInq" />
�������Ʒ��ţ�<input type="text" name="numbers" value="" />
<input type="submit" name="sub" value="��ѯ" />
</form>
<table width=95% border="0" class="grid">

  <tr>
    <td class="gridHeader">��Ʒ����</td>
    <td class="gridHeader">�������</td>
    <td class="gridHeader">��Ʒ���</td>
    <td class="gridHeader">�����</td>
<!--    <td class="gridHeader">����</td>-->
	<td class="gridHeader">����</td>
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
">[���]</a>
	<a href='#' onclick="if(confirm('ȷ��ɾ����')) location.href='index.php?mod=proDel&id=<?php
echo $_obj['id'];
?>
'">[���]</a>&nbsp;<a href="index.php?mod=proEdit&id=<?php
echo $_obj['id'];
?>
">[�޸�]</a></td>
<!--	<a href="index.php?mod=proDel&id=<?php
echo $_obj['id'];
?>
">[ɾ��]</a>-->
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