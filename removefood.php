<?php
	session_start();
	include "../conn.php";
?>

<?php
	if(isset($_POST['remove'])){
		
		$sql="delete from food where foodName='{$_POST['foodName']}'";
		if(mysqli_query($con,$sql))
			header("Location: foodMgt.php");
		else
			echo "Query Error<br>".mysqli_error($con);
	
	}
?>