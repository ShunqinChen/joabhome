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
	
	$array = $db->trimStr($array);  //ȥ�������ַ�
	if (!$db->insert('pro_type',$array)){
		$message->mError('��Ʒ������ʧ��~!');
	}else {
		$message->mError('��Ʒ�����ӳɹ�~!','proTypeAdd');
	}
}

/**
 * ����������
 */


/**
 * body ��ʼ
 */




//$message->mError('sdf','DD');
$page = new SmartTemplate("proTypeAdd.html"); 
$page->assign( 'select', getTitle() ); 

/**
 * body ����
 */
$page->output(); 

function getTitle(){
	global $db;
	$string = '<select name="pTitleName"><option value=0 >������Ʒ���...</option>';
	$sql = "select * from pro_type where pid=0";
	$rows = $db->GetAll($sql);
	for($i=0;$i<count($rows);$i++){
		$string .= "<option value=".$rows[$i]['id']." >+".$rows[$i]['type_name']."</option>";
		
		$sql = "select * from pro_type where pid=".$rows[$i]['id'];
		$rows2 = $db->GetAll($sql);
		for($n=0; $n<count($rows2); $n++){
			$string .="<option value=".$rows2[$n]['id']." >|-".$rows2[$n]['type_name']."</option>";
			
			$sql = "select * from pro_type where pid=".$rows2[$n]['id'];
			$rows3 = $db->GetAll($sql);
			for($n3=0; $n3<count($rows3); $n3++){
				$string .="<option value=".$rows3[$n3]['id']." >��|--".$rows3[$n3]['type_name']."</option>";
			}
			
		}
	}
	$string .= '</select>';
	return $string;
}



?> 

