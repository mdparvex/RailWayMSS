<?php include_once "session.php";?>
<?php
include "include/header.php";
include "include/connect.php";
include_once "include/nav.php";
?>




<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   // get values form input text and number
   
   $email = $_POST['email'];
    $book = "Free";
   $Train_Name = $_POST['Train_Name'];
   $doj = $_POST['doj'];
   $seatno = $_POST['seatno'];
   
   
 
    



        
			
			
			
      // mysql query to Update data
      $query="UPDATE seats_availability SET book='$book' , email='Free'
      WHERE seatno= $seatno and
       email = '$email' and Train_Name='$Train_Name';";
        //$query = "UPDATE `seats_availability` SET `Train_Name`='".$Train_Name."',`doj`='".$doj."',`email`= '".$email."',`book`= '".$book."' WHERE `seatno` = $seatno";
   
        $result = mysqli_query($con, $query);
   
   if($result)
   {
       echo 'Successfully Canceled';
   }
   else{
       echo 'Data Not Updated';
   }
   
			
			
            
           
         
         
	   
        


      



	
   
   
   
		 
}
?>

<!DOCTYPE html>

<html>

<head>
  <br>
  <h1 style="text-align: center; ">Cancel Ticket</h1>

  <title> Reserve Ticket </title>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

    <body>
   <br>
        <form action="clear.php" method="post" align='center'>

            

            

            

             Train name:
        <select name="Train_Name">
          <option value="Chitra Express">Chitra Express  </option>
          <option value="Subarna Espress">Subarna Espress   </option>
          <option value="Ekota Express">Ekota Express   </option>
          <option value="Upukol Express ">Upukol Express    </option>
          <option value="Uddayan Express ">Uddayan Express    </option>
        </select>


        <br>
        <br>
        Journey Date:
        <input type="date" name="doj" required><br><br>
        Seat No:
        <input type="integer" name="seatno" required><br><br>
		
		Email:
        <input type="text" name="email" required><br><br>
		
	
		
          
          
          <br>
          <br>
        </select>
        <br>
			
			
			

            <input type="submit" name="update" value="Cancel" class="btn btn-primary">

        </form>

<?php include_once "include/footer.php"; ?>