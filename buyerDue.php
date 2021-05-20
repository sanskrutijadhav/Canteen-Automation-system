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
	<?php
		include '../conn.php';
		
		?>
		<form action="buyerDue.php" method="post">
			<div class="row">	
				<div class="col-sm-4">
				<label for="from">User Name :</label>
				<select name="buyer">
					<?php
						$sql2="select U.eid,U.name from user U where U.role='buyer'" ;
						$result=mysqli_query($con,$sql2);
						while($row=mysqli_fetch_assoc($result)){
							echo "<option value='{$row['eid']}'> {$row['name']}</option>";
						}
					?>
				</select>
				</div>
			
				<div class="col-sm-4">
				<input type="submit" class="btn btn-success" name="view" value="View" id="view" style="height:60px; width:100px;">
				</div>
			</div>
  			
</form>
<a href="viewAllOrders.php" class="btn btn-success" style="margin-left: 200px; margin-bottom: 20px;">View All Orders</a>

		<?php
		
		$count=0;
		if($_SESSION['role']=="seller")
		{?>
		<div class="container-fluid well">

		<div class="table-responsive">
		<table  class="table table-striped table-hover table-bordered">
		<thead>
		<tr>
			<th>User ID</th>
			<th>User Name</th>
			<th>Total Due</th>
						
		</tr>
		</thead>
		<tbody>
	<?php
			$data=extract($_POST);
			$date=date('y-m-d');
			$d=substr($date,-2);
			$firstDate= date('Y-m-d', time() + (60 * 60 * 24 * (1-(int)$d)) );
			$eid=$_SESSION['eid'];
			
			if(empty($data)){
				$query="select U.eid,name,sum(qty*price) as Total from orderInfo O,user U where U.eid=O.eid AND orderDate between '".$firstDate."' And '".$date."' group by O.eid";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_assoc($result))
				{
					?>
					<tr>
						<td><?php echo $row['eid'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['Total'];?></td>

					</tr>
				<?php
				}
			}
			else{
				$query1="select U.eid,name,sum(qty*price) as Total from orderInfo O,user U where U.eid=O.eid AND U.eid={$buyer} AND orderDate between '".$firstDate."' And '".$date."' group by O.eid";
				
				$result=mysqli_query($con,$query1);
				while($row=mysqli_fetch_assoc($result))
				{
					?>
					<tr>
						<td><?php echo $row['eid'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['Total'];?></td>

					</tr>
				<?php
				$count++;
				}
				
			}?>
		</tbody>
		</table>
		</div>
		<?php
			if($count==0 && !empty($data)){
				echo "<h2 style='margin-left:100px; font-family: 'Source Sans Pro', sans-serif; color: #f45642; text-align:center;''>No orders for this buyer</h2>";
			}
		?>
		</div>
		<?php
		}
		
		?>
</body>
</html>

