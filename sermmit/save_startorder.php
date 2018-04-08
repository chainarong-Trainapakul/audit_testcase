<?php
mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");

	date_default_timezone_set('Asia/Bangkok');
	
	if(trim($_POST["txttable_id"]) == "กรุณาเลือกโต๊ะอาหาร")
	{
		echo "<script type='text/javascript'>alert('กรุณาระบุหมายเลขโต๊ะ ');</script>";
			echo "<script>window.location='startorder.php'</script>";
		//echo "กรุณาระบุหมวดหมู่ของอาหาร!";
	exit();	
	}
	
		

	
	$strSQL = "SELECT * FROM ordertype WHERE table_id = '".trim($_POST['txttable_id'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
		$work_date=@date('Y/m/d');
		$work_time=@date('h:i:s: a');
	if($objResult)
	{
			//echo "alert(โต๊ะนี้ไม่ว่าง!)";
			echo "<script type='text/javascript'>alert('โต๊ะนี้ไม่ว่าง ');</script>";
			echo "<script>window.location='startorder.php'</script>";
	}
	else
	{	
		
		$strSQL = "INSERT INTO ordertype (order_date,open_date,table_id) VALUES ('".$work_date."','".$work_time."','".$_POST["txttable_id"]."')";
		$objQuery = mysql_query($strSQL);
		
			echo "<script type='text/javascript'>alert('เปิดโต๊ะเรียบร้อยแล้ว ');</script>";
			echo "<script>window.location='startorder.php'</script>";
		
	}

	mysql_close();
?>
