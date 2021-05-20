<?php
	session_start();
?>
<html>
	<head>
	
	</head>
	<body>
		<?php
			include "../conn.php";
			if(isset($_POST['order']))
			{
				$eid=$_SESSION['eid'];
				$foodId=$_POST['foodId'];
				$meal=$_POST['meal'];
				$foodName=$_POST['foodName'];
				$price=$_POST['price'];
				$qty=$_POST['qty'];
				$total=$price * $qty;
				$date=date("Y/m/d");
				$query="insert into orderInfo(eid,orderDate,foodName,meal,price,qty,total) values(".$eid.",'".$date."','".$foodName."','".$meal."',".$price.",".$qty.",".$total.")";
				mysqli_query($con,$query);
				header("Location:viewOrders.php");
			}
		?>
	</body>
</html>
