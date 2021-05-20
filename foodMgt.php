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
    <ul class="nav navbar-nav"><li><a href="admin.php">User Management</a></li>
    </ul>
    <ul class="nav navbar-nav"><li  class="active"><a href=#>Food Management</a></li>
    </ul>
   <ul class="nav navbar-nav"><li><a href="chr/chart.php">Get Audit Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>		
				<div class="container-fluid" style="margin-bottom: 20px;">

					<a  href="newFood.php" class="btn btn-success">Add new food</a>
							


					</div>	
	<?php
		include "../conn.php";
		if($_SESSION['role']=="admin")
		{?>
		<div class="container-fluid">
			<div class="agile-tables">
	<div class="w3l-table-info">

<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>Food Id</th>
				<th>Food Name</th>
				<th>Food Type</th>
				<th>Price</th>
				<th></th>
			</tr>
	<?php

			include('../conn.php');

			$sql1 = 'select * from food';

			$result = mysqli_query($con,$sql1);



						while($row = mysqli_fetch_assoc($result)){
							echo "<tr>
										<td>".$row['foodId']."</td>
										<td>".$row['foodName']."</td>
										<td>".$row['type']."</td>
										<td>".$row['price']."</td>
										<td> <form action='removefood.php' method='post'><input type ='hidden' name='foodName' value='".$row['foodName']."'><input type ='submit' name='remove' value='Remove' class='btn btn-success'></form></td>
										</tr>";
						}



				mysqli_close($con);

	 }?>

	 	</table>
	</div>
</div>
</div>
</body>
</html>