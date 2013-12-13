<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;

if ($IN['sub']){
	
	$array = array('p_name'=>$IN['p_name'],
				   'p_type_id'=>$IN['p_type_id'],
				   'descripiton'=>$IN['descripiton'],
				   'payment'=>$IN['payment'],
				   'delivery'=>$IN['delivery'],
//				   'pic'=>$_FILES[pic][name],
				   'p_up_date'=>time()
					);
	if($_FILES[pic][tmp_name]){
		require_once "./comm/Image.class.php"; 
		$Image = new Image();
		$dir = "./productimg/".trim($_FILES[pic][name]);
		
		if(!copy($_FILES[pic][tmp_name],$dir)){
			echo "上传图片失败";
		}
		
		$array['pic'] = $_FILES[pic][name];
	}
	$item =  'id='.$IN['id'];
	$array = $db->trimStr($array);  //去除特殊字符
	if (!$db->update('pro_info',$array,$item)){
		$message->mError('产品修改失败~!');
	}else {
		$message->mError('产品修改成功~!','proInq');
	}
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */




//$message->mError('sdf','DD');
$sql = "select * from pro_info where id=".$IN['id'];
$rows = $db->GetAll($sql);
$page = new SmartTemplate("proEdit.html"); 
$page->assign( 'id', $IN['id'] ); 
$page->assign( 'p_name', $rows[0]['p_name'] ); 

$page->assign( 'select', getTitle($rows[0]['p_type_id']) ); 
$page->assign( 'pic', $rows[0]['pic'] ); 
$page->assign( 'descripiton', $rows[0]['descripiton'] ); 
$page->assign( 'payment', $rows[0]['payment']) ; 
$page->assign( 'delivery', $rows[0]['delivery'] ); 

/**
 * body 结束
 */
$page->output(); 

function getTitle($id){
	global $db;
	
	$sql = "select id from pro_type where id=".$id;
	$pid = $db->GetOne($sql);
	if($pid==0){
		$string = '<select name="p_type_id"><option value=0 >所属类别选择...</option>';
	}else{
		$string = '<select name="p_type_id"><option value=0 >所属类别选择...</option>';
	}
	$pid = $id;
	$sql = "select * from pro_type ";
	$rows = $db->GetAll($sql);
	for($i=0;$i<count($rows);$i++){
		
		if($rows[$i]['id']==$pid){
			$string .= "<option value=".$rows[$i]['id']." selected>+".$rows[$i]['type_name']."</option>";
		}else {
			$string .= "<option value=".$rows[$i]['id']." >+".$rows[$i]['type_name']."</option>";
		}
	}
	$string .= '</select>';
	return $string;
}


?> 

