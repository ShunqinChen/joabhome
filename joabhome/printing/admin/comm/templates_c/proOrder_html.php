<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel='stylesheet' type='text/css' href="/admin/other/css.css"></link>
<script language="JAVASCRIPT" src="/admin/other/js.js"></script>
<title>�ޱ����ĵ�</title>
</head>
<body>
<div class="sectionHeader">�����б�</div>
<div class="sectionBody">

<form name="form2" action="index.php" method="post" >
<table width=95% border="0" class="grid">

  <tr>
    <td class="gridHeader">������</td>
    <td class="gridHeader">��Ʒ���</td>
    <td class="gridHeader">�����û�</td>
    <td class="gridHeader">����ʱ��</td>
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
echo $_obj['ordernum_no'];
?>
</td>
    <td class="row2"><a href="/admin/index.php?mod=proInq&numbers=<?php
echo $_obj['proid'];
?>
"><?php
echo $_obj['proid'];
?>
</a></td>
    <td class="row2"><a href="/admin/index.php?mod=member&userid=<?php
echo $_obj['userid'];
?>
"><?php
echo $_obj['username'];
?>
</td>
    <td class="row2"><?php
echo $_obj['orderTime'];
?>
</td>
    <td class="row2"><a href="/admin/index.php?mod=proxx&ordernum=<?php
echo $_obj['ordernum_no'];
?>
" >[��ϸ]</a>
    <a href='#' onclick="if(confirm('ȷ��ɾ����')) location.href='index.php?mod=orderDel&ordernum=<?php
echo $_obj['ordernum_no'];
?>
'">[���]</a></td>
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