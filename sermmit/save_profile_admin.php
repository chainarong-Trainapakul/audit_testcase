<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "<script type='text/javascript'>alert('Please Login!');</script> ";
		echo "<script>window.location='login.php'</script>";
	}
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "<script type='text/javascript'>alert('รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน');</script> ";
		echo "<script>window.location='edit_profile_admin.php'</script>";
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."' 
	,Username = '".trim($_POST['txtUsername'])."',Name = '".trim($_POST['txtName'])."',Tel = '".trim($_POST['txtTel'])."',IdenID = '".trim($_POST['txtIdenID'])."' WHERE UserID = '".($_SESSION['UserID'])."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "<script type='text/javascript'>alert('เปลี่ยนแปลงข้อมูลเรียบร้อยแล้ว');</script> ";		
	
	if($_SESSION["Status"] == "ADMIN")
	{
		//echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
		echo "<script>window.location='admin_page.php'</script>";
	}
	else
	{
		//echo "<br> Go to <a href='user_page.php'>User page</a>";
		echo "<script>window.location='user_page.php'</script>";
	}
	
	mysql_close();
?>
