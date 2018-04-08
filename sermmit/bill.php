<?php //session_start(); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sermmit Seafood</title>
</head>

<style>



input[type=submit] ,input[type=button] {
 
  padding: 0 30px;
  height: 40px;
  font-size: 12px;
  font-weight: bold;
  color: #000;
  background: #CDB38B;
  border: 1px #CCC;
  outline: 0;
  margin-left: 0;
}

input[type=submit]:active ,input[type=button]:active {
  background: #00CCFF;
  border-color: #9eb9c2 #b3c0c8 #b4ccce;
  -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
}

.input{
	border: 0;
}

body {
    
	margin-left: auto;
	margin-right: auto;
}


</style>
<style type="text/css"> 
@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 
* {  
     
    font-family:Arial, "times New Roman", tahoma;  
    font-size:12px;  
}  

h4{
	
	margin-left: 10px;
} 

 
 
</style> 
<body>
<?php

 // for ($i=0;$i<count($_POST["orderID"]);$i++)
 // {
 //  if(trim($_POST["orderID"][$i]) !="")
 //  {  
mysql_connect("localhost","root","password");
	mysql_select_db("sermmit");
    $sql = "SELECT * FROM ordertype WHERE order_id = '".$_GET["orderID"]."'";
  $query = mysql_query($sql);
 
  $result = mysql_query($sql) or exit($sql);

  $row = mysql_fetch_array($result);
 
  $id    = $row["order_id"];
  $amount           = $row["sumo"];
  date_default_timezone_set('Asia/Bangkok');
  $date=@date('d/m/Y');
     
		$sql = 'SELECT foodorderinpput.food_id, foodorderinpput.price_sum, foodmenu.type_id 
					FROM foodorderinpput 
					JOIN foodmenu
					ON foodmenu.food_id = foodorderinpput.food_id
					WHERE foodorderinpput.order_id = '.$_GET["orderID"].'
					';
					
		$result = mysql_query($sql);
		$res2 = mysql_query('SELECT salepersen FROM saledata WHERE dateup IN (SELECT MAX(dateup) FROM saledata)');
		$percent = mysql_fetch_array($res2);
		$sum = 0;
		$suma = 0;
		$drink_price = 0;
			while($rs=mysql_fetch_array($result))
			{
				if($rs['type_id']!=13)
				{
					$sum += $rs['price_sum'];
				}
				else
				{
					$drink_price += $rs['price_sum'];
				}
				
			$suma += $rs['price_sum'];	
			
			}
			if(($_POST["txtsale"])=="1")
			{
				$discount = $sum*($percent['salepersen']/100);
					
				
				
			}
			else
			{
				$discount = 0;
				
			}
			
				$sum -= $discount;
				$sum += $drink_price;
			
			//echo 'sum = '.$sum;
			

			$strSQL = "UPDATE ordertype SET ";
			
			$strSQL .="sumo = '".ceil($sum)."' ";
			$strSQL .=",suma = '".$suma."' ";
			$strSQL .=",saleq = '".$_POST["txtsale"]."' ";
			$strSQL .="WHERE order_id = '".$_GET["orderID"]."' ";
			
		
		
	
			
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>



<?php
        			//เล่มที่
					$sqlb = "SELECT bill_id FROM ordertypecomplete";
					$queryb = mysql_query($sqlb);
					$booknum = "001" ;
					while ($resultb = mysql_fetch_assoc($queryb)) {
						$number1 = $resultb['bill_id'];
						$ft = $number1 % 49;
						$booknum = (( $number1-$ft) / 49 )+($ft? 1 : 0);
						$booknum = sprintf("%03d",$booknum);
						//echo 'number=',$number1,'  booknum=',$booknum,"<br />\n";
}
			
					//เลขที่ 
        			$number = mysql_result(mysql_query("SELECT Max(bill_id)+1 AS MaxID FROM ordertypecomplete"),0,"MaxID");//เลือกเอาค่า id ที่มากที่สุดในฐานข้อมูลและบวก 1 เข้าไปด้วยเลย
            		if($number == ''){ // ถ้าได้เป็นค่าว่าง หรือ null ก็แสดงว่ายังไม่มีข้อมูลในฐานข้อมูล
                		$num = "0001";
            		}
            		else {
                		$num = sprintf("%04d",$number);//ถ้าไม่ใช่ค่าว่าง
            		}
					
				//	echo $num;
				//	echo $booknum;
        		?>




<form action="completeorder3.php?orderID=<?php echo $_GET["orderID"];?>&orderDate=<?php echo $_GET["orderDate"];?>" name="frmEdit" method="post">
<table width="450" border="0" align="center">
 
  <tr>
    <td colspan="4" align="center">ใบเสร็จรับเงิน
    </td>
  </tr>
    <tr>
    <td colspan="4" align="center"><strong>เสริมมิตรโภชนาซีฟู้ด</strong>
    </td>
  </tr>
  <tr>
    <td colspan="4" align="center">64/9 ถ. หลวงหมายเลข36 ต. มาบข่า อ. นิคมพัฒนา จ. ระยอง 21180
    </td>
  </tr>
   <tr>
    <td colspan="4" align="center">เบอร์โทรศัพท์  090-7307456 , 090-7268456
    </td>
  </tr>
 <tr>
    <td colspan="4">&nbsp;</td>
  </tr>

  <tr>
      <td height="15" colspan="2" align="left">เล่มที่ :   <input class="input" name="booknum" type="text" id="booknum" value="<?php echo $booknum ?>" readonly /> </td>
    </tr>
<tr>	
	  <td height="15" colspan="2" align="left"> เลขที่ :  <input class="input" name="num" type="text" id="num" value="<?php echo $num ?>" readonly /></td>
    <td height="15" colspan="2" align="right">วันที่ : <?php echo $date ?></td>
	
 <input type="hidden" name="saleper" id="saleper" value="<?php echo $percent['salepersen']; ?>" />

  </tr>
  
<tr>
    <td>&nbsp;</td>
    
  </tr>
 
  <tr>
    <td height="15" colspan="4">ชื่อลูกค้า :
	      <input class="input" name="namec" size="30" type="text" id="namec"/>

	</td>
	
  </tr>
  <tr>
    <td height="15" colspan="4">ที่อยู่ : 
	 <input class="input" name="addc" size="50" type="text"  id="addc"/>
	</td>
  </tr>
 
 
 
 <?php
$objConnect = mysql_connect("localhost","root","password") or die("Error Connect to Database");
$objDB = mysql_select_db("sermmit");
mysql_query("SET NAMES utf8");
 // mysql_query("SET NAMES utf8");
//$strSQL = "SELECT food_id,SUM(numfood),foodname,SUM(price_sum) FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."' GROUP BY food_id";

$strSQL = "SELECT foodorderinpput.date_input, SUM(price_sum),SUM(numfood), foodorderinpput.numfood, foodorderinpput.price_sum , foodorderinpput.food_id , foodmenu.food_name ,foodmenu.food_price
FROM foodorderinpput INNER JOIN foodmenu ON foodorderinpput.food_id=foodmenu.food_id WHERE order_id = '".$_GET["orderID"]."'GROUP BY food_id";


//$strSQL = "SELECT * FROM foodorderinpput Inner Join foodmenu ON foodmenu.food_id = foodorderinpput.food_id"; 

$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

//$sumtotal = "SELECT SUM(price_sum) AS Total FROM foodorderinpput";



?>
<tr>
    <td>&nbsp;</td>
    
  </tr>
<tr>
   <td >ชื่ออาหาร</td>
  	<td>จำนวนที่สั่ง</td>
	<td>ราคาต่อหน่วย(บาท)</td>
	<td align="right">ราคารวม(บาท)</td>

<tr>


  <?php
while($objResult = mysql_fetch_array($objQuery))
{
	//$sumorder1=$objResult['to2']; 
?>
  
    
   
	

<tr>
   <td> <?php echo $objResult["food_name"];?> </td>
  	<td><?php echo $objResult["SUM(numfood)"];?></td>
	<td><?php echo $objResult["food_price"];?></td>
	<td align="right"><?php echo $objResult["SUM(price_sum)"];?> </td>

	
	
<tr>
 
  <?php
}
?>
 
 <br />
 

				<tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <?php 
			$strSQL = "SELECT * FROM foodorderinpput WHERE order_id = '".$_GET["orderID"]."'";
						$strSQL= 'SELECT SUM(price_sum) AS Total FROM foodorderinpput WHERE order_id = '.$_GET['orderID'].' AND date = "'.$_GET["orderDate"].'"';
			$result=mysql_query($strSQL);
			while($rs=mysql_fetch_array($result)){

				$sumorder=$rs['Total']; 
				
				$strSQL = "UPDATE ordertype SET ";
				$strSQL .="suma = '".$sumorder."' ";
				$strSQL .="WHERE order_id = '".$_GET["orderID"]."' ";

				} 
				

				?>
  <tr>
  <td>&nbsp;</td>
    
    <td height="15" align="right" colspan="4">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;
	ราคารวมทั้งหมด : &nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($sumorder,2, '.', ','); ?> บาท</td>
  </tr>

  <tr>
  <td>&nbsp;</td>
    
    <td height="15" align="right" colspan="4">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	ราคาสุทธิ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format(ceil($sum),2, '.', ','); ?> บาท</td>
  </tr>
 <?php
// $s = $_POST["txtsale"];
	if(($_POST["txtsale"]) == "1")
			{
				//$discount = $sum*($percent['salepersen']/100);
				echo "<tr><td colspan='3'>&nbsp; **มีส่วนลดเฉพาะค่าอาหาร  ";	
				echo $percent['salepersen'];
				echo " เปอร์เซ็นต์</td>  </tr>";
			}
 ?>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
  <td align="left" colspan="4">&nbsp;(รวมภาษีมูลค่าเพิ่มแล้ว)</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    
    <td align="center">&nbsp;</td>
  </tr>
    <tr>
    <td height="15" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	
	ผู้รับเงิน/ผู้ขาย 

	</td>
	
  </tr>
<tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="15" align="right" colspan="4">_____________________________

	</td>
	
  </tr>
  <?php
 //  }
 // }
  /* (<?php echo num2string($amount) ?>)*/
?>

</table>

<?php
/*function num2string($amount)
{
 $digit=Array("หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");
 $unit=Array("สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน");
 if($amount==0)
 return "ศูนย์บาทถ้วน";

 if(strpos($amount,".")==0)
 $amount.=".00";

 $tmp=substr($amount,0,strpos($amount,"."));
 while(strlen($tmp)>6)
 {
  $cut=strlen($tmp)%6;
  if($cut==0)$cut=6;
  $data=substr($tmp,0,$cut);
  for($i=0;$i<strlen($data)-2;$i++)
  {
   
	  if($data[$i]==0)
       continue;

      $ans.=$digit[$data[$i]-1].$unit[strlen($data)-$i-2];
     }
     $ans.=num2string_2digit(substr($data,strlen($data)-2))."ล้าน";
     $tmp=substr($tmp,$cut);
   }

   for($i=0;$i<strlen($tmp)-2;$i++)
   {
     if($tmp[$i]==0)
     continue;

     $ans.=$digit[$tmp[$i]-1].$unit[strlen($tmp)-$i-2];
   }

   $ans.=num2string_2digit(substr($tmp,strlen($tmp)-2))."บาท";

   $tmp=substr($amount,strpos($amount,".")+1);
   if(substr($tmp,0,2)=="00")
    return $ans."ถ้วน";

   return $ans.num2string_2digit($tmp)."สตางค์";
}
function num2string_2digit($amount)
{
 $digit=Array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");

   $ans="";
   $amount=sprintf("%d",$amount);

   if(strlen($amount)==1)
    return $digit[$amount];

 if($amount[0]==2)
    $ans.="ยี่";
   else if($amount[0]>2)
    $ans.=$digit[$amount[0]];

   if($amount[0]>0)
    $ans.="สิบ";

   if($amount[1]>1)
    $ans.=$digit[$amount[1]];
   else if($amount[1]==1)
    $ans.="เอ็ด";

   return $ans;
}
*/
?>

 <div id="non-printable"><input type="button" name="submit" value="พิมพ์ใบเสร็จ" onClick="window.print()"></div>
 <br />
<div id="non-printable"><input type="submit" name="submit" value="ทำรายการเสร็จสิ้น"></div>
</form>

</body>
</html>