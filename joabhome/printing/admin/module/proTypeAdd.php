<?php 
header("content-type:text/html;charset=gb2312");
/**
 * 处理代码开始
 */
//$comm->mysqldbdx->debug=1;
if ($IN['sub']){
	$array = array('type_name'=>$IN['titleName'],
				   'update_time'=>time()
					);
	
	$array = $db->trimStr($array);  //去除特殊字符
	if (!$db->insert('pro_type',$array)){
		$message->mError('产品类别添加失败~!');
	}else {
		$message->mError('产品类别添加成功~!','proTypeInq');
	}
}

/**
 * 处理代码结束
 */


/**
 * body 开始
 */




//$message->mError('sdf','DD');
$page = new SmartTemplate("proTypeAdd.html"); 

/**
 * body 结束
 */
$page->output(); 



?> 

