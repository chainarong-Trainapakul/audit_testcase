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
<form name="form1" method="post" action="save_table.php">
  เพิ่มโต๊ะอาหาร <br>
  <div class="datagrid">
  <table>
    <tbody>
      <tr>
        <td width="125"> &nbsp;เลขโต๊ะอาหาร</td>
        <td width="180">
         <input class="input" name="txtnumtable" type="text" id="txtnumtable" size="4"> 
		
        </td>

      <tr>
        <td>&nbsp;ประเภทโต๊ะอาหาร</td>
        <td>
		<select class="input" name="txtType_id" id="txtType_id">
			<option>กรุณาเลือกประเภทโต๊ะอาหาร</option>
			<?php
				mysql_connect("localhost","root","password");
				mysql_select_db("sermmit");
				mysql_query("SET NAMES utf8");
				
					$sql = "select * from tabletype";
					$dbquery = mysql_query($sql);
					while($rw = mysql_fetch_array($dbquery)){?>
					<option value="<?=$rw['table_id_type']?>"><?=$rw['table_type_name']?></option>
			 <?php } ?>  
	</select>
		
		
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
