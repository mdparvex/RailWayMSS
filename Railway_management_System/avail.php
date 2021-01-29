<?php include_once "session.php";?>


<?php
include "include/header.php";
include "include/connect.php";
include_once "include/nav.php";
?>


  
  <br>

	<!-- Form -->
	<h1 style="text-align: center; ">Available Seat</h1>

	<form action="avail.php" method="post" align='center'>
  	<div class="container">
    
    <hr>
    <label for="Train_Name"><b>Train Name</b></label>
    <select name="Train_Name">
          <option value="Chitra Express">Chitra Express  </option>
          <option value="Subarna Espress">Subarna Espress   </option>
          <option value="Ekota Express">Ekota Express   </option>
          <option value="Upukol Express ">Upukol Express    </option>
          <option value="Uddayan Express ">Uddayan Express    </option>
        </select>

        <label for="doj"><b>Date of journey</b></label>
        <input type="Date" name="doj" required>


	
	

    
    
	
    <input name="register" type="submit" class="btn btn-primary" value="Find">
	</div>
  
  </form>


<div align="center"> 

<?php

   if(isset($_POST['register']))
   {

    
    $Train_Name=$_POST['Train_Name'];
    $doj=$_POST['doj'];
    $book="Free";
    $sql = "SELECT * FROM seats_availability WHERE Train_Name =('$Train_Name')  AND doj = ('$doj')  AND book = ('$book')";

      if($result = mysqli_query($con, $sql)){
       if(mysqli_num_rows($result) > 0){
         echo "<table>";

         echo "<tr>";
         echo "<th>Train Name</th>";
         echo "<th>Journey Date</th>";
         echo "<th>Seat No</th>";
         echo "<th>Price</th>";
         echo "<th>Seat Type</th>";
         echo "</tr>";

         while($row = mysqli_fetch_array($result)){
           echo "<tr>";
           echo "<td>" . $row['Train_Name'] . "</td>";
           echo "<td>" . $row['doj'] . "</td>";
           echo "<td>" . $row['seatno'] . "</td>";
           echo "<td>" . $row['amount'] . "</td>";
           echo "<td>" . $row['condi'] . "</td>"; 
           echo "</tr>";
         }
         echo "</table>";
       // Free result set
         mysqli_free_result($result);
       } else{
         echo "<h2 style='color:red;'>No seat is availabe.<h2>";
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
