<?php 
header("content-type:text/html;charset=gb2312");

if ($IN['sub']){
	
	if(!valitproduct($IN['p_name']))$message->mError('��Ʒ���ʧ�ܣ�������ͬ��Ʒ','proAdd');
	require_once "./comm/Image.class.php"; 
	$Image = new Image();
	$dir = "./productimg/".trim($_FILES[pic][name]);
	
	if(!copy($_FILES[pic][tmp_name],$dir)){
		echo "�ϴ�ͼƬʧ��";
	}
	

	$array = array('p_name'=>$IN['p_name'],
				   'p_type_id'=>$IN['p_type_id'],
				   'descripiton'=>$IN['descripiton'],
				   'payment'=>$IN['payment'],
				   'delivery'=>$IN['delivery'],
				   'pic'=>$_FILES[pic][name],
				   'p_up_date'=>time()
					);
	
	$array = $db->trimStr($array);  //ȥ�������ַ�
	if (!$db->insert('pro_info ',$array)){
		$message->mError('��Ʒ���ʧ��~!');
	}else {
		$message->mError('��Ʒ��ӳɹ�~!','proInq');
	}
}




/*$page = new SmartTemplate("proAdd.html"); 
$page->assign( 'rows', $rows ); 
$page->assign( 'product_type', getTitle() ); 
$page->output(); 
*/

//$message->mError('sdf','DD');
$sql = "select * from pro_info order by id desc limit 1";
$rows = $db->GetAll($sql);
$page = new SmartTemplate("proAdd.html"); 
$page->assign( 'id', $IN['id'] ); 
$page->assign( 'p_name', $rows[0]['p_name'] ); 

$page->assign( 'select', getTitle() ); 
$page->assign( 'pic', $rows[0]['pic'] ); 

$page->output(); 

function getTitle(){
	global $db;
	
	$string = '<select name="p_type_id"><option value=0 >�������ѡ��...</option>';
	$sql = "select * from pro_type";
	$rows = $db->GetAll($sql);
	for($i=0;$i<count($rows);$i++){
		$string .= "<option value=".$rows[$i]['id']." >+".$rows[$i]['type_name']."</option>";
	}
	$string .= '</select>';
	return $string;
}

function valitproduct($title){
	global $db;
	$sql = "select * from pro_info where p_name='".$title."'";
	$rows = $db->GetOne($sql);
	if($rows){
		return false;
	}else{
		return true;
	}
}
?> 

