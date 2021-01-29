





<?php
include "include/header.php";
include "include/connect.php";
include_once "include/adminnav.php";
?>


<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{


   // get values form input text and number

 $condi = $_POST['condi'];
 $Train_Name = $_POST['Train_Name'];
 $doj = $_POST['doj'];
 $seatno = $_POST['seatno'];
 $amount = $_POST['amount'];
 $book = $_POST['book'];
 $email = "Free";

 



     $query = "INSERT INTO seats_availability(Train_Name,doj,seatno,amount,condi,email,book) VALUES ('".$_POST['Train_Name']."','".$_POST['doj']."','".$_POST['seatno']."','".$_POST['amount']."','".$_POST['condi']."','$email','".$_POST['book']."')";

     $query_run = mysqli_query ($con, $query) ;

 
 
 mysqli_close($con);
}

?>


<div align="center"> 

<br>

<h1 style="font-weight:bold; " align='center'>Add Seat</h1>

<br>

      <form action="admin.php" method="post">
      <fieldset>
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
        Seat type:
        <select name="condi">
          <option value="Tapanukul">Tapanukul -1500 TK</option>
          <option value="First class AC">First class AC -1200TK</option>
          <option value="First class ">First class -1000TK</option>
          <option value="First class Chair">First class Chair -800TK</option>
          <option value="2nd Class-Shovon Chair">2nd Class-Shovon Chair -600TK</option>
          <option value="2nd Class-Shovon">2nd Class-Shovon -400TK</option>
          <option value="2nd Class-Shulov">2nd Class-Shulov -200TK</option>
        </select>
        <br>
        <br>
        Ticket Price:
        <select name="amount">
          <option value="1500">1500 TK  </option>
          <option value="1200">1200 TK</option>
          <option value="1000">1000 TK   </option>
          <option value="800">800 TK    </option>
          <option value="400">400 TK</option>
          <option value="200">200 TK</option>
        </select>
        <br>
        <br>
		Email:
        <input type="text" name="email" required><br><br>
		
	
		Status:
        <select name="book">
          <option value="Reserved">Reserved  Seat</option>
          <option value="Free"> Free Seat</option>
          
          
          <br>
          <br>
        </select>
        <br>
        <br>
        <input type="submit" name="update" value="Confirm" class="btn btn-primary">

      
        </fieldset>

      </form>

</div>


<?php include_once "include/footer.php"; ?>