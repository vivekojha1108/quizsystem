<?php
   session_start();
   
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
   
   $con = mysqli_connect('localhost','root');
  
   	mysqli_select_db($con,'quizdb');
   
   ?>
   
<!DOCTYPE html>
<html>
   <head>
      <title>Quiz Contest LPU</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

      <style type="text/css">
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
         .quizsetting{
            height: 1400px;
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

      <div>
         <h1 class="text-center text-white font-weight-bold text-uppercase animateuse bg-dark" >  Attemp the Quiz  </h1><br>
      <div class="container "><br>
         <div class="container">
   
            <div class=" col-lg-12 text-center">
               <h3> <a href="#" class="text-uppercase text-warning"> <?php echo $_SESSION['username']; ?>,</a> Welcome to Quiz System </h3>
            </div>
            <br>
            <div class="col-lg-8 d-block m-auto bg-light quizsetting ">
               <div class="card">
                  <p class="card-header text-center text-uppercase text-warning" > <?php echo $_SESSION['username']; ?>, You have to select only one option out of 4 option. Best of Luck &#128077;</p>
               </div>
            <br>

               <form action="checked.php" method="post">

                  <?php
                     for($i=1;$i<6;$i++)
                     {
                        $l = 1;
                        $ansid = $i;

                        $sql1 = "SELECT * FROM `questions` WHERE `qid` = $i ";
                     	$result1 = mysqli_query($con, $sql1);

                     		if (mysqli_num_rows($result1) > 0)
                            {
                     						while($row1 = mysqli_fetch_assoc($result1)) {
                  ?>	

                        <br>
                        
                        <div class="card">
                           <br>
                           <p class="card-header"> 
                           <?php echo $i ." : ". $row1['question']; ?> </p>
                          
                           <?php
                              $sql = "SELECT * FROM `answers` WHERE `ans_id` = $i ";
                              	$result = mysqli_query($con, $sql);

                              		if (mysqli_num_rows($result) > 0) {
                              						while($row = mysqli_fetch_assoc($result)) {
                              	?>	
                                 
                           <div class="card-block">
                              <input type="radio" name="quizcheck[<?php echo $ansid; ?>]" id="<?php echo $ansid; ?>" value="<?php echo $row['aid']; ?>" >
                               <?php echo $row['answer']; ?> 
                              <br>
                           </div>

                           <?php
                              
                              } } 
                              $ansid = $ansid + $l;
                              } }}
                              
                           ?>
                        </div>

                  <br>
                  <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
               </form>


               <p id="letc"></p>
            </div>
            <br>
            <a href="logout.php" class="btn btn-primary d-block m-auto text-white" > Logout </a> <br>
         </div>
         <br>



        
<div class="footer">

    <footer >
             Created by Vivek Ojha || Reg. NO. 11602745 || Section (KE013)
         </footer>
</div>


   </body>
</html>
