<?php
class mysqldb {
	
	var $hostname = 'localhost';
	var $username = 'joabhome';
	var $password = '19820909ljw';
//	var $password = '5736811';
	var $datebase = 'joabhome_jiankuncai';
	function  __construct(){
		//$path = '/home/joabhome/public_html/admin/';	//上线请解开注释
		//$path = './admin/';
		$path = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR;	//精确到绝对路径
		$fp = fopen($path.'dataconfig.ini','r');	//读取文件流
		$string = fread($fp,1000);
		$adminarray = explode('|',$string);
		fclose($fp);//关闭文件流
		$this->username = $adminarray[0];
		$this->password = $adminarray[1];
//		echo $this->username.'--'.$this->password;
		mysql_connect($this->hostname, $this->username, $this->password)    or die(" 不能连接到服务器 " . mysql_error()); 
		mysql_select_db($this->datebase) or die("不能连接到数据库");
	}

	
	/**
	 * 取得二维数组
	 * @param $sql 需要执行的sql语句
	 * 	
	 */
	public static function GetAll($sql){
		
		$result = mysql_query($sql);
	//	mysql_fetch_array($result,MYSQL_BOTH);
		while ($line = mysql_fetch_array($result,MYSQL_BOTH)){
			$array[] = $line;
		}
		return $array;
	}
	

	
	/**
	 * 取得一个字段值
	 * @param $sql 需要执行的sql语句
	 * 	
	 */
	public static function GetOne($sql){
		$sql = $sql." limit 1";
		$result = mysql_query($sql);
		$rows = mysql_fetch_row($result);
		if($rows){
			return $rows[0];
		}else{
			return false;
		}
	}
	
	
	/**
	 * 向表中插入记录
	 * @param $talbe 表名
	 * @param $fields 所要插入的数组值
	 * @param $db 数据源，可选择不同的数据库连接信息
	 * @return true/false
	 */
	public static function insert($table,$fields){
		global $comm;
		$key = '(';
		$va = '(';
		foreach ($fields as $k => $y ) {
			$key.= trim($k).",";
			$va.= trim($y).",";
		}
		$key = rtrim($key,',').")";
		$va = rtrim($va,',').")";
		$sql = "insert into $table $key values $va";
//		echo $sql.'<br>';
	
			if (!mysql_query($sql))	return false;
			return true;
	}
	
	public static function GetLastId(){
		//echo mysql_insert_id();
		return mysql_insert_id();
		
	}
	
	
	/**
	 * 更新表中记录
	 * @param $talbe 表名
	 * @param $fields 所要更新的数组值
	 * @param $item 更新的条件
	 * @param $db 数据源，可选择不同的数据库连接信息
	 * @return true/false
	 */
	function update($table,$fields,$item){
		global $comm;
		$string = ',';
		foreach ($fields as $k => $y ) {
			$string.= $k.'='.$y.',';
		}
		$key = trim($string,',');
		$sql = "update $table set $key where $item";
//		echo $sql.'<br>';
		if (!mysql_query($sql))	return false;
		return true;
	}
	
	function Execute($valsql){
		if (!mysql_query($valsql))	return false;
		return true;
		
	}
	
	
	
	/**
	 * 去除特殊字符
	 * @param $IN 全局参数变量
	 * @param $arr 数组
	 * @param $comm 全局对像处理变量
	 * @return $IN
	 */
	function trimStr($arr=0){
		$arr==0?$IN:$IN=$arr;
		if(is_array($IN)){
			foreach ($IN as $k=>$y){
				$IN[$k] = $this->delStr($y,get_magic_quotes_gpc());
			}
		}
		return $IN;
	}
	
    /*去掉特殊字符	*/
	function delStr($s,$magic_quotes=false)	{	
		//$nofixquotes=false;
		if ($this->noNullStrings && strlen($s)==0)$s = ' ';
		if (!$magic_quotes) {	
			if ($this->replaceQuote[0] == '\\'){
				$s = str_replace('\\','\\\\',$s);
			}
			return  "'".str_replace("'",$this->replaceQuote,$s)."'";
		}
		
		// undo magic quotes for "
		$s = str_replace('\\"','"',$s);
		
		$s = str_replace('\\\\','\\',$s);
		return "'".str_replace("\\'",$this->replaceQuote,$s)."'";
	}
	
	/*取得总数	*/
	function RecordCount($sql){
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}
	
	
	/**Delete data from table**/
	function Delete($sql,$param){
		
		$execSql = ",";
		
		if($param.is_array()){
			foreach ( $param as $value ) {
       			$execSql = $execSql + mysql_real_escape_string($value);
			}
			
		}else if($param.is_string()){
			$execSql = $param;
		}
		$execSql = $sql.$execSql;
		
		mysql_query(sprintf($execSql));
		$num_rows = mysql_affected_rows();
		return $num_rows;
	}
}

$db = new mysqldb();

/*$sql = "select user_name from sdf ";
$rows = $db->GetOne($sql);*/
/*
$array = array('user_name'=>'user2222name',
				   'sex'=>1
					);
$array = $db->trimStr($array);  //去除特殊字符
//if (!$db->insert('sdf',$array)){
$item = 'id=22187';  //更新的条件
if (!$db->update('sdf',$array,$item)){
		
	echo "no sec";
}else {
	echo "yes sec";
}
	
//echo ($rows);*/
?>