<?php
	session_start();
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	$strSQL = "SELECT * FROM ordertype WHERE table_id = '".mysql_real_escape_string($_POST['txtUsername'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["table_id"] = $objResult["table_id"];


			session_write_close();
			
		
				header("location:inputfoodorder.php");
			
	}
	mysql_close();
?>
