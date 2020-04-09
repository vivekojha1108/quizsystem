<?php
session_start();

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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
     <div class="container text-center" >
     	<br><br>
    	<h1 class="text-center text-success text-uppercase animateuse" > Quiz Contest Result Page</h1>
    	<br><br><br><br>

      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      	</tr>

      	<tr>
		      	<td>
		      		Questions Attempted
		      	</td>

    	         <?php
                 $counter = 0;
                 $Resultans = 0;

                    if(isset($_POST['submit'])){
                    if(!empty($_POST['quizcheck'])) {
                    // Counting number of checked checkboxes.
                    $checked_count = count($_POST['quizcheck']);
                ?>

            	<td>
                <?php
                echo "Out of 5, You have attempt ".$checked_count." option."; 
                ?>
              </td>
          	
                <?php
                  // Loop to store and display values of individual checked checkbox.
                  $selected = $_POST['quizcheck'];
                  
                  $q1= " select ans_id from questions";
                  $ansresults = mysqli_query($con,$q1);
                  $i = 1;

                    while($rows = mysqli_fetch_array($ansresults)) 
                    {
                    	$flag = $rows['ans_id'] == $selected[$i];
                    	
                    			if($flag)
                          {				
                    				// $counter++;
                    				$Resultans++;
                    			}
                       //    else{
                    			// 	$counter++;
                    			// }					
                    		    $i++;		
                    }
                  ?>
            	
        		<tr>
            			<td>
            				Your Total score
            			</td>
            			<td colspan="2">
              	    	<?php 
              	            echo " Your score is ". $Resultans.".";
              	            }
              	            else{
              	            echo "<b>Please Select Atleast One Option.</b>";
              	            }}


              $name = $_SESSION['username'];
              $finalresult = " insert into user(username,totalques, answerscorrect) values ('$name','5','$Resultans') ";

              $queryresult= mysqli_query($con,$finalresult); 

              	          ?>
              	   </td>
              </tr>


      </table>

      	<a href="logout.php" class="btn btn-success"> LOGOUT </a>
        <br>
        <br>
      </div>
  <!--   </tr>
  </table></div>
 -->
 
      <div>
            
            <?php 

              $tbquery= "select *  from user ";
              $qfire=mysqli_query($con,$tbquery);
              ?>
          

          <table align="center" class=" text-center table-hover" style="margin-bottom: 100px; margin-top: 100px; width: 400px; line-height: 40px;" border="3px">
            <tr>
              <th style="font-weight: bold; padding: 20px; background-color: #001a33; font-size: 28px; color: white; " colspan="2">Participants list</th>
            </tr>
            <tr>
              <th> Name </th>
              <th> Score </th>
            </tr>

            <?php
              while ($rows= mysqli_fetch_assoc($qfire)) {
                ?>

              <tr>
                <td><?php echo $rows['username']; ?></td>
                <td><?php echo $rows['answerscorrect']; ?></td>
              </tr>

            <?php
            }
            ?>
          </table>
      </div>

<div class="footer">
    <footer>
             Created by Vivek Ojha || Reg. NO. 11602745 || Section (KE013)
         </footer>
</div>

   </body>
</html>





