<?php include_once "session.php";?>
<?php
include_once "include/header.php";
include_once "include/connect.php";
include_once "include/nav.php";
?>
  

 
  <br>
	<!-- Form -->
	<h1 style="text-align: center; ">Find Train</h1>
  
  

	<form action="find.php" method="post" align='center'>
  	<div class="container">
    
    <hr>
    <label for="Origin"><b>Departure From : </b></label>
    <select name="Origin">
      <option value="Dhaka">Dhaka  </option>
      <option value="Chittagong">Chittagong   </option>
      <option value="Sylhet">Sylhet   </option>
      <option value="Rajshahi ">Rajshahi    </option>
      <option value="Mymensingh ">Mymensingh    </option>
      <option value="Khulna ">Khulna    </option>
      <option value="Barisal ">Barisal   </option>
    </select>
    <label for="Destination"><b>Destination To</b></label>
    <select name="Destination">
      <option value="Dhaka">Dhaka  </option>
      <option value="Chittagong">Chittagong   </option>
      <option value="Sylhet">Sylhet   </option>
      <option value="Rajshahi ">Rajshahi    </option>
      <option value="Mymensingh ">Mymensingh    </option>
      <option value="Khulna ">Khulna    </option>
      <option value="Barisal ">Barisal   </option>
    </select>

    
    
	
    <input name="register" type="submit" class="btn btn-primary" value="Find">
	</div>
  
  </form>

  <hr>

<div align="center"> 
<?php

   if(isset($_POST['register']))
   {
      $Origin = $_POST['Origin'];
      $Destination = $_POST['Destination'];
      $sql = "SELECT * FROM train_list WHERE Origin=('$Origin')  AND Destination=('$Destination')";

      if($result = mysqli_query($con, $sql)){
       if(mysqli_num_rows($result) > 0){
         echo "<table>";
         echo "<tr>";
         echo "<th>Number</th>";
         echo "<th>Name</th>";
         echo "<th>From</th>";
         echo "<th>To</th>";
         echo "<th>Arrival</th>";
         echo "<th>Departure</th>";
         echo "<th>Date</th>";
         echo "</tr>";
         while($row = mysqli_fetch_array($result)){
           echo "<tr>";
           echo "<td>" . $row['Number'] . "</td>";
           echo "<td>" . $row['Name'] . "</td>";
           echo "<td>" . $row['Origin'] . "</td>";
           echo "<td>" . $row['Destination'] . "</td>";
           echo "<td>" . $row['Arrival'] . "</td>";
           echo "<td>" . $row['Departure'] . "</td>";
           echo "<td>" . $row['Date'] . "</td>";
           echo "</tr>";
         }
         echo "</table>";
       // Free result set
         mysqli_free_result($result);
       } else{
         echo "No records matching your query were found.";
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