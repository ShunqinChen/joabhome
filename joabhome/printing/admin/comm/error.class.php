<?php
class error {
	function mError($numCode,$urlFile='') {
		global $comm;
		switch ($numCode) {
		case 1 :	
			$message =  "该模块不存在或者配置错误!";
			break;
		case 2 :	
			$message =  "你没有该操作权限";
			break;
		case 3 :	
			echo "登录错误";
			return false;
			break;
		case 4 :	
			$message =  "数据更新错误,请检查SQL语句是否正确!";
			break;
		case 5 :	
			$message =  "数据删除错误,请检查SQL语句是否正确!";
			break;
		case 6 :	
			$message =  "数据插入错误,请检查SQL语句是否正确!";
			break;
		case 7 :	
			$message =  "操作成功!";
			break;
		case 8 :	
			$message =  "密码错误!";
			break;
		case 9 :	
			$message =  "写入文件失败!!";
			break;
		case 10 :	
			$message =  "删除文件失败!";
			break;
		case 11 :	
			$message =  "复制文件失败!";
			break;
		case 12 :	
			$message =  "ID=2的记录不能删除!";
			break;
		case 13 :	
			$message =  "E-mail发送失败!";
			break;
		case 14 :	
			$message =  "图片处理失败";
			break;
		default:
			$message = $numCode;
			break;
		}
		
		$page = new SmartTemplate("error.html"); 
		$page->assign( 'rows', $rows ); 
		
		$pageInfo['page_title'] = '信息提示'; //模块标题
		$page->assign('message',$message);
		$page->assign('urlFile',$urlFile);
		$page->assign('pageTitle',$pageInfo);
		$page->output(); 
		


		exit;
	}
}
$message = new  error();
?>