<?php 
header("content-type:text/html;charset=gb2312");
/**
 * ������뿪ʼ
 */
//$comm->mysqldbdx->debug=1;
if ($IN['sub']){
	$array = array('type_name'=>$IN['titleName'],
				   'pid'=>$IN['pTitleName'],
				   'update_time'=>time()
					);
	$item =  'id='.$IN['id'];
	$array = $db->trimStr($array);  //ȥ�������ַ�
	if (!$db->update('pro_type_new',$array,$item)){
		$message->mError('�²�Ʒ����޸�ʧ��~!');
	}else {
		$message->mError('�²�Ʒ����޸ĳɹ�~!','proTypeInq_new');
	}
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */




//$message->mError('sdf','DD');
$sql = "select * from pro_type_new where id=".$IN['id'];
$rows = $db->GetAll($sql);
$page = new SmartTemplate("proTypeEdit_new.html"); 
$page->assign( 'id', $IN['id'] ); 
$page->assign( 'title', $rows[0]['type_name'] ); 
$page->assign( 'select', getTitle($IN['id']) ); 

/**
 * body ����
 */
$page->output(); 

function getTitle($id){
	global $db;
	
	$sql = "select pid from pro_type_new where id=".$id;
	$pid = $db->GetOne($sql);
	if($pid==0){
		$string = '<select name="pTitleName"><option value=0 selected>����Ŀ���...</option>';
	}else{
		$string = '<select name="pTitleName"><option value=0 >����Ŀ���...</option>';
	}
	
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
			
			$sql = "select * from pro_type_new where pid=".$rows2[$n]['id'];
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



?> 

