<?php include_once "session.php";?>
<?php
include "include/header.php";
include "include/connect.php";
include_once "include/nav.php";

?>

<div align='center'>
<hr>
<h1 Style="color:Blue;font-weight:bold">Profile </h1>
<hr>
<?php

   if(isset($_SESSION['email']))
   {
     
     $email=$_SESSION['email'];
     
     
      $sql =  "SELECT * FROM users WHERE email = ('$email') ";

      if($result = mysqli_query($con, $sql)){
       if(mysqli_num_rows($result) > 0){
         echo "<table>";

         echo "<tr>";
         echo "<th>First Name</th>";
         echo "<th>Last Name</th>";
         echo "<th>Email ID</th>";
         echo "<th>Password</th>";
         echo "<th>Gender</th>";
         echo "<th>Mobile</th>";
         echo "</tr>";

         while($row = mysqli_fetch_array($result)){
           echo "<tr>";
           echo "<td>" . $row['f_name'] . "</td>";
           echo "<td>" . $row['l_name'] . "</td>";
           echo "<td>" . $row['email'] . "</td>";
           echo "<td>" . $row['password'] . "</td>";
           echo "<td>" . $row['gender'] . "</td>";
           echo "<td>" . $row['mobile'] . "</td>";
           
           
           echo "</tr>";
         }
         echo "</table>";
       // Free result set
         mysqli_free_result($result);
       } else{
         echo "iNVALID<h2>";
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