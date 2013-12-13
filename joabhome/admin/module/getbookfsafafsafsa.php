<?php
header("content-type:text/html;charset=gb2312");
/**
 * body ¿ªÊ¼
 */

$page = new SmartTemplate("getbook.html"); 

$sql = "select * from guestbook order by msgdate desc";

$rows = DataPage(10,$sql);

$item = array('mod'=>'getbookfsafafsafsa','user_name'=>'xiewj');

for($i=0; $i<count($rows); $i++){
	$rows[$i]['msgdate'] = date('Y-m-d',$rows[$i]['msgdate']);
}
$page->assign( 'rows', $rows ); 
$page->assign( 'links', $linkpage->link($item) );
/**
 * body ½áÊø
 */

$page->output(); 



?>