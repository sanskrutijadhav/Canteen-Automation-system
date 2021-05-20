<?php
	global $con;
	$con=mysqli_connect("localhost","root","","kamu");
		if(!$con)
		{
			die('could not connect '.mysqli_error($con)."<br>");
		}		
?>
