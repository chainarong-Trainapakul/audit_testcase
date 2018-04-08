<?php
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");

	
	if(trim($_POST["txtUsername"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุชื่อผู้ใช้ ');</script>";
		//echo "กรุณาระบุชื่อผู้ใช้";
		echo "<script>window.location='inputcash.php'</script>";
	
	}	
		
	if(trim($_POST["txtPassword"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระรหัสผ่าน ');</script>";
		echo "<script>window.location='inputcash.php'</script>";
		//echo "กรุณาระรหัสผ่าน!";
	//	exit();	
	}	
	if(trim($_POST["txtConPassword"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณายืนยันรหัสผ่าน ');</script>";
		echo "<script>window.location='inputcash.php'</script>";
		//echo "กรุณายืนยันรหัสผ่าน!";
	//	exit();	
	}
	if(trim($_POST["txtName"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุชื่อ ');</script>";
		echo "<script>window.location='inputcash.php'</script>";
	//	echo "กรุณาระบุชื่อ!";
		//exit();	
	}
	if(trim($_POST["txtTel"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุเบอร์โทรศัพท์ ');</script>";
		echo "<script>window.location='inputcash.php'</script>";
		
		//echo "กรุณาระบุเบอร์โทรศัพท์!";
	//	exit();	
	}
	if(trim($_POST["txtIdenID"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุเลขประจำตัวประชาชน ');</script>";
		echo "<script>window.location='inputcash.php'</script>";
		//echo "กรุณาระบุเลขประจำตัวประชาชน!";
		//exit();	
	}
		
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "<script type='text/javascript'>alert('รหัสผ่าน และ ยืนยันรหัสผ่านไม่ตรงกัน ');</script>";
		echo "<script>window.location='inputcash.php'</script>";
		//echo "รหัสผ่าน และ ยืนยันรหัสผ่านไม่ตรงกัน!";
		//exit();
	}
	
//	header("location:inputcash.php");
	$strSQL = "SELECT * FROM member WHERE IdenID = '".trim($_POST['txtIdenID'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$status= "USER";
	if($objResult)
	{
			echo "<script type='text/javascript'>alert('เลขบัตรประชาชนนี้มีในระบบแล้ว ');</script>";
			echo "<script>window.location='inputcash.php'</script>";
		//	echo "ชื่อผู้ใช้นี้มีในระบบแล้ว!";
	}
	else
	{	
		
		$strSQL = "INSERT INTO member (Username,Password,Name,IdenID,Tel,Status) VALUES ('".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["txtIdenID"]."','".$_POST["txtTel"]."','".$status."')";
		$objQuery = mysql_query($strSQL);
		
			
	
		header("location:inputcash.php");
		
	}
//header("location:inputcash.php");
	mysql_close();
?>
