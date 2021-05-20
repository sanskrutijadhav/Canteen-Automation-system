<?php
	session_start();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hello <?php echo $_SESSION['name'];?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="image/kamu-logo-icon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="../image/kamu-logo-icon.png" style="width: 70px;height: 50px" class="navbar-brand">
      <p class="navbar-text" style="color: #00cc33"> <strong>Welcome <?php echo $_SESSION['name']?></strong></p>
    </div>
    <ul class="nav navbar-nav"><li class="active"><a href="seller.php">View Orders</a></li>
    </ul>
    <ul class="nav navbar-nav"><li><a href="manageFoods.php">Manage foods</a></li>
    </ul>
   <ul class="nav navbar-nav"><li><a href="chr/chart.php">Get Analyze Report</a></li>
    </ul>
   <ul class="nav navbar-nav"><li><a href="getFeedback.php">View Feedback</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>	

<div class="container-fluid" style=" margin-bottom: 20px;">
	<a href="viewAllOrders.php" class="btn btn-success">View All Orders</a>
	<a href="buyerDue.php" class="btn btn-success">View Orders by each user</a>
</div>
	<?php
		
		include '../conn.php';
		$date=date('Y-m-d');
		if($_SESSION['role']=="seller")
		{?>
		<div class="container-fluid">
		<div class="table-responsive">
		<table  class="table table-striped table-hover table-bordered">
		<thead>
		<tr>
			<th>Order ID</th>
			<th>Ordered by</th>
			<th>Date</th>
			<th>Meal</th>
			<th>Food Name</th>
			<th>Quantity</th>			
		</tr>
		</thead>
		<tbody>
	<?php
		
			$eid=$_SESSION['eid'];
			$query="select orderId,name,orderDate,meal,foodName,qty from orderInfo,user where user.eid=orderInfo.eid AND orderDate='".$date."'";
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				?>
				<tr>
					<td><?php echo $row['orderId'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['orderDate'];?></td>
					<td><?php echo $row['meal'];?></td>
					<td><?php echo $row['foodName'];?></td>
					<td><?php echo $row['qty'];?></td>
				</tr>
			<?php
			}?>
		</tbody>
		</table>
		</div>
		</div>
		<?php
		}
		
		?>
</body>
</html>

