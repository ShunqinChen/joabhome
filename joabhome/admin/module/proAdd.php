<?php 
header("content-type:text/html;charset=gb2312");

if ($IN['sub']){
	if(!valitproduct($IN['numbers']))$message->mError('产品添加失败，以有相同产品','proAdd');
	require_once "./comm/Image.class.php"; 
	$Image = new Image();

	$imgname = time().'_'.trim($_FILES[pic][name]);
	$dir = "./productimg/".$imgname;

	//$dir = "./productimg/".time().'_'.trim($_FILES[pic][name]);
	
	if(!copy($_FILES[pic][tmp_name],$dir)){
		echo "上传图片失败";
	}
	
	/*$Image->construct($dir);
	$Image->waterMark($IN['numbers'],0,5,'#0000FF');
	$Image->save();*/
	$chk = $IN['checknum'];
	$pecif = $IN['pecif'];
	$price = $IN['price'];
/*	print_r($chk);
	print_r($pecif);
	print_r($price);
	exit;*/
	$array = array('p_name'=>$IN['p_name'],
				   'p_type_id'=>$IN['p_type_id'],
				   'p_type_new_id'=>$IN['p_type_new_id'],
				   'numbers'=>$IN['numbers'],
//				   'pecif'=>$IN['pecif'],
				   'stock'=>$IN['stock'],
				   'is_new'=>$IN['is_new'],
				   'content'=>$IN['content'],
				   'pic'=>$imgname,
				   'p_up_date'=>time()
					);
	
	$array = $db->trimStr($array);  //去除特殊字符
	if (!$db->insert('pro_info ',$array)){
		$message->mError('产品添加失败~!');
	}else {

		$lastID = $db->GetLastId();
			if($chk){	
				for($i=0; $i<count($chk); $i++){
					$array = array('pecif'=>$pecif[$chk[$i]],
								   'price'=>$price[$chk[$i]],
								   'pid'=>$lastID
									);
					$array = $db->trimStr($array);  //去除特殊字符
//					print_r($array);
					$db->insert('pro_pecif ',$array);
					//$message->mError('产品规格添加成功~!','proInq');
				}
			}
		$message->mError('产品添加成功~!','proInq');
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

$page->assign( 'select', getTitle($rows[0]['p_type_id']) ); 
$page->assign( 'select_new', getTitle_new($rows[0]['p_type_new_id']) ); //得到新品类别列表
$page->assign( 'pic', $rows[0]['pic'] ); 
$page->assign( 'numbers', $rows[0]['numbers'] ); 
$page->assign( 'stock', getStock($rows[0]['stock'] )); 
$page->assign( 'is_new', getIsNew($rows[0]['is_new'] )); 
//$page->assign( 'pecif', getpecif($rows[0]['id'] )); 
$page->assign( 'content', $rows[0]['content'] ); 

$page->output(); 

function getTitle($id){
	global $db;
	
	$sql = "select pid from pro_type where id=".$id;
	$pid = $db->GetOne($sql);
	if($pid==0){
		$string = '<select name="p_type_id"><option value=0 >所属类别选择...</option>';
	}else{
		$string = '<select name="p_type_id"><option value=0 >所属类别选择...</option>';
	}
	$pid = $id;
	$sql = "select * from pro_type where pid=0";
	$rows = $db->GetAll($sql);
	for($i=0;$i<count($rows);$i++){
		
		if($rows[$i]['id']==$pid){
			$string .= "<option value=".$rows[$i]['id']." selected>+".$rows[$i]['type_name']."</option>";
		}else {
			$string .= "<option value=".$rows[$i]['id']." >+".$rows[$i]['type_name']."</option>";
		}
		
		$sql = "select * from pro_type where pid=".$rows[$i]['id'];
		$rows2 = $db->GetAll($sql);
		for($n=0; $n<count($rows2); $n++){
			
			if($rows2[$n]['id']==$pid){
				$string .= "<option value=".$rows2[$n]['id']." selected>|-".$rows2[$n]['type_name']."</option>";
			}else {
				$string .= "<option value=".$rows2[$n]['id']." >|-".$rows2[$n]['type_name']."</option>";
			}
			
			$sql = "select * from pro_type where pid=".$rows2[$n]['id'];
			$rows3 = $db->GetAll($sql);
			for($n3=0; $n3<count($rows3); $n3++){
				
				if($rows3[$n3]['id']==$pid){
					$string .= "<option value=".$rows3[$n3]['id']." selected>|---".$rows3[$n3]['type_name']."</option>";
				}else {
					$string .= "<option value=".$rows3[$n3]['id']." >|---".$rows3[$n3]['type_name']."</option>";
				}
			}
			
		}
	}
	$string .= '</select>';
	return $string;
}


function getStock($stockid){
	if($stockid==1){
		return '<input type="radio" name="stock" value="1" checked>是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="stock" value="2">否';
	}else{
		return '<input type="radio" name="stock" value="1" >是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="stock" value="2" checked>否';
	}
}


function getIsNew($stockid){
	if($stockid=='T'){
		return '<input type="radio" name="is_new" value="T" checked>是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="is_new" value="F">否';
	}else{
		return '<input type="radio" name="is_new" value="T" >是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="is_new" value="F" checked>否';
	}
}

function getpecif($proid){
	global $db;
	$sql = "select * from pro_pecif where pid=".$proid;
	$rows = $db->GetAll($sql);
	for($n=0; $n<10; $n++){
		if($rows[$n]['pecif']){
			$string .= '
			 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="" checked /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="'.$rows[$n]['pecif'].'" /></td>
			    <td class="row2"><input type="text" name="price[]" value="'.$rows[$n]['price'].'" /></td>
			    <td class="row2"><input type="hidden" name="pecifid[]" value="'.$rows[$n]['id'].'" /></td>
			 </tr>';
		}else{
			$string .='
			 <tr>
			    <td class="row2"><input type="checkbox" name="checknum[]" value="" /></td>
			    <td class="row2"><input type="text" name="pecif[]" value="" /></td>
			    <td class="row2"><input type="text" name="price[]" value="" /></td>
			    <td class="row2"><input type="hidden" name="pecifid[]" value="" /></td>
			 </tr>';
		}
	}
	return $string;
}


function valitproduct($title){
	global $db;
	$sql = "select * from pro_info where numbers='".$title."'";
	$rows = $db->GetOne($sql);
	if($rows){
		return false;
	}else{
		return true;
	}
}




function getTitle_new($id){
	global $db;
	
	$sql = "select pid from pro_type_new where id=".$id;
	$pid = $db->GetOne($sql);
	if($pid==0){
		$string = '<select name="p_type_new_id"><option value=0 >新品所属类别选择...</option>';
	}else{
		$string = '<select name="p_type_new_id"><option value=0 >新品所属类别选择...</option>';
	}
	$pid = $id;
	$sql = "select * from pro_type_new where pid=0";
	$rows = $db->GetAll($sql);
	for($i=0;$i<count($rows);$i++){
		
		if($rows[$i]['id']==$pid){
			$string .= "<option value=".$rows[$i]['id']." selected>+".$rows[$i]['type_name']."</option>";
		}else {
			$string .= "<option value=".$rows[$i]['id']." >+".$rows[$i]['type_name']."</option>";
		}
		
		$sql = "select * from pro_type_new where pid=".$rows[$i]['id'];
		$rows2 = $db->GetAll($sql);
		for($n=0; $n<count($rows2); $n++){
			
			if($rows2[$n]['id']==$pid){
				$string .= "<option value=".$rows2[$n]['id']." selected>|-".$rows2[$n]['type_name']."</option>";
			}else {
				$string .= "<option value=".$rows2[$n]['id']." >|-".$rows2[$n]['type_name']."</option>";
			}
			
		/*	$sql = "select * from pro_type_new where pid=".$rows2[$n]['id'];
			$rows3 = $db->GetAll($sql);
			for($n3=0; $n3<count($rows3); $n3++){
				
				if($rows3[$n3]['id']==$pid){
					$string .= "<option value=".$rows3[$n3]['id']." selected>|---".$rows3[$n3]['type_name']."</option>";
				}else {
					$string .= "<option value=".$rows3[$n3]['id']." >|---".$rows3[$n3]['type_name']."</option>";
				}
			}*/
			
		}
	}
	$string .= '</select>';
	return $string;
}
?> 

