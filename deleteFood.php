<?php
	session_start();
	if($_SESSION['role']!='seller')
		header("Location:localhost/PHP/kamu/index.html");
?>

<?php
	include('../conn.php');
	extract($_POST);
	
		
	if(isset($_GET['btndelete']))
	{
		$sql="delete from food where foodId={$_GET['foodId']}";
		if(mysqli_query($con,$sql))
			header("Location: manageFoods.php");
		else
			echo "Query Error<br>".mysqli_error($con);
	}

?>
