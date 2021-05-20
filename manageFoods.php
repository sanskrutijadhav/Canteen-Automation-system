<?php
	session_start();
	if($_SESSION['role']!='seller')
		header("Location: ../index.html");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Foods</title>
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
    <ul class="nav navbar-nav"><li ><a href="seller.php">View Orders</a></li>
    </ul>
    <ul class="nav navbar-nav"><li class="active"><a href=#>Manage foods</a></li>
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
</body>
</html>

<?php
	
	include('../conn.php');
	extract($_POST);
	global $con;
	mysqli_select_db($con,"kamu");
	
	$q1="select * from food";
	$result=mysqli_query($con,$q1);
	
	echo "<div class='container well'>";
	echo "<div class='table-responsive'>";
	echo "<table class='table table-striped table-hover table-bordered'>";
		echo "<tr>";
			echo "<th>Food Name</th>";
			echo "<th>Type</th>";
			echo "<th>Price</th>";
			echo "<th>Action</th>";
		echo "</tr>";
		
		while($row=mysqli_fetch_assoc($result))
		{
			echo "<tr>";
				echo "<td>{$row['foodName']}</td>";
				echo "<td>{$row['type']}</td>";
				echo "<td>{$row['price']}</td>";
				echo "<td>";
					echo "<form action='deleteFood.php' method='GET'>";
						echo "<input type='hidden' name='foodId' value=".$row['foodId'].">";
						echo "<input type='submit' name='btndelete' value='Delete' class='btn btn-success btn-block'>";
					echo "</form>";
				echo "</td>";
			echo "</tr>";
		}?>
	
	</table>
	</div>
	<a href="addFoods.php" class="btn btn-danger"> Add a Food item</a>
	</div>

