<?php
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
mysql_query("SET NAMES utf8");

	
	if(trim($_POST["txttype_name"]) == "")
	{
		//echo "กรุณาระบุชื่อหมวดอาหาร!";
		//exit();	
		echo "<script type='text/javascript'>alert('กรุณาระบุชื่อหมวดอาหาร ');</script>";
		echo "<script>window.location='regis_menu_type.php'</script>";
		
	}	
		
	
	
	$strSQL = "SELECT * FROM foodmenutype WHERE type_name = '".trim($_POST['txttype_name'])."' ";
	mysql_query("SET NAMES utf8");
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			//echo "ชื่อหมวดอาหารนี้มีในระบบแล้ว!";
			echo "<script type='text/javascript'>alert('ชื่อหมวดอาหารนี้มีในระบบแล้ว ');</script>";
		echo "<script>window.location='regis_menu_type.php'</script>";
	}
	else
	{	
		
		$strSQL = "INSERT INTO foodmenutype (type_name) VALUES ( 
		'".$_POST["txttype_name"]."')";
		$objQuery = mysql_query($strSQL);
		
	//	echo "เพิ่มหมวดอาหารเรียบร้อยแล้ว!<br>";		
	
		//echo "<br> กลับ <a href='regis_menu_type.php'>หน้าเพิ่มหมวดอาหาร</a>";
			echo "<script type='text/javascript'>alert('เพิ่มหมวดอาหารเรียบร้อยแล้ว ');</script>";
		echo "<script>window.location='regis_menu_type.php'</script>";
		
	}
mysql_query("SET NAMES utf8");
	mysql_close();
?>
