<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "USER")
	{
		echo "This page for User only!";
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
	<li><a class="active" href="user_page.php">หน้าแรก</a></li>
  <li><a href="startorder.php">เปิดโต๊ะ</a></li>
  <li><a href="change_table.php">ย้ายโต๊ะ</a></li>
  <li><a href="foodorder.php">เพิ่มออร์เดอร์</a></li>
  <li ><a href="showbill.php">เช็คบิล</a></li>
   <li ><a href="edit_profile_cash.php">แก้ไขรหัสผ่าน</a></li>
   <li><a href="logout.php">ออกจากระบบ</a></li>
</ul>
  <div class="container" id="section">
<br />
     ยินดีต้อนรับ: คุณ<?php echo $objResult["Name"];?> <br /><br />
	 <img src = "head.jpg">
	</div>
</body>
</html>
