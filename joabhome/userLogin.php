<?php

error_reporting(0);	//FOR TEST 屏蔽错误信息

if($_REQUEST['logoutsub']){

	$_SESSION['username']='';

	echo "<script language='javascript'>window.location.href='./index.php';</script>";

}

if($_REQUEST['sub']){



	//echo $_REQUEST['username'];



	

	$sql = "select * from member where username='".$_REQUEST['username']."'";

	$rows = $db->GetAll($sql);

	if($rows){

		if($rows[0]['password']!=trim($_REQUEST['password'])){

			 $ms = "<script language='javascript'>alert('Incorrect Username or Password.')</script>";

		}else{

			$_SESSION['username'] = $_REQUEST['username'];
			$_SESSION['userid'] = $rows[0]['id'];
		}

	}else{

		$ms = "<script language='javascript'>alert('Incorrect Username or Password.')</script>";

	}

	echo $ms;

}



if(!$_SESSION['username']){

?>


<script language="JAVASCRIPT" src="/admin/other/js.js"></script>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >

<form name="form_sub" method="post" action="">

    <tr> 
		<td width="42%" height="19"> 
      
	      	<div align="right"> 
	
	          <p class="cls12">username:</p>
	
	        </div>
        
      	</td>
		<td width="58%"><input name="username" type="text" class="input" size="15" id="username"></td>
	</tr>



	<tr> 

	  	<td height="23"> 
	      	<div align="right"> 
	      	
	          <p class="cls12">password:</p>
	
	        </div>
		</td>
	
		<td><input name="password" type="password" class="input" size="15" id="password"></td>

	</tr>


	<tr> 
		<td colspan="2">
			<div align="center"> 

				<input type="hidden" name="sub" value="login" / >

				<input type="image" src="img/sgin.jpg" value="sign">

                  &nbsp;  <a href="reg.php" target="_blank"><img src="img/regist.jpg" border="0"></a> 
                  <br>

 				<a href="repass.php"  class="cls12"  target="_blank">forgot your password?</a> 
 			</div>
 		</td>
	</tr>
</form>
</table>



           

<script language="JavaScript" type="text/javascript">



var frm = new Validator("form_sub");

frm.addV("username", "req", "username not null");

frm.addV("password", "req", "password not null");



</script>  



<?php

}else {



	echo '<div align=center class=cls12>Welcome '.$_SESSION['username'].
		  '	<div ><a href="./tradelist.php" target="_blank">History Order</a></div>';
	echo '<form action="" style="padding:0;margin:0;"><input type="hidden" name="logoutsub" value="Sign out" class="input"><input  type="image" src="img/sign-out.jpg" name="sub" value="提交"></from></div>';



}



?>