<html>
<head>
<title>Sermmit Phochana Seafood</title>
<style>
#section {
    width: 725px;
    float:center;
    padding:10px; 
	text-align:center;
	margin-buttom: 0px;
}

.datagrid {
     padding:10px; 
      background: #EECFA1; 
	  overflow: hidden; 
      border: 1px solid #EECFA1; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px; border-radius: 3px; 
	 margin-left: auto;
	 margin-right:auto;
	  color: #000;
	 width: 700px;
	 margin-top: 100px;
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
   margin-left: auto;
	 margin-right:auto;
  background: #8B795E;
 border: 2px solid #8B795E;
  -webkit-border-radius: 3px; 
  -moz-border-radius: 3px; border-radius: 3px; 
  
   color: #fff;
   
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


body {
    margin: 0;
}

ul {
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

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
.colorf{
	color: #fff;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
  <ul>
	<li><a class="active" href="user_page.php">หน้าแรก</a></li>
	<li><a href="startorder.php">เปิดโต๊ะ</a></li>
	<li><a href="">ย้ายโต๊ะ</a></li>
	<li><a href="foodorder.php">เพิ่มออร์เดอร์</a></li>
	<li ><a href="showbill.php">เช็คบิล</a></li>
	 <li ><a href="edit_profile_cash.php">แก้ไขรหัสผ่าน</a></li>
	<li><a href="logout.php">ออกจากระบบ</a></li>
</ul>





 

<div class="datagrid" >
<form action="bill.php?orderID=<?php echo $_GET["orderID"];?>&orderDate=<?php echo $_GET["orderDate"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
//$strSQL = "SELECT * FROM ordertype WHERE order_id = '".$_GET["orderID"]."'";
$strSQL = 'select * from ordertype Where order_id = '.$_GET['orderID'].' AND order_date = "'.$_GET['orderDate'].'"' ;
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table>
  <th> <div align="center">รหัสออร์เดอรร์ </div></th>
    <th > <div align="center">วันที่รับออร์เดอร์</div></th>
	 <th > <div align="center">เวลาเปิดโต๊ะ</div></th>
	  <th > <div align="center">เลขที่โต๊ะ</div></th>
	<th > <div align="center">ราคารวมก่อนหักส่วนลด(บาท)</div></th>
	<th > <div align="center">บัตรลดราคา</div></th>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
<?php 
		//	$sql = "SELECT * FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."'";
			$sql= 'SELECT SUM(price_sum) AS Total FROM foodorderinpput WHERE order_id = '.$_GET['orderID'].' AND date = "'.$_GET["orderDate"].'"';
			
			


			
			$result=mysql_query($sql);
			while($rs=mysql_fetch_array($result)){

				$sumorder=$rs['Total']; 

				} ?>
  <tr>
    <td><div align="center"><?php echo $objResult["order_id"];?></div></td>
    <td><?php echo $objResult["order_date"];?></td>
    <td><?php echo $objResult["open_date"];?></td>
   <td><?php echo $objResult["table_id"];?></td>
    <td align="center"><?php echo $sumorder;?></td>
	
	<td> <select class="input" name="txtsale" id="txtsale">
			
					<option value="1">มี</option>
					<option value="0">ไม่มี</option>
					
					</select> </td>
	 
  </tr>
<?php
}
?>
</table>

 
<?php
mysql_close($objConnect);
?>
</div>
<br />
<center><input type="submit" name="submit" value="ยืนยันการคำนวณค่าอาหาร"></center>
  </form>
</div>
</body>
</html>
