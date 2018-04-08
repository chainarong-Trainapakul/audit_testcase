
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
<form name="form1" method="post" action="savecash.php">
  เพิ่มแคชเชียร์ <br>
  <div class="datagrid">
  <table>
    <tbody>

      <tr>
        <td> &nbsp;ชื่อผู้ใช้</td>
        <td>
		<input class="input" name="txtUsername" type="text" id="txtUsername" >
      
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน</td>
        <td><input class="input" name="txtPassword" type="password" id="txtPassword" >
        </td>
      </tr>
      <tr>
        <td> &nbsp;ยืนยันรหัสผ่าน</td>
        <td><input class="input" name="txtConPassword" type="password" id="txtConPassword"">
        </td>
      </tr>
      <tr>
        <td>&nbsp;ชื่อ</td>
        <td><input class="input" name="txtName" type="text" id="txtName"></td>
      </tr>
	   <tr>
        <td>&nbsp;เบอร์โทรศัพท์</td>
        <td><input class="input" name="txtTel" type="number" id="txtTel"></td>
      </tr>
	   <tr>
        <td>&nbsp;เลขบัตรประชาชน</td>
        <td><input class="input" name="txtIdenID" type="number" id="txtIdenID"></td>
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
