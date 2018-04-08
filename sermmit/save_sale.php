<?php
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	date_default_timezone_set('Asia/Bangkok');
	
	if(trim($_POST["txtsale"]) == "")
	{
		echo "กรุณาระบุเปอร์เซ็นที่ต้องการจะลดราคา!";
		exit();	
	}	
		
	
	
	$strSQL = "SELECT * FROM saledata WHERE id = '".trim($_POST['txtsale'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);

		$work_date=@date('Y/m/d');
		$strSQL = "INSERT INTO saledata (salepersen,dateup) VALUES ('".$_POST["txtsale"]."','".$work_date."')";
		$objQuery = mysql_query($strSQL);
		
			
	
		header("location:edit_sale.php");
		
	

	mysql_close();
?>
