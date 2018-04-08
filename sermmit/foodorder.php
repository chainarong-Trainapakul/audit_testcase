<html>
<head>
<title>Sermmit Phochana Seafood</title>
<style>
#header {
    background-color: #00557F;
    color:white;
    text-align:center;
    padding:5px;
}

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
	  height: 150px;
	  color: #000;
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
   height: 300px;
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

<form name="form1" method="post" action="save_foodorder.php">
 <h2>เสริมมิตรโภชนาซีฟู้ด</h2>
  <div class="datagrid">
  <h3>เลือกโต๊ะอาหารที่จะรับออร์เดอร์</h3>
  <table>
    <tbody>
      <tr>
        
    
	 <td>
		<select class="input" name="txtUsername" type="text" id="txtUsername">
			<option>กรุณาเลือกโต๊ะอาหาร</option>
			<?php
				mysql_connect("localhost","root","password");
				mysql_select_db("sermmit");
				mysql_query("SET NAMES utf8");
				
					$sql = "select * from ordertype Order By table_id";
					$dbquery = mysql_query($sql);
					while($rw = mysql_fetch_array($dbquery)){?>
					<option value="<?=$rw['table_id']?>"><?=$rw['table_id']?></option>
			 <?php } ?>  
		</select>
	   </td>
      </tr>

    </tbody>
  </table>
  </div>
  <br>
  <input class="input" type="submit" name="Submit" value="รับออร์เดอร์">
</form>
</div>

</body>
</html>
