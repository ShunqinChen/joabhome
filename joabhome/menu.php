<script type="text/javascript">

//<![CDATA[
//open menu
function ot(id,flag) {

	if (flag!=true && document.getElementById('openst').value!='' && document.getElementById('openst').value!=id) {

		ot(document.getElementById('openst').value,true);

	}

	var t =    document.getElementById(id);

	var subt = document.getElementById(id + '_s');

	var tm = document.getElementById(id + '_m');

	var tu = document.getElementById(id + '_p');

	var display = subt.style.display;

	if (display=='block') {

		t.className = 'm1';

		tm.className = '';

		subt.style.display = 'none';

		tu.src="template/images/jia.gif";

		document.getElementById('openst').value = '';

	} else {

		t.className = 'm1  m1_bg';

		tm.className = 'h3_b2';

		subt.style.display = 'block';

		tu.src="template/images/juan.gif";

		document.getElementById('openst').value = id;

	}

}

function go (fid) {

	op_url = "./product.php?type_id="+fid;

//	window.open(op_url,'');
	window.location.href=op_url;

}

//]]> 

</script>  

<input id="openst" type="hidden" value="" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php


//查询顶级分类
$sql = "select * from pro_type where pid=0 order by sorttype desc";

$rows = $db->GetAll($sql);

$b=1;


//将顶级分类循环输出
for($i=0; $i<count($rows); $i++){
	
	echo "<tr><td class=cls13 algin=center width='150' height='28' background=img/cl1.gif style='background-position: center; background-repeat: no-repeat;'><div align=center>".$rows[$i]['type_name']."</div></td></tr>"; //谢稳金加
	
	
	//查询二级分类
 	$sql_0 = "select * from pro_type where pid=".$rows[$i]['id'];

 	$rows0 = $db->GetAll($sql_0);
	//二级分类循环：
	for($y=0; $y<count($rows0); $y++){

		$b=$b+1;

		echo '<tr>
    			<td><table id="t_'.$b.'" border="0" align="center" cellpadding="0" cellspacing="0">
        				<tr id="t_'.$b.'_m"> 
         					<td width=30 align=center><img src="img/mark.gif" width="5" height="5"></td>
         					<td width="178" height="22"> <div align="left"> ';
		
		
						//<a href="javascript:go('2')">Sal. Oppenheim</a>
						
						//查询三级分类
						$sql_1 = "select * from pro_type where pid=".$rows0[$y]['id'];
						$rows2 = $db->GetAll($sql_1);
						
						//如果有属于这个类别的产品就展开，否则就直接链接到些类别产品
						if($rows2){
							if($b==9||$b==2){
								echo    '<p ><a href="javascript:ot(\'t_'.$b.'\')" class="cls12">'.$rows0[$y]['type_name'].'</a> </p>';
							}else{
						    	echo    '<p ><a href="javascript:ot(\'t_'.$b.'\')" class="cls12">'.$rows0[$y]['type_name'].' </a> </p>';
							}
						}else{
							if($rows0[$y]['id']==3452){
								echo '<p ><a href="javascript:go(\''.$rows0[$y]['id'].'\')" class="cls12">'.$rows0[$y]['type_name'].'</a></p>';
							}else{
								echo '<p ><a href="javascript:go(\''.$rows0[$y]['id'].'\')" class="cls12">'.$rows0[$y]['type_name'].'</a></p>';
							}
						}
           echo ' </div></td>

        </tr>

        <tr id="t_'.$b.'_s" style="display:none;"> 
			<td></td>
          	<td height="70" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">';

          

       /* $sql_1 = "select * from pro_type where pid=".$rows0[$y]['id'];

		$rows2 = $db->GetAll($sql_1);*/

		

              echo '<tr > 

                <td width="13%" height="16"> <div align="right"><img src="img/line_tri.gif" width="19" height="16"></div></td>

                <td width="4%"  id="t_'.$b.'_p" alt="点击" onClick="ot(\'t_'.$b.'\','.$b.')"><img src="img/mark.gif" width="5" height="5"></td>

                <td width="83%" class="cls12"><a href="./product.php?type_id='.$rows2[0]['id'].'" class=cls12>'.$rows2[0]['type_name'].'</a></td>

              </tr>';

             for($n=1; $n<count($rows2); $n++){ 

              echo '<tr> 

                <td width="13%"><div align="right"><img src="img/line_tri.gif" width="19" height="16"></div></td>

                <td width="4%"><img src="img/mark.gif" width="5" height="5"></td>

                <td width="83%" class="16"><a href="./product.php?type_id='.$rows2[$n]['id'].'" class=cls12>'.$rows2[$n]['type_name'].'</a></td>

              </tr>';

             }

              

              

            echo '</table></td>

        </tr>

      </table></td>

  </tr>

  

  

  </td></tr>'; //谢稳金加

	}

}

?>

  

</table>

<script type="text/javascript">

//<![CDATA[

//ot('t_1');

//]]>

</script>