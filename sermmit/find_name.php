<html>

<head>
<title>Sermmit admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>



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



<div style="margin-left:auto; margin-right: auto; padding:50px 16px;height:1000px;">

<table>
<tr>
<th>
<form name="frmMain" method="post" action="show_menu.php">
<button class="button button4">เมนูอาหารทั้งหมด</button>
</form>
</th>
<th>
<form name="frmMain" method="post" action="find_type.php">
<button class="button button4">ค้นหาเมนูอาหารตามหมวดหมู่</button>
</form>
</th>
<th>
<form name="frmMain" method="post" action="find_name.php">
<button class="button button4">ค้นหาเมนูอาหารตามชื่ออาหาร</button>
</form>
</th>
</tr>
</table>
<div class="container" id="section">

<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
 ค้าหาเมนูอาหารตามชื่ออาหาร       <input class="input" name="txtfood_name" id="txtfood_name">

	  
					
					
					
      <input type="submit" value="Search">
	  
	  
</form>

	  <?php
isset($_GET['txtfood_name']);
if(isset($_GET["txtfood_name"]) != "")
	{

   mysql_connect("localhost","root","password");
				mysql_select_db("sermmit");
				mysql_query("SET NAMES utf8");
	$strSQL = "SELECT * FROM foodmenu WHERE (food_name LIKE '%".$_GET["txtfood_name"]."%')";
	//$strSQL = "SELECT * FROM foodmenu WHERE (food_price LIKE '%".$_GET["txtfood_price"]."%')";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	
		
}
	
?>
	 

<table >
	  <tr>
		
		<th > <div align="center">ชื่ออาหาร </div></th>
		<th> <div align="center">ราคา </div></th>
	
		
	  </tr>
	<?php

	if(isset($objQuery))
	{
		while($objResult = mysql_fetch_array($objQuery))
		{
		?>
		  <tr>
			
			<td><?php echo $objResult["food_name"];?></td>
			<td><?php echo $objResult["food_price"];?></td>
		   <td align="center"><a href="phpMySQLEditRecordForm.php?foodID=<?php echo $objResult["food_id"];?>">แก้ไข</a></td>
   	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='phpMySQLDeleteRecord.php?CusID=<?php echo $objResult["food_id"];?>';}">ลบข้อมูล</a></td>


		  </tr>
		<?php
		
		}
	}
	
	
	?>
	</table>
	
</div>
</div>
</body>
</html>