<?php 
header("content-type:text/html;charset=gb2312");


	
if($IN['sub']&&$IN['checknum']){	
	$sendId = $IN['pid'];
	for($i=0; $i<count($IN['checknum']); $i++){
		$array = array('pecif'=>$IN['pecif'][$i],
					   'price'=>$IN['price'][$i],
					   'pid'=>$IN['pid']
						);
		$array = $db->trimStr($array);  //ȥ�������ַ�
		$db->insert('pro_pecif ',$array);
		//$message->mError('��Ʒ�����ӳɹ�~!','proInq');
	}
	$message->mError('��Ʒ�����ӳɹ�~!','pecifInq&id='.$sendId);
}



if ($IN['pecifnum']){
	for($i=0; $i<($IN['pecifnum']); $i++){
		$string .=' <tr>
					    <td class="row2"><input type="checkbox" name="checknum[]" value="" /></td>
					    <td class="row2"><input type="text" name="pecif[]" value="" /></td>
					    <td class="row2"><input type="text" name="price[]" value="" /></td>
 					 </tr>';
	}
	
}
$page = new SmartTemplate("pecifAdd.html"); 
$page->assign( 'tr', $string ); 
$page->assign( 'pid', $IN['id'] ); 
$page->output(); 




?> 

