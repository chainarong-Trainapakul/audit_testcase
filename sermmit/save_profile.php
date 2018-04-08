<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "<script type='text/javascript'>alert('Please Login!');</script> ";
		exit();
	}
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "<script type='text/javascript'>alert('Password not Match!');</script> ";
		exit();
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."' 
	,Username = '".trim($_POST['txtUsername'])."',Name = '".trim($_POST['txtName'])."' WHERE UserID = '".$_SESSION["UserID"]."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "<script type='text/javascript'>alert('Save Completed!');</script> ";		
	
	if($_SESSION["Status"] == "ADMIN")
	{
		echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
	}
	else
	{
		echo "<br> Go to <a href='user_page.php'>User page</a>";
	}
	
	mysql_close();
?>
