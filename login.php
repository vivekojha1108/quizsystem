<?php
session_start();


$con = mysqli_connect('localhost','root');

	if($con){
		echo"connection";
	}

	mysqli_select_db($con,'quizdb');


	$username = $_POST['username'];
	$password = $_POST['password'];

$q = " select * from quizregistration where username = '$username' && password='$password' ";

$result = mysqli_query($con,$q);

$row = mysqli_num_rows($result);

	if($row == 1)
	{

		$_SESSION['username'] = $username;

		$userquery = " insert into user(username) values ('$username')";
		$userresult = mysqli_query($con,$userquery) ;

		header('location:home.php');	
	}
	else{
		echo" login failed";
		header('location:index.php');
	}

?>