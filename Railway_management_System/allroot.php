<?php include_once "session.php";?>

<?php
include_once "include/header.php";
include_once "include/connect.php";
include_once "include/nav.php";
?>

	
	<br>
  <h1 style="text-align:center;">Find Train</h1>

	<form action="allroot.php" method="post" align='center'>
  	<div class="container">
    
    <hr>
    <label for="Ori"><b>From</b></label>
    <select name="Ori">
      <option value="Dhaka">Dhaka  </option>
      <option value="Chittagong">Chittagong   </option>
      <option value="Sylet">Sylhet   </option>
      <option value="Rajshahi">Rajshahi    </option>
      <option value="Mymensingh">Mymensingh    </option>
      <option value="Khulna">Khulna    </option>
      <option value="Barisal">Barisal   </option>
      <option value="Airport">Airport   </option>
      <option value="Pabna">Pabna   </option>
      <option value="Norsingdi">Norsingdi   </option>
      <option value="Joydebpur">Joydebpur   </option>
      <option value="Mymensing">Mymensing   </option>
      <option value="Comilla">Comilla   </option>
      <option value="Dinajpur">Dinajpur   </option>
      <option value="Noakhali">Noakhali   </option>
    </select>
    

    <label for="Dest"><b>To</b></label>
    <select name="Dest">
      <option value="Dhaka">Dhaka  </option>
      <option value="Chittagong">Chittagong   </option>
      <option value="Sylet">Sylhet   </option>
      <option value="Rajshahi">Rajshahi    </option>
      <option value="Mymensingh">Mymensingh    </option>
      <option value="Khulna">Khulna    </option>
      <option value="Barisal">Barisal   </option>
      <option value="Airport">Airport   </option>
      <option value="Pabna">Pabna   </option>
      <option value="Norsingdi">Norsingdi   </option>
      <option value="Joydebpur">Joydebpur   </option>
      <option value="Mymensing">Mymensing   </option>
      <option value="Comilla">Comilla   </option>
      <option value="Dinajpur">Dinajpur   </option>
      <option value="Noakhali">Noakhali   </option>
    </select> 
    <input name="register" type="submit" class="btn btn-primary" value="Find">
	</div>
  
  </form>

  

<div align="center"> 

<?php

   if(isset($_POST['register']))
   {
      $Origin = $_POST['Ori'];
      $Destination = $_POST['Dest'];
      $sql = "SELECT * FROM interlist WHERE Ori =('$Origin')  AND Dest = ('$Destination')";

      if($result = mysqli_query($con, $sql)){
       if(mysqli_num_rows($result) > 0){
         echo "<table>";

         echo "<tr>";
         echo "<th>Number</th>";
         echo "<th>Train Name</th>";
         echo "<th>1st Station</th>";
         echo "<th>Arrival Time</th>";
         echo "<th>2nd Station</th>";
         echo "<th>Arrival Time</th>";
         echo "<th>3rd station</th>";
         echo "<th>Arrival Time</th>";
         echo "<th>4th Station</th>";
         echo "<th>Arrival Time</th>";
         echo "<th>5th Station</th>";
         echo "<th>Arrival Time</th>";
         echo "<th>Start From</th>";
         echo "<th>Start Time</th>";
         echo "<th>last Station</th>";
         echo "<th>Reach Time</th>";
         echo "</tr>";

         while($row = mysqli_fetch_array($result)){
           echo "<tr>";
           echo "<td>" . $row['Name'] . "</td>";
           echo "<td>" . $row['Number'] . "</td>";
           echo "<td>" . $row['st1'] . "</td>";
           echo "<td>" . $row['st1arri'] . "</td>";
           echo "<td>" . $row['st2'] . "</td>";
           echo "<td>" . $row['st2arri'] . "</td>";
           echo "<td>" . $row['st3'] . "</td>";
           echo "<td>" . $row['st3arri'] . "</td>";
           echo "<td>" . $row['st4'] . "</td>";
           echo "<td>" . $row['st4arri'] . "</td>";
           echo "<td>" . $row['st5'] . "</td>";
           echo "<td>" . $row['st5arri'] . "</td>";
           echo "<td>" . $row['Ori'] . "</td>";
           echo "<td>" . $row['Oriarri'] . "</td>";
           echo "<td>" . $row['Dest'] . "</td>";
           echo "<td>" . $row['Desarri'] . "</td>";
           
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








