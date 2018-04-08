<?php
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	mysql_query("SET NAMES utf8");
		$strSQL = "SELECT * FROM ordertype WHERE order_id = '".$_GET["orderID"]."'";
	
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
				
				while($objResult = mysql_fetch_array($objQuery))
					{
						$a = $objResult['order_id'];
						$b = $objResult['order_date'];
						$c = $objResult['open_date'];
						$d = $objResult['table_id'];
						$e = $objResult['saleq'];
						$f = $objResult['suma'];
						$g = $objResult['sumo'];
						//$h = $objResult['bill_id'];
					//	$i = $objResult['bookid'];
						//$j = $objResult['namec'];
						//$k = $objResult['addc'];
						$sqll = "INSERT INTO ordertypecomplete (order_id,orderdate,opentime,table_id,sale,bill_id,bookid,namec,addc,saleper) VALUES ('".$a."','".$b."','".$c."',
		'".$d."','".$e."','".$_POST["num"]."','".$_POST["booknum"]."','".$_POST["namec"]."','".$_POST["addc"]."','".$_POST["saleper"]."')";
		
		$objQuery1 = mysql_query($sqll) or die ("Error Query [".$sqll."]");
				
					}
					
	
		$sql = "DELETE FROM ordertype ";
	$sql .="WHERE order_id = '".$_GET["orderID"]."' ";	
		$obj = mysql_query($sql) or die ("Error Query [".$sql."]");

	header("location:showbill.php");
		
	

	mysql_close();
?>

