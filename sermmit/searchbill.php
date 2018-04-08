<html>

<head>
<title>Sermmit admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>



.table{
	background: #EECFA1;
	width: 100%;
}
.table tr td{
	border: 1px solid  ; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px;
	  border-radius: 3px;
}
.table th{
	border: 1px solid ; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px;
	  border-radius: 3px;
}
.input{
	  padding:10px; 
      border: 1px solid ; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px;
	  border-radius: 3px; 
	
}

.container {
	
  margin: 100px auto; 
  background: #EECFA1;
 border: 2px solid #8B795E;
  -webkit-border-radius: 3px; 
  -moz-border-radius: 3px; border-radius: 3px; 
   
   color: #000;
   
}

input[type=submit] ,input[type=button] {
 
  padding: 0 30px;
  height: 40px;
  font-size: 12px;
  font-weight: bold;
  color: #000;
  background: #CDB38B;
  border: 1px #CCC;
  outline: 0;
}

input[type=submit]:active ,input[type=button]:active {
  background: #00CCFF;
  border-color: #9eb9c2 #b3c0c8 #b4ccce;
  -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
}

.ul {
     list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
	left: 0;
}

.li {
    float: left;
}

.li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}

body {
    margin: 0;
}

#ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
	top: 50px;
}

#li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

#li a.active {
    background-color: #4CAF50;
    color: white;
}

#li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
.button {
    background-color: #CDB38B;
    border: none;
    color: #000;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}


.button4 {border-radius: 12px;}
</style>


</head>
<body>
<ul class="ul">
	<li class="li"><a class="active" href="admin_page.php">หน้าแรก</a></li>
  <li class="li"><a  href="edit_profile_admin.php">เปลี่ยนรหัสผ่าน</a></li>
  <li class="li"><a href="deletecash.php">แก้ไขข้อมูลแคชเชียร์</a></li>
  	 <li class="li"><a href="regis_table.php">เพิ่มโต๊ะอาหาร</a></li>
 <li class="li"><a href="show_menu.php">จัดการเมนูอาหาร</a></li>
   <li class="li"><a href="edit_sale.php">โปรโมชั่นลดราคา</a></li>
  <li class="li"><a href="reportmoney.php">ตรวจสอบยอดขายรายวัน</a></li>
 
  <li class="li"><a href="logout.php">ออกจากระบบ</a></li>
</ul>





<div class="container" id="section">

<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
 <br /><center><h3>ค้นหาใบเสร็จย้อนหลังตามเงื่อนไข</h3></center>  <br />
<center><table>
<tr>
<td> เลขที่ใบเสร็จ  </td>
     <td> <input class="input" name="billid" id="billid" type="number" value="<?php echo $_GET["billid"]?>"><br /></td>


 <td>ชื่อลูกค้า   </td>    
	<td>	<input class="input" name="namec" id="namec" value="<?php echo @$_GET["namec"]?>"><br /></td>

</tr>

<tr>	  
 <td>วันที่รับประทานอาหาร       </td>
		<td><input class="input" name="date" id="date" type="date" value="<?php echo $_GET["date"]?>">	<br /></td>

 <td>เวลาที่เปิดโต๊ะ     </td>
		<td><input class="input" name="time" id="time" type="number" value="<?php echo $_GET["time"]?>">	<br />	 * (ใส่เฉพาะชั่วโมงโดยประมาณ  ตัวอย่าง  ใส่ 10 แปลว่า 10 โมง)</td>	
</tr>

<tr>					
<td>หมายเลขโต๊ะ   </td>  
		<td><select class="input" name="table" id="table" >
			
			<option></option>
			
			<?php
				mysql_connect("localhost","root","password");
				mysql_select_db("sermmit");
				mysql_query("SET NAMES utf8");
				
					$sql = "select * from tableall order by table_id";
					$dbquery = mysql_query($sql);
					while($rw = mysql_fetch_array($dbquery)){?>
					<option value="<?=$rw['table_id']?>"><?=$rw['table_id']?></option>
			 <?php } ?>  
		</select> ค้นหาโต๊ะหมายเลข : <?php echo @$_GET["table"]?> </td>
		</tr>
</table></center>		
		<br />	<br />
   <center>   <input type="submit" value="Search"> </center>
	  
	  
</form>

<?php
	    mysql_connect("localhost","root","password");
				mysql_select_db("sermmit");
				mysql_query("SET NAMES utf8");
			

if($_GET)
{
$bill = $_GET["billid"];//ชื่อที่ตั้งใน form เช่น <input type='text' name='year'>
$name = $_GET["namec"];
$date = $_GET["date"];
$time = $_GET["time"];
$table = $_GET["table"];

	//echo date('H:i',strtotime("8:32:49"));



$sql="SELECT * FROM ordertypecomplete WHERE (bill_id LIKE '%$bill%' and namec LIKE '%$name%' and orderdate LIKE '%$date%' and opentime LIKE '%$time%' and table_id LIKE '%$table%') ";
$objQuery = mysql_query($sql) or die ("Error Query [".$sql."]");

}

	
?>
	

<table class="table">
	 <tr>
	 		<th > <div align="center">เลขที่ใบเสร็จ</div></th>
		<th > <div align="center">เล่มที่ใบเสร็จ</div></th>
			<th > <div align="center">ชื่อลูกค้า</div></th>
		<th > <div align="center">ที่อยู่ลูกค้า</div></th>
    <th > <div align="center">วันที่รับออร์เดอร์</div></th>
	 <th > <div align="center">เวลาเปิดโต๊ะ</div></th>
	  <th > <div align="center">เลขที่โต๊ะ</div></th>
	<th > <div align="center">บัตรลดราคา</div></th>
	<th > <div align="center">เปอร์เซ็นต์ลดราคา</div></th>
	<th > <div align="center">ราคารวมก่อนลดราคา(บาท)</div></th>
		<th > <div align="center">ราคารวมสุทธิ(บาท)</div></th>
	
</tr>
		<?php

	//print_r($objQuery);
	if(isset($objQuery))
	{
		
		while($objResult = mysql_fetch_array($objQuery))
		{
			
		
		?>
			 <?php 
			$strSQL = "SELECT * FROM foodorderinpput WHERE order_id = '".$objResult['order_id']."'";
						$strSQL= 'SELECT SUM(price_sum) AS Total FROM foodorderinpput WHERE order_id = '.$objResult['order_id'].' AND date = "'.$objResult["orderdate"].'"';
			$result=mysql_query($strSQL);
			while($rs=mysql_fetch_array($result)){

				$sumorder=$rs['Total']; 
				
			
				} 
				

				?>
				
				
				<?php

 // for ($i=0;$i<count($_POST["orderID"]);$i++)
 // {
 //  if(trim($_POST["orderID"][$i]) !="")
 //  {  
mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	mysql_query("SET NAMES utf8");
    $sql = "SELECT * FROM ordertypecomplete WHERE order_id = '".$objResult['order_id']."'";
	
  $query = mysql_query($sql);
 
  $result = mysql_query($sql) or exit($sql);

  $row = mysql_fetch_array($result);
 
  $id    = $row["order_id"];
  //$amount           = $row["sumo"];
  date_default_timezone_set('Asia/Bangkok');
  $date=@date('d/m/Y');
     
		$sql = 'SELECT foodorderinpput.food_id, foodorderinpput.price_sum, foodmenu.type_id 
					FROM foodorderinpput 
					JOIN foodmenu
					ON foodmenu.food_id = foodorderinpput.food_id
					WHERE foodorderinpput.order_id = '.$objResult['order_id'].'
					';
					
		$result = mysql_query($sql);
		$res2 = mysql_query('SELECT salepersen FROM saledata WHERE dateup IN (SELECT MAX(dateup) FROM saledata)');
		$percent = mysql_fetch_array($res2);
		$sum = 0;
		$suma = 0;
	//$sumtotal = null;

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
			if(($objResult['sale'])=="1")
			{
				$discount = $sum*($percent['salepersen']/100);
					
				
				
			}
			else
			{
				$discount = 0;
				
			}
			
				$sum -= $discount;
				$sum += $drink_price;
	
			//echo 'sum = '.$sum;
			@$sumtotal += $sum;
			//echo "***ยอดรวมสุทธิ $sumtotal บาท***";
	
	
			
//$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
		   <tr>
		   <td><?php echo $objResult["bill_id"];?></td>
			<td><?php echo $objResult["bookid"];?></td>
		
			<td><?php echo $objResult["namec"];?></td>
			<td><?php echo $objResult["addc"];?></td>
			<td><?php echo $objResult["orderdate"];?></td>
			<td><?php echo $objResult["opentime"];?></td>
			<td><?php echo $objResult["table_id"];?></td>
			<td><?php $salen="ไม่มี";
					  $saley="มี";
						if(($objResult["sale"])== "0"){
							echo $salen;
						}
						else{
							echo $saley;
						}?>
			</td>
			<td><?php echo $objResult["saleper"];?></td>
			<td> <?php echo number_format(ceil($sumorder),2, '.', ',');?>     </td>
			<td>  <?php echo number_format(ceil($sum),2, '.', ',');?>      </td>
			<td align="center"><a href="rebill.php?orderID=<?php echo $objResult["order_id"];?>&orderDate=<?php echo $objResult["orderdate"];?>&txtsale=<?php echo $objResult["sale"];?>">รายละเอียด</a></td>

		  </tr>
		<?php
		
		}
	}
	?>
	</table>
	
</div>

</body>
</html>