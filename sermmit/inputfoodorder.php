<?php
	session_start();
if($_SESSION['table_id'] == "")
	{
		echo "กรุณาเลือกโต๊ะที่รับออร์เดอร์!";
		exit();
	}

	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	mysql_query("SET NAMES utf8");
	$strSQL = "SELECT * FROM ordertype WHERE table_id = '".$_SESSION['table_id']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
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
}
.input {
	  padding:10px; 
      border: 1px solid ; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px;
	  border-radius: 3px; 
	
}
.inputt {
	  padding:10px; 
      border: 1px solid #8B795E; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px;
	  border-radius: 3px; 
	 position: fixed;
	 margin-top: 300px
	text-align: right;
	 background: #EECFA1;
	 margin-left: 20px;
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
.t {
	margin-right; 10px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
  <ul>
	<li><a class="active" href="user_page.php">หน้าแรก</a></li>
	<li><a href="startorder.php">เปิดโต๊ะ</a></li>
	<li><a href="change_table.php">ย้ายโต๊ะ</a></li>
	<li><a href="foodorder.php">เพิ่มออร์เดอร์</a></li>
	<li ><a href="showbill.php">เช็คบิล</a></li>
	 <li ><a href="edit_profile_cash.php">แก้ไขรหัสผ่าน</a></li>
	<li><a href="logout.php">ออกจากระบบ</a></li>
</ul>

<form name="form1" method="POST" action="save_inputfoodorder.php">
<div class="t">
<button class="inputt"	type="submit" name="submit">ยืนยันการสั่งอาหาร</button>
</div>
<div class="container" id="section">


 <h3> รับออร์เดอร์</h3> 


<table>
<tbody>
<tr>
	  <td class="colorf"> &nbsp;รหัสออร์เดอร์:</td>
        <td class="colorf" width="180">
		  <input class="input" name="txtorderid" type="text" value="<?php echo $objResult["order_id"];?>" id="txtorderid">
		
        </td>
      <td class="colorf"> &nbsp;โต๊ะ:</td>
        <td class="colorf" width="180">
			 <input class="input" name="txttableid" type="text" value="<?php echo $objResult["table_id"];?>" id="txttableid">
        </td>
		
</tr>
</tbody>
</table>


</div>
<h3><center> กรุณาเลือกกเมนูอาหาร</center></h3>
<div class="datagrid">
 

<?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
$strSQL1 = "SELECT * FROM foodmenu";
$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
mysql_query("SET NAMES utf8");
?>

<center><table>
  <tr>
    <th> <div align="center"> </div>กรุณาเลือกเมนูอาหาร</th>
    <th> <div align="center">ชื่อเมนูอาหาร</div></th>
    <th> <div align="center">ราคา </div></th>
    <th> <div align="center">จำนวนที่สั่ง </div></th>
	
  </tr>
<?php
mysql_query("SET NAMES utf8");
while($objResult1 = mysql_fetch_array($objQuery1))
{
	//echo $objResult1["food_id"];
?>
  <tr>
    <td><input class="input" name="txtfoodid[]" id="txtfoodid[]" type="checkbox" value="<?php echo $objResult1["food_id"];?>" ></td>
   
    <td><?php echo $objResult1["food_name"];?></td>
	 <td><input class="input" name="txtfoodprice[]" id="txtfoodprice[]" value="<?php echo $objResult1["food_price"];?>" oninvalid="this.setCustomValidity('User ID is not empty')" readonly ></td>
	<td><input class="input" type="number" name="txtnumfood1[]" id="txtnumfood1[]" min="1"  ></td>
	<td><center><!--<input type="submit" name="Submit" value="ยืนยันการสั่งอาหาร">--></center><td>

 </tr>
	
<?php
mysql_query("SET NAMES utf8");
}
?>
 
</table></center>

<br />

<?php
mysql_close($objConnect);
mysql_query("SET NAMES utf8");
?>


 </div>
   <br>

 </form>
	
	
</body>
</html>