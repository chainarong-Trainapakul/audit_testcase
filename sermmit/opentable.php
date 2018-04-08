<html>
<head>
<title>Sermmit admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
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
.container {
	
  margin: 100px auto; 
  background: #EECFA1;
 border: 2px solid #8B795E;
  -webkit-border-radius: 3px; 
  -moz-border-radius: 3px; border-radius: 3px; 
   
   color: #fff;
   
}
.lang{
	margin-top: 80px;
	
}

</style>
</head>
<body>
  <ul>
	<li><a class="active" href="user_page.php">หน้าแรก</a></li>
  <li><a href="opentable.php">เปิดโต๊ะ</a></li>
  <li><a href="">ย้ายโต๊ะ</a></li>
  <li><a href="">เพิ่มออร์เดอร์</a></li>
  <li ><a href="">เช็คบิล</a></li>
   <li ><a href="edit_profile_cash.php">แก้ไขรหัสผ่าน</a></li>
   <li><a href="logout.php">ออกจากระบบ</a></li>
</ul>





<div class="container" id="section">
	
<?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
$strSQL = "SELECT * FROM tableall";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<table width="600" border="1">
  <tr>
    <th> <div align="center">เลขโต๊ะอาหาร</div></th>
    <th > <div align="center">รหัสประเภทโต๊ะอาหาร</div></th>

   
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["table_id"];?></div></td>
    <td><?php echo $objResult["table_id_type"];?></td>
   
    
	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='phpMySQLDeleteRecord.php?CusID=<?php echo $objResult["table_id"];?>';}">เปิดโต๊ะ</a></td>

  </tr>
<?php
}
?>
</table>
<?php
mysql_close($objConnect);
?>


</div>

</body>
</html>