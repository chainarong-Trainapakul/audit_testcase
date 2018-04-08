
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	date_default_timezone_set('Asia/Bangkok');
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "password";
	$dbName = "sermmit";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$work_time=@date('h:i:s: a');
	$date=@date('Y/m/d');
	$a = $_POST['txtfoodid'];
	$b = $_POST['txtnumfood1'];
	
	

	
	//print_r($a);echo "<br>";

	foreach ($b as $key => $value)
	{
		if ($value==null) 
		{
			unset($b[$key]);
			
		}
	}
	
 
	
	$new_b = array_values($b);
	
	
	$max = count($a);
	

	$food = array();
	for ($i=0; $i < $max; $i++) 
	{ 
		$sql = 'SELECT food_name FROM foodmenu WHERE food_id = "'.$a[$i].'"';
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		$foodname[$i] = $row['food_name'];
		
	}
	
	
	
	
	
	
	$sumOrder = array();
	$price = array();
	for ($i=0; $i < $max; $i++) 
	{ 
		$sql = 'SELECT food_price FROM foodmenu WHERE food_id = "'.$a[$i].'"';
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		$price[$i] = $row['food_price'];
		$sumOrder[$i] = $row['food_price']*$new_b[$i];
	}
	//print_r($sumOrder);
	

	for ($i=0;$i<$max;$i++)
	{
		//$sum=$new_price[$i]*$new_b[$i];
		
		//print_r($new_c[$i]);echo "<br>";
		//	print_r($new_b[$i]);echo "<br>";
		//	print_r($sum);echo "<br>";
			
		$sql = "INSERT INTO foodorderinpput (order_id,date_input,date,numfood,food_id,foodname,price_sum) VALUES ('".$_POST["txtorderid"]."','".$work_time."','".$date."','".$new_b[$i]."','".$a[$i]."','".$foodname[$i]."','".$sumOrder[$i]."')";
		$query = mysqli_query($conn,$sql); 
	}
	
	//print_r($new_b);
	/*
	foreach($a as $row=>$art){
		echo $art;
		
     $articles = mysql_real_escape_string($_GET['txtfoodid'][$row]);
		foreach($b as $row=>$art){
			$articless = mysql_real_escape_string($_POST['txtnumfood1'][$row]);
	
			$sql = "INSERT INTO foodorderinpput (order_id,date_input,numfood,food_id) VALUES ('".$_POST["txtorderid"]."','".$work_time."','".$articless."','".$articles."')";
			$query = mysqli_query($conn,$sql);
		}
	}
	*/
	echo "<script type='text/javascript'>alert('สั่งอาหารเรียบร้อยแล้ว ');</script>";
			echo "<script>window.location='foodorder.php'</script>";
	//header("location:inputfoodorder.php");
	mysqli_close($conn);
?>
