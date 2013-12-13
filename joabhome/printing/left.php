
<table width="186" border="0" cellspacing="0" cellpadding="0">

  <tr> 

    <td width="186" height="27" background="img/lef1.jpg"><div align="center"> 

        <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr> 

            <td width="12%">&nbsp;</td>

            <td width="88%" height="18" class="cls12">Product list</td>

          </tr>

        </table>

      </div></td>

  </tr>

  
<?php 
require_once "./admin/comm/mysqldb.php"; 

$sql = "select * from pro_type ";
$rows = $db->GetAll($sql);
for($i=0; $i<count($rows); $i++){
echo '<tr> 

    <td height="30" background="img/lef2.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr> 

          <td width="12%">&nbsp;</td>

          <td width="88%" height="18" class="cls12"><a href="/printing/product.php?type_id='.$rows[$i]['id'].'">'.$rows[$i]['type_name'].'</td>

        </tr>

      </table></td>

  </tr>';
}
?>


</table>

