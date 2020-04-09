
<?php 

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'quizdb');


	if (@$_GET['registered'] == 'true')
	{
		echo '<script>alert("You have registered successfully. Now LOGIN for Participate in Quiz...")</script>';
		//echo 'You have registered successfully. Now try to login for Participate in Quiz...' ;
	}

	// else{
		
	// 	echo '<script>alert("Sorry! This Username already exists! Try again with new username!!!")</script>';
	// 	//echo "Sorry! This Username already exists! Try again with new username!!!";
	// }
    


?>

<!DOCTYPE html>
<html>
<head>
	<title>Quiz Contest LPU</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	  <style type="text/css">

	  	body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
   background-color: #f1f1f1;
}

.header {
  overflow: hidden;
  text-decoration-style: solid;;
  text-decoration-line: overline underline;
  padding: 0;
}

.animateuse{
			animation: leelaanimate 0.5s infinite;
		}

@keyframes leelaanimate{
			0% { color: red },
			10% { color: yellow },
			20%{ color: blue }
			40% {color: green },
			50% { color: pink }
			60% { color: orange },
			80% {  color: black },
			100% {  color: brown }
		}


	  	.container{

		position: absolute;
		top:0;
		bottom: 0;
		left: 0;
		right: 0;
	  	margin: auto;
	  	padding: 50px;
		width:900px;
		height:400px;
	  	background-color: #e1e1d0;

	}

	#login_form{
		background-color: #2f6787;
		padding: 50px;
		width:350px;
		height:300px;
		float: right;
	}

	#signup_form{
		background-color:  #f5f5ef;
		padding: 50px;
		width:350px;
		height:300px;
	}

	input {
	  padding: 5px;
		  border: 1px solid red ;
		  border-radius: 3px;
}

input:hover{
	 box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

input[type=submit] {
	  padding: 10px 20px;
	  border: none;
		  background-color: #99e699;
		  float: right;
		  font-weight: bold;
		}

		input:focus {
  background-color: lightblue;
}

	  	
	 .footer {
   position: fixed;
   padding: 20px;
   left: 0;
   bottom: 0;
   font-weight: bold;
   width: 100%;
   background-color: #e1e1d0;
   color: black;
   text-align: center;
}

	  </style>

</head>
<body>

	<div class="header">
			<h1 align="center" class="animateuse" > Welcome to Quiz Contest Assignment LPU </h1><br>
	</div>

			<div class="container">
	
		<div id="login_form" class="Welcome" style="color: white;">

			<h3><center> ALREADY A STUDENT? LOGIN </center></h3>
			<hr>

			<form method="POST" action="login.php">
				<input type="text" placeholder= "username" name="username" class="" size="50px" required>
				<br>	<br>		
				<input type="password" placeholder= "password" name="password" class="" size="50px" required> 
				<br>	<br>		
				<input type="submit" value="Login" name="">
				<br> <br>	<br>
				<br>
			</form>
		</div>

<div id="signup_form" class="Welcome" style="color: black;">

			<h3><center> ARE YOU NEW? REGISTER </center></h3>
			<hr>

			<form method="POST" action="registration.php">
				<input type="text" placeholder= "username" name="username" class="" size="50px" required>
				<br>	<br>	
				<input type="password" placeholder="password" size="50px" name="password" required>	
				<br> <br>		
				<input type="submit" value="Register" name="submit">
				<br> <br>	<br>


			</form>
		</div>


	</div>

<div class="footer">
	 <footer >
             Created by Vivek Ojha || Reg. NO. 11602745 || Section (KE013)
         </footer>
</div>

	 

</body>
</html>