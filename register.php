<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Kamu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/login.css">
    
</head>

<body >
	<?php
	include "conn.php";
	if(isset($_POST['register']))
	{
		$eid=$_POST['eid'];
		$name=$_POST['name'];
		$email=$_POST['username'];
		$password=$_POST['password'];
		$role=$_POST['role'];
		$pass=$password;

		$query="insert into user(eid,name,username,password,role) values(".$eid.",'".$name."','".$email."','".$pass."','".$role."')"	;
		if(mysqli_query($con,$query))
		{
			echo '<script language="javascript">';
			echo 'alert("Congratulations. Registration Successful.")';
			echo '</script>';

		}	
		else{
			echo '<script language="javascript">';
			echo 'alert("Please try again with true correct credentials!")';
			echo '</script>';
		}

		echo "<script>setTimeout(\"location.href='../index.html';\",50);</script>";
			
	}
?>
</body>

</html>

