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
  background: #EECFA1;
 border: 2px solid #EECFA1;
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
table{
	background: #EECFA1;
	width: 100%;
}
table tr td{
	border: 1px solid  ; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px;
	  border-radius: 3px;
}
table th{
	border: 1px solid ; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px;
	  border-radius: 3px;
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

 

<div class="container" id="section">
<form action="save_chage_table.php?orderID=<?php echo $_GET["orderID"];?>" name="frmEdit" method="post">
<?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
$strSQL = "SELECT * FROM ordertype WHERE order_id = '".$_GET["orderID"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
	echo "Not found CustomerID=".$_GET["orderID"];
}
else
{
?>
<table width="600" border="1">
  <tr>
	<th> <div align="center">รหัสออร์เดอร์ </div></th>
    <th > <div align="center">หมายเลขโต๊ะปัจจุบัน</div></th>
	 <th > <div align="center">เลือกโต๊ะที่จะย้าย</div></th>
 
  </tr>
  <tr>
    <td><div align="center"><?php echo $objResult["order_id"];?></div></td>
	<td><div align="center"><?php echo $objResult["table_id"];?></div></td>
     <td>
			<select class="input" name="txttable_id" id="txttable_id">
			<option>กรุณาเลือกโต๊ะอาหารที่ย้าย</option>
			<?php
				mysql_connect("localhost","root","password");
				mysql_select_db("sermmit");
				mysql_query("SET NAMES utf8");
				
					$sql = "select * from tableall";
					$dbquery = mysql_query($sql);
					while($rw = mysql_fetch_array($dbquery)){?>
					<option value="<?=$rw['table_id']?>"><?=$rw['table_id']?></option>
			 <?php } ?>  
		</select>
	   </td>
 

  </tr>
  </table>
  <input type="submit" name="submit" value="submit">
  <?php
  }
  mysql_close($objConnect);
  ?>
  </form>
  </div>

</body>
</html>