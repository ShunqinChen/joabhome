<?php
class mysqldb {
	
	var $hostname = 'localhost';
	var $username = 'joabhome';
	var $password = '19820909ljw';
//	var $password = '5736811';
	var $datebase = 'joabhome_jiankuncai';
	function  __construct(){
		//$path = '/home/joabhome/public_html/admin/';	//������⿪ע��
		//$path = './admin/';
		$path = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR;	//��ȷ������·��
		$fp = fopen($path.'dataconfig.ini','r');	//��ȡ�ļ���
		$string = fread($fp,1000);
		$adminarray = explode('|',$string);
		fclose($fp);//�ر��ļ���
		$this->username = $adminarray[0];
		$this->password = $adminarray[1];
//		echo $this->username.'--'.$this->password;
		mysql_connect($this->hostname, $this->username, $this->password)    or die(" �������ӵ������� " . mysql_error()); 
		mysql_select_db($this->datebase) or die("�������ӵ����ݿ�");
	}

	
	/**
	 * ȡ�ö�ά����
	 * @param $sql ��Ҫִ�е�sql���
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
	 * ȡ��һ���ֶ�ֵ
	 * @param $sql ��Ҫִ�е�sql���
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
	 * ����в����¼
	 * @param $talbe ����
	 * @param $fields ��Ҫ���������ֵ
	 * @param $db ����Դ����ѡ��ͬ�����ݿ�������Ϣ
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
	 * ���±��м�¼
	 * @param $talbe ����
	 * @param $fields ��Ҫ���µ�����ֵ
	 * @param $item ���µ�����
	 * @param $db ����Դ����ѡ��ͬ�����ݿ�������Ϣ
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
	 * ȥ�������ַ�
	 * @param $IN ȫ�ֲ�������
	 * @param $arr ����
	 * @param $comm ȫ�ֶ��������
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
	
    /*ȥ�������ַ�	*/
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
	
	/*ȡ������	*/
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
$array = $db->trimStr($array);  //ȥ�������ַ�
//if (!$db->insert('sdf',$array)){
$item = 'id=22187';  //���µ�����
if (!$db->update('sdf',$array,$item)){
		
	echo "no sec";
}else {
	echo "yes sec";
}
	
//echo ($rows);*/
?>