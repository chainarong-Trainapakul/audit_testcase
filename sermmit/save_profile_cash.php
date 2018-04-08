<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาเข้าสู่ระบบใหม่!');</script> ";
		echo "<script>window.location='edit_profile_cash.php'</script>";
		//exit();
	}
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "<script type='text/javascript'>alert('รหัสผ่านยืนยันไม่ถูกต้อง!');</script> ";
		echo "<script>window.location='edit_profile_cash.php'</script>";
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."' 
	,Username = '".trim($_POST['txtUsername'])."',Name = '".trim($_POST['txtName'])."',Tel = '".trim($_POST['txtTel'])."',IdenID = '".trim($_POST['txtIdenID'])."' WHERE UserID = '".($_SESSION['UserID'])."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "<script type='text/javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว!');</script> ";
				
	
	if($_SESSION["Status"] == "ADMIN")
	{
		header("location:admin_page.php");
	}
	else
	{
		header("location:user_page.php");
	}
	
	mysql_close();
?>
