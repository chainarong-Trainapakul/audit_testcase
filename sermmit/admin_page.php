<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for Admin only!";
		exit();
	}	
	
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<html>
<head>
<title>Sermmit admin</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<ul>
	<li><a class="active" href="admin_page.php">หน้าแรก</a></li>
	<li><a href="edit_profile_admin.php">เปลี่ยนรหัสผ่าน</a></li>
    <li class="li"><a href="deletecash.php">แก้ไขข้อมูลแคชเชียร์</a></li>
	<li class="li"><a href="regis_table.php">เพิ่มโต๊ะอาหาร</a></li>
	<li class="li"><a href="show_menu.php">จัดการเมนูอาหาร</a></li>
	<li class="li"><a href="edit_sale.php">โปรโมชั่นลดราคา</a></li>
	<li class="li"><a href="reportmoney.php">ตรวจสอบยอดขายรายวัน</a></li>
    <li><a href="logout.php">ออกจากระบบ</a></li>
</ul>

<div class="container" id="section">

<br />
	ยินดีต้อนรับ: คุณ<?php echo $objResult["Name"];?> <br /><br />
	<img src = "head.jpg">
	
</div>
 
</body>
</html>
