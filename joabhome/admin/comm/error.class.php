<?php
class error {
	function mError($numCode,$urlFile='') {
		global $comm;
		switch ($numCode) {
		case 1 :	
			$message =  "��ģ�鲻���ڻ������ô���!";
			break;
		case 2 :	
			$message =  "��û�иò���Ȩ��";
			break;
		case 3 :	
			echo "��¼����";
			return false;
			break;
		case 4 :	
			$message =  "���ݸ��´���,����SQL����Ƿ���ȷ!";
			break;
		case 5 :	
			$message =  "����ɾ������,����SQL����Ƿ���ȷ!";
			break;
		case 6 :	
			$message =  "���ݲ������,����SQL����Ƿ���ȷ!";
			break;
		case 7 :	
			$message =  "�����ɹ�!";
			break;
		case 8 :	
			$message =  "�������!";
			break;
		case 9 :	
			$message =  "д���ļ�ʧ��!!";
			break;
		case 10 :	
			$message =  "ɾ���ļ�ʧ��!";
			break;
		case 11 :	
			$message =  "�����ļ�ʧ��!";
			break;
		case 12 :	
			$message =  "ID=2�ļ�¼����ɾ��!";
			break;
		case 13 :	
			$message =  "E-mail����ʧ��!";
			break;
		case 14 :	
			$message =  "ͼƬ����ʧ��";
			break;
		default:
			$message = $numCode;
			break;
		}
		
		$page = new SmartTemplate("error.html"); 
		$page->assign( 'rows', $rows ); 
		
		$pageInfo['page_title'] = '��Ϣ��ʾ'; //ģ�����
		$page->assign('message',$message);
		$page->assign('urlFile',$urlFile);
		$page->assign('pageTitle',$pageInfo);
		$page->output(); 
		


		exit;
	}
}
$message = new  error();
?>