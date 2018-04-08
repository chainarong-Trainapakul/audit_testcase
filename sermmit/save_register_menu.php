<?php
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
mysql_query("SET NAMES utf8");
	
	if(trim($_POST["txtfood_name"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุชื่ออาหาร ');</script>";
			echo "<script>window.location='regis_menu.php'</script>";
	//	echo "กรุณาระบุชื่ออาหาร!";
	//	exit();	
	}	
		
	if(trim($_POST["txtPrice"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุราคา ');</script>";
			echo "<script>window.location='regis_menu.php'</script>";
		//echo "กรุณาระบุราคา!";
		//exit();	
	}	
	if(trim($_POST["txtType_id"]) == "")
	{
			echo "<script type='text/javascript'>alert('กรุณาระบุหมวดหมู่ของอาหาร ');</script>";
			echo "<script>window.location='regis_menu.php'</script>";
		//echo "กรุณาระบุหมวดหมู่ของอาหาร!";
	//	exit();	
	}
	
	
	$strSQL = "SELECT * FROM foodmenu WHERE food_name = '".trim($_POST['txtfood_name'])."' ";
	mysql_query("SET NAMES utf8");
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			//echo "เมนูนี้มีในระบบแล้ว!";
			echo "<script type='text/javascript'>alert('เมนูนี้มีในระบบแล้ว ');</script>";
			echo "<script>window.location='regis_menu.php'</script>";
	}
	else
	{	
		
		$strSQL = "INSERT INTO foodmenu (food_name,food_price,type_id) VALUES ('".$_POST["txtfood_name"]."','".$_POST["txtPrice"]."','".$_POST["txtType_id"]."')";
		$objQuery = mysql_query($strSQL);
		
			
	
		echo "<script type='text/javascript'>alert('เพิ่มเมนูอาหารเรียบร้อยแล้ว ');</script>";
			echo "<script>window.location='regis_menu.php'</script>";
		
	}
mysql_query("SET NAMES utf8");
	mysql_close();
?>
