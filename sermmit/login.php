
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



</style>
</head>
<body>

<div class="container" id="section">

<form name="form1" method="post" action="check_login.php">
 <h2>เสริมมิตรโภชนาซีฟู้ด</h2>
  <div class="datagrid">
  <h3>กรุณาเข้าสู่ระบบ </h3>
  <table>
    <tbody>
      <tr>
        <td> &nbsp;ชื่อผู้ใช้         </td>
        <td>
          <input class="input" name="txtUsername" type="text" id="txtUsername">
        </td>
      </tr>
      <tr>
        <td> &nbsp;รหัสผ่าน  </td>
        <td><input class="input" name="txtPassword" type="password" id="txtPassword">
        </td>
      </tr>
    </tbody>
  </table>
  </div>
  <br>
  <input class="input" type="submit" name="Submit" value="เข้าสู่ระบบ">
</form>
</div>

</body>
</html>
