<?php
	$con=mysqli_connect("localhost","root","");

	$query="create database kamu";
	if(mysqli_query($con,$query)){
		echo "Success database creation<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}
	mysqli_select_db($con,"kamu");

	$query="create table user(eid int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,name varchar(50),username varchar(20) UNIQUE,password varchar(32),role varchar(20))";
	if(mysqli_query($con,$query)){
		echo "Success user<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}


	$query="create table orderInfo(orderId int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,eid int,orderDate DATE,foodName varchar(20),meal varchar(20),price FLOAT(8,2),qty int,total FLOAT(8,2))";
	if(mysqli_query($con,$query)){
		echo "Success orderInfo<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}


	$query="create table food(foodId int UNIQUE PRIMARY KEY AUTO_INCREMENT,foodName varchar(20) UNIQUE,type varchar(20),price FLOAT(8,2))";
	if(mysqli_query($con,$query)){
		echo "Success food<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}



	//Feedback Table
	$query="create table feedback(fId int UNIQUE PRIMARY KEY NOT NULL AUTO_INCREMENT,name varchar(50),comment varchar(200),date DATE,reply varchar(200))";
	if(mysqli_query($con,$query)){
		echo "Success Feedback<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}

	$query="insert into user(name,username,password,role) values('Administrator','admin@kamu.com','0192023a7bbd73250516f069df18b500','admin')";
	if(mysqli_query($con,$query)){
		echo "Success admin insert<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}

	$query="insert into user(name,username,password,role) values('The Seller','seller@kamu.com','1e4970ada8c054474cda889490de3421','seller')";
	if(mysqli_query($con,$query)){
		echo "Success seller insert<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}

	$query="insert into user(name,username,password,role) values('The Buyer','buyer@kamu.com','40e868c2d8064888a2a3365a63a84d58','buyer')";
	if(mysqli_query($con,$query)){
		echo "Success Buyer insert<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}

	$query="insert into food(foodName,type,price) values('Rice','Non-Veg',100.00)";
	if(mysqli_query($con,$query)){
		echo "Success Food Rice insert<br/>";
	}
	else{
		echo "failed <br/>".mysqli_error($con);
	}


?>