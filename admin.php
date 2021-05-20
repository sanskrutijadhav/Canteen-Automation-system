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
    <ul class="nav navbar-nav"><li class="active"><a href=#>User Management</a></li>
    </ul>
    <ul class="nav navbar-nav"><li><a href="foodMgt.php">Food Management</a></li>
    </ul>
   <ul class="nav navbar-nav"><li><a href="chr/chart.php">Get Audit Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>		
	<?php
		include "../conn.php";
		if($_SESSION['role']=="admin")
		{?>
		<div class="container-fluid">
			<div class="agile-tables">
			<div class="w3l-table-info">
				<table class="table table-striped table-hover table-bordered">
				<tr>
				<th>Emp Id</th>
				<th>Name</th>
				<th>Role</th>
				<th></th>
				</tr>

<?php


		$sql1 = 'select * from user';

		$result = mysqli_query($con,$sql1);



					while($row = mysqli_fetch_assoc($result)){
						echo "<tr>
									<form action='removeuser.php' method='post'>
									<input type='hidden' name='eid' value='".$row['eid']."'>
									<td>".$row['eid']."</td>
									<td>".$row['username']."</td>
									<td>".$row['role']."</td>
									<td> <input type ='submit' name='remove' value='Remove' class='btn btn-success'></td>
									</form>
									</tr>"
									;
					}


			mysqli_close($con);

 }?>

</table>
</div>
</div>
</div>
</body>
</html>