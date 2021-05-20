<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Orders Analysis</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="http://localhost/PHP/kamu/files/image/kamu-logo-icon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://localhost/PHP/kamu/files/css/style.css">
	
	
	<style type="text/css">
	
			#content {
				width:auto;
			}
			
	
		
			
			#chart-containere {
				width: 500px;
				height: 400px; 
			}
		
		
			
	</style>
	<script>
					function validateForm(input1){				
					var x =input1.value;
					
					if (x == "" ) {
					alert("Date field must be filled out");
						return false;
						}
						return true;
					}
					
				</script>


</head>
	


		<body>
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="http://localhost/PHP/kamu/files/image/kamu-logo-icon.png" style="width: 70px;height: 50px" class="navbar-brand">
      <p class="navbar-text" style="color: #00cc33"> <strong>Welcome <?php echo $_SESSION['name']?></strong></p>
    </div>
    <ul class="nav navbar-nav"><li><a href="../admin.php">User Management</a></li>
    </ul>
    <ul class="nav navbar-nav"><li><a href="../foodMgt.php">Food Management</a></li>
    </ul>
   <ul class="nav navbar-nav"><li class="active"><a href=#>Get Audit Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
		
				<script src="Chart.min.js"></script>
				<script src="jquery.min.js"></script>
				<script src="app.js"></script>
				<script src="app2.js"></script>
				
			<div style="width:80%;height:80%;">
			<div id="content">
		
					<div id="chart-containers" >
					<canvas  id="mycanvase"> </canvas>
					</div>
				
						<div class="container-fluid well" style="width:300px;height:120px;">
							
								<form name="dateForm"  method="POST" id="myform" onsubmit="validateForm() " class="form-login">
										Get Report for:
										<input type="text" name="Dates" id="1">
										
										
										<br>days<br>
										<input type="button" value="Submit" name="submit" id="postData" onclick="validateForm(document.dateForm.Dates)">
								</form>
						</div>
			
			</div>
			</div>
				
		</body>
</html>