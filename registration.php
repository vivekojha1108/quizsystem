<?php

session_start();
// header('location:index.php');
// header('Location:index.php?registered=true');

$con = mysqli_connect('localhost','root');

	 if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

	mysqli_select_db($con,'quizdb');


	$username = $_POST['username'];
	$password = $_POST['password'];

	// echo $username;


	$query = "SELECT * FROM quizregistration WHERE username='$username'";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

	if ($count>0) {
		echo '<script>alert("Sorry! This Username already exists! GO BACK and Try again with new username!!!")</script>';
		
		 //echo 'Sorry! This Username already exists! try again!!!';
		// header('location:index.php');
		// header('Location:index.php?registered=false');


		}

		 else {

		 	$qry = "INSERT INTO quizregistration(username, password) VALUES ('$username', '$password')"  ;
				$result = mysqli_query($con,$qry);
				echo 'You have registered successfully. Now try to login for Participate in Quiz...' ;
				header('Location:index.php?registered=true');
		}


if (!$result) {
	    die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);

?>




