<?php
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");

	
	if(trim($_POST["txtnumtable"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุหมายเลขโต๊ะอาหาร ');</script>";
			echo "<script>window.location='regis_table.php'</script>";
	//	echo "กรุณาระบุชื่ออาหาร!";
	//	exit();	
	}	
		
	if(trim($_POST["txtType_id"]) == "")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุประเภทโต๊ะอาหาร ');</script>";
			echo "<script>window.location='regis_table.php'</script>";
		//echo "กรุณาระบุราคา!";
		//exit();	
	}	

	
	$strSQL = "SELECT * FROM tableall WHERE table_id = '".trim($_POST['txtnumtable'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
			//echo "เมนูนี้มีในระบบแล้ว!";
			echo "<script type='text/javascript'>alert('รหัสหมายเลขโต๊ะนี้มีในระบบแล้ว ');</script>";
			echo "<script>window.location='regis_table.php'</script>";
	}
	else
	{	
		
		$strSQL = "INSERT INTO tableall (table_id,table_id_type) VALUES ('".$_POST["txtnumtable"]."','".$_POST["txtType_id"]."')";
		$objQuery = mysql_query($strSQL);
		
			
	
			echo "<script type='text/javascript'>alert('เพิ่มโต๊ะอาหารเรียบร้อยแล้ว ');</script>";
			echo "<script>window.location='regis_table.php'</script>";
		
	}

	mysql_close();
?>
