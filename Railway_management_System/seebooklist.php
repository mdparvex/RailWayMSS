
<?php include_once "session.php";?>
<?php
include "include/header.php";
include "include/connect.php";
include_once "include/nav.php";

?>


  
  <br>

	<!-- Form -->
	<h1 style="text-align: center;color:#1ABC9C; ">Your Booking List</h1>

	<form action="seebooklist.php" method="post" align='center'>
  	<div class="container">
    
    <hr>
    
    
    <label for="doj"><b>Date of journey</b></label>
    <input type="date" placeholder="Enter " name="doj" required>
	
	<label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter" name="email" required>
	

	
	

    
    
	
    <input name="register" type="submit" class="btn btn-primary" value="Find">
	</div>
  
  </form>

  
<div align="center"> 

<?php

   if(isset($_POST['register']))
   {
     $book="Reserved";
     $doj=$_POST['doj'];
     $email=$_POST['email'];
      $sql =  "SELECT * FROM seats_availability WHERE doj = ('$doj')  AND email = ('$email') AND book = ('$book')";

      if($result = mysqli_query($con, $sql)){
       if(mysqli_num_rows($result) > 0){
         echo "<table>";

         echo "<tr>";
         echo "<th>Train Name</th>";
         echo "<th>JOurney Date</th>";
         echo "<th>Seat No</th>";
         echo "<th>Price</th>";
         echo "<th>Seat Type</th>";
         echo "<th>Email</th>";
         echo "<th>Status</th>";
         echo "</tr>";

         while($row = mysqli_fetch_array($result)){
           echo "<tr>";
           echo "<td>" . $row['Train_Name'] . "</td>";
           echo "<td>" . $row['doj'] . "</td>";
           echo "<td>" . $row['seatno'] . "</td>";
           echo "<td>" . $row['amount'] . "</td>";
           echo "<td>" . $row['condi'] . "</td>";
           echo "<td>" . $row['email'] . "</td>";
           echo "<td>" . $row['book'] . "</td>";
           ;
           
           echo "</tr>";
         }
         echo "</table>";
       // Free result set
         mysqli_free_result($result);
       } else{
         echo "<h2 style='color:red;'>You did not book any Ticket !<h2>";
       }
     } else{
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
     }
      // Close connection
     mysqli_close($con);
   }
        
     
     
     
?>
</div>



<?php include_once "include/footer.php"; ?>
