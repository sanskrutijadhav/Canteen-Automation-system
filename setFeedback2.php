<?php
	session_start();
	if($_SESSION['role']!='buyer')
		header("Location: ../index.html");
?>

<?php
	include('../conn.php');	
	$date = date("Y/m/d");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Set Feedback</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="../image/kamu-logo-icon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body style="background-image: url('../image/kamu-bg.png'); background-repeat:repeat; background-attachment: fixed;">

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="../image/kamu-logo-icon.png" style="width: 70px;height: 50px" class="navbar-brand">
      <p class="navbar-text" style="color: #00cc33"> <strong>Welcome <?php echo $_SESSION['name']?></strong></p>
    </div>
    <ul class="nav navbar-nav"><li><a href="buyer.php">Order Foods</a></li>
    </ul>
    <ul class="nav navbar-nav"><li><a href="viewOrders.php">View Orders</a></li>
    </ul>
   <ul class="nav navbar-nav"><li class="active"><a href=#>Give Feedback</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

	<form action="setFeedback.php" method="POST" style="margin: 5%">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<?php echo "Feedback | ".$_SESSION['name']; ?>
			</div>
			<div class="panel-body">
				<textarea name='txtcomment' rows="10" style="width: 100%" maxlength="200" class="form-control" id="txtarea"></textarea>
			</div>
			<div class="panel-footer">
				<input type="submit" name="btn_comment" value="Submit" class="btn btn-success">
				<h5 class="pull-right" id="remaining"></h5>
				<script type="text/javascript">
					var txtmax = 200;
					$('#remaining').html(txtmax+' Characters Remaining');
					$('#txtarea').keyup(function(){
						var txtlen = $('#txtarea').val().length;
						var rem_num = txtmax - txtlen;
						$('#remaining').html(rem_num + ' Characters Remaining');
						if(rem_num<=10)
							$('#remaining').css("color","red");
						else
							$('#remaining').css("color","black");
					});
				</script>
			</div>
		</div>
	</form>
</body>
</html>

<?php 
	if(isset($_POST['btn_comment'])){
		$comment = mysqli_real_escape_string($con,$_POST['txtcomment']);
		$sql="INSERT INTO feedback (name,comment,date) VALUES ('{$_SESSION['name']}','{$comment}','{$date}')";
		if(mysqli_query($con,$sql)){
			echo '<script language="javascript">';
			echo 'alert("Feedback sent Successful.")';
			echo '</script>';
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Feedback Failed!")';
			echo '</script>';
		}

		echo "<script>setTimeout(\"location.href='buyer.php';\",50);</script>";
	}
 ?>
