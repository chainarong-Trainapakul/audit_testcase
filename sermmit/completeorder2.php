<html>
 <?php
 $s = $_POST["txtsale"];
	if(($_POST["txtsale"]) == 1)
			{
				//$discount = $sum*($percent['salepersen']/100);
					
				echo $_POST["txtsale"];
				
			}
 ?>
<head>
<title>Sermmit Phochana Seafood</title>
<style>



input[type=submit] ,input[type=button] {
 
  padding: 0 30px;
  height: 40px;
  font-size: 12px;
  font-weight: bold;
  color: #000;
  background: #CDB38B;
  border: 1px #CCC;
  outline: 0;
  margin-left: 0;
}

input[type=submit]:active ,input[type=button]:active {
  background: #00CCFF;
  border-color: #9eb9c2 #b3c0c8 #b4ccce;
  -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
}


body {
    
	margin-left: auto;
	margin-right: auto;
}


</style>
<style type="text/css"> 
@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 
* {  
    margin:0px;  
    padding:0;  
    font-family:Arial, "times New Roman", tahoma;  
    font-size:12px;  
}  
html {  
    font-family:Arial, "times New Roman", tahoma;  
    font-size:12px;  
    color:#000000;  
}  
body {  
    font-family:Arial, "times New Roman", tahoma;  
    font-size:12px;  
    padding:0;  
    margin: 0px;
    color:#000000;  
} 
h4{
	
	margin-left: 10px;
} 

 
 
</style> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>




<?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");

/*
$strSQL = "SELECT * FROM ordertype WHERE order_id = '".$_GET["orderID"]."'";

			

			$sql = "SELECT * FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."'";
			$sql= "SELECT SUM(price_sum) AS Total FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."'";
			$result=mysql_query($sql);
			while($rs=mysql_fetch_array($result)){

				$sumorder=$rs['Total']; 
				
		
				} 
			*/	
			
			$sql = 'SELECT foodorderinpput.food_id, foodorderinpput.price_sum, foodmenu.type_id 
					FROM foodorderinpput 
					JOIN foodmenu
					ON foodmenu.food_id = foodorderinpput.food_id
					WHERE foodorderinpput.order_id = '.$_GET["orderID"].'
					';
					
		$result = mysql_query($sql);
		$res2 = mysql_query('SELECT salepersen FROM saledata WHERE dateup IN (SELECT MAX(dateup) FROM saledata)');
		$percent = mysql_fetch_array($res2);
		$sum = 0;
		$suma = 0;
		$drink_price = 0;
			while($rs=mysql_fetch_array($result))
			{
				if($rs['type_id']!=13)
				{
					$sum += $rs['price_sum'];
				}
				else
				{
					$drink_price += $rs['price_sum'];
				}
				
			$suma += $rs['price_sum'];	
			
			}
			if(($_POST["txtsale"])=="1")
			{
				$discount = $sum*($percent['salepersen']/100);
					
				echo "มีส่วนลดค่าอาหาร" ;
				
			}
			else
			{
				$discount = 0;
				
			}
			
				$sum -= $discount;
				$sum += $drink_price;
			
			//echo 'sum = '.$sum;
			

			$strSQL = "UPDATE ordertype SET ";
			
			$strSQL .="sumo = '".$sum."' ";
			$strSQL .=",suma = '".$suma."' ";
			$strSQL .=",saleq = '".$_POST["txtsale"]."' ";
			$strSQL .="WHERE order_id = '".$_GET["orderID"]."' ";
			
		
		
	
			
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

$count = 1 ;
$cbook = 1;
for($count=1;$count<=9999;$count++){
	if($count>9999){
		$cbook = $cbook+1;
	}
}
?>

<?php
mysql_close($objConnect);
?>



<form action="completeorder3.php?orderID=<?php echo $_GET["orderID"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
mysql_query("SET NAMES utf8");
$strSQL = "SELECT * FROM ordertype WHERE order_id = '".$_GET["orderID"]."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<h4>เสริมมิตรโภชนาซีฟูด</h4>
<br />
 
	<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
<?php 
			$strSQL = "SELECT * FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."'";
						$strSQL= 'SELECT SUM(price_sum) AS Total FROM foodorderinpput WHERE order_id = '.$_GET['orderID'].' AND date = "'.$_GET["orderDate"].'"';
			$result=mysql_query($strSQL);
			while($rs=mysql_fetch_array($result)){

				$sumorder=$rs['Total']; 
				
				$strSQL = "UPDATE ordertype SET ";
				$strSQL .="suma = '".$sumorder."' ";
				$strSQL .="WHERE order_id = '".$_GET["orderID"]."' ";

				} 
				
				
				?>
 
  &nbsp; order :  <?php echo $objResult["order_id"];?> <br />
 &nbsp; date :<?php echo $objResult["order_date"];?><br />
    &nbsp; time :<?php echo $objResult["open_date"];?><br />
  &nbsp; table : <?php echo $objResult["table_id"];?><br />
  
  
  
  
  
<?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
mysql_query("SET NAMES utf8");
 // mysql_query("SET NAMES utf8");
//$strSQL = "SELECT food_id,SUM(numfood),foodname,SUM(price_sum) FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."' GROUP BY food_id";

$strSQL = "SELECT foodorderinpput.date_input, SUM(price_sum),SUM(numfood), foodorderinpput.numfood, foodorderinpput.price_sum , foodorderinpput.food_id , foodmenu.food_name
FROM foodorderinpput INNER JOIN foodmenu ON foodorderinpput.food_id=foodmenu.food_id WHERE order_id = '".$_GET["orderID"]."'GROUP BY food_id";


//$strSQL = "SELECT * FROM foodorderinpput Inner Join foodmenu ON foodmenu.food_id = foodorderinpput.food_id"; 

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

//$sumtotal = "SELECT SUM(price_sum) AS Total FROM foodorderinpput";



?>


<br />


  <?php
while($objResult = mysql_fetch_array($objQuery))
{
	//$sumorder1=$objResult['to2']; 
?>
  
    
   
	


    <?php echo $objResult["food_name"];?>
  	x<?php echo $objResult["SUM(numfood)"];?>
	=<?php echo $objResult["SUM(price_sum)"];?> <br/>


  
  <?php
}
?>

 
 
   
  <?php
  
  mysql_close($objConnect);
  ?>
  
  
  <br />
  
  &nbsp; total : <?php echo $sumorder;?>บาท<br />


  
  


<?php
}
?>


 <?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
mysql_query("SET NAMES utf8");
$strSQL = 'SELECT * FROM ordertype WHERE order_id = '.$_GET['orderID'].' AND order_date = "'.$_GET["orderDate"].'"';
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

 
	<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
<?php 
			//$strSQL = "SELECT * FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."'";
						$strSQL= 'SELECT SUM(price_sum) AS Total FROM foodorderinpput WHERE order_id = '.$_GET['orderID'].' AND date = "'.$_GET["orderDate"].'"';

			$result=mysql_query($strSQL);
			while($rs=mysql_fetch_array($result)){

				$sumorder=$rs['Total']; 
				
				$strSQL = "UPDATE ordertype SET ";
				$strSQL .="suma = '".$sumorder."' ";
				$strSQL .="WHERE order_id = '".$_GET["orderID"]."' ";

				} 
				
				
				?>
 

  

  
  <br />
  

&nbsp; total net :<?php echo $objResult["sumo"];?>บาท	<br /> 

  



<?php
}
?>





<!--<a href="javascript:void(0);" onClick="javascript:window.print()">พิมพ์</a>-->


  <br />
 <div id="non-printable"> <center><input type="button" name="submit" value="พิมพ์ใบเสร็จ" onClick="window.print()"></center></div>
 <br />
<div id="non-printable"><input type="submit" name="submit" value="ทำรายการเสร็จสิ้น"></div>
 </form>
</body>
</html>