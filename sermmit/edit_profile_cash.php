<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
	$strSQL = "SELECT * FROM member WHERE UserID = '".($_SESSION['UserID'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<html>
<head>
<title>Sermmit admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>


#section {
    width:350px;
    float:center;
    padding:10px; 
	text-align:center;
}

.datagrid {
    padding:10px; 
      background: #EECFA1; 
	  overflow: hidden; 
      border: 1px solid #EECFA1; 
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px; border-radius: 3px; 
	  height: 300px;
	  color: #000;
	  margin-top: 5px;
	  
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
  background: #8B795E;
 border: 2px solid #8B795E;
  -webkit-border-radius: 3px; 
  -moz-border-radius: 3px; border-radius: 3px; 
   height: 400px;
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

</style>
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
<form name="form1" method="post" action="save_profile_cash.php">
  เปลี่ยนรหัสผ่านสำหรับแคชเชียร์ <br>
  <div class="datagrid">
  <table>
    <tbody>
      <tr>
        <td width="125"> &nbsp;UserID</td>
        <td width="180">
          <?php echo $objResult["UserID"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;ชื่อผู้ใช้</td>
        <td>
		<input class="input" name="txtUsername" type="text" id="txtUsername" value="<?php echo $objResult["Username"];?>">
      
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input class="input" name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;ยืนยันรหัสผ่าน</td>
        <td><input class="input" name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>">
        </td>
      </tr>
      <tr>
        <td>&nbsp;ชื่อ</td>
        <td><input class="input" name="txtName" type="text" id="txtName" value="<?php echo $objResult["Name"];?>"></td>
      </tr>
	   <tr>
        <td>&nbsp;เบอร์โทรศัพท์</td>
        <td><input class="input" name="txtTel" type="number" id="txtTel" value="<?php echo $objResult["Tel"];?>"></td>
      </tr>
	   <tr>
        <td>&nbsp;เลขบัตรประชาชน</td>
        <td><input class="input" name="txtIdenID" type="number" id="txtIdenID" value="<?php echo $objResult["IdenID"];?>"></td>
      </tr>
      <tr>
        <td> &nbsp;สถานะการทำงาน</td>
        <td>
          <?php echo $objResult["Status"];?>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
  <br>
  <input type="submit" name="Submit" value="Save">
</form>
</div>
</body>
</html>
