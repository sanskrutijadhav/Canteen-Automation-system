<?php
header('Content-Type:application/json');
include("../../conn.php");
    
//extract($_POST);
	
	$data=extract($_POST);
	$date = date('Y-m-d');
	
    $sql1="SELECT  foodName as Food , SUM( qty ) as sum FROM  `orderInfo` where orderDate='{$date}' GROUP BY  `foodName` ";
   
	
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to DataBase: " . mysqli_connect_error();
	}
	else
	{
		if(empty($data))
		{
			$data_points = array();
			$result = mysqli_query($con, $sql1);
			while($row = mysqli_fetch_array($result))
			{        
				$point = array("label" => $row['Food'] , "y" => $row['sum']);
			
				array_push($data_points, $point);        
			}
			echo json_encode($data_points, JSON_NUMERIC_CHECK);
		}
		else
		{
			$datan = array();
			$dateBack= date('Y-m-d', time() + (60 * 60 * 24 * -(int)$Dates) );
			$sql2="SELECT  foodName as Food , SUM( qty ) as sum FROM  `orderInfo` where orderDate between '{$dateBack}' And '{$date}' GROUP BY  `foodName` ";
			$result = mysqli_query($con, $sql2);
			while($row = mysqli_fetch_array($result))
			{        
				$point = array("label" => $row['Food'] , "y" => $row['sum']);
			
				array_push($datan, $point);        
			}
			echo json_encode($datan, JSON_NUMERIC_CHECK);
		}
		

		// Console.log($data_points);
	}
		mysqli_close($con);
		
		
		
?>
	 
