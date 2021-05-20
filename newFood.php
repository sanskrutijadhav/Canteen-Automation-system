<?php
	session_start();
	include('../conn.php');
	if($_SESSION['role']!='admin')
		header("Location: ../index.html");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Foods</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="icon" href="image/kamu-logo-icon.png">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <ul class="nav navbar-nav"><li  class="active"><a href="foodMgt.php">Food Management</a></li>
    </ul>
   <ul class="nav navbar-nav"><li><a href="chr/chart.php">Get Audit Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

	<div class="container well well-lg">
		<form action="newFood.php" method="GET">
			<div class="form-group">
				<label>Food Name</label>
				<input type="text" name="txtfood" class="form-control" placeholder="Food Name">
			</div>
			<div class="form-group">
				<label>Food Type</label>
				<select name='type' class="form-control">
					<option value='Non-Veg' selected>Non-Veg</option>
					<option value='Veg'>Veg</option>	
				</select>
			
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type='number' name='txtprice' placeholder='Food Price' class="form-control">
			</div>
			<input type='submit' name='btnAdd' value='Add' class="form-control btn btn-info">
		</form>
	</div>
</body>
</html>


<?php
	if(isset($_GET['btnAdd'])){
		
		$sql="insert into food (foodName,type,price) values ('{$_GET['txtfood']}','{$_GET['type']}',{$_GET['txtprice']})";
		$result=mysqli_query($con,$sql);

			if($result){
				echo "<div class='alert alert-success alert-dismissable container'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Successful!</strong> New Food Item Successfully added to the Database.</div>";
			}
			else
				echo "<div class='alert alert-danger alert-dismissable container'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Failed!</strong> Query Error!.</div>";
	}
?>
