<?php
	session_start();
	include "../conn.php";
?>

<?php
	if(isset($_POST['remove'])){
		
		$sql="delete from user where eid={$_POST['eid']}";
		if(mysqli_query($con,$sql))
			header("Location: admin.php");
		else
			echo "Query Error<br>".mysqli_error($con);
	
	}
?>