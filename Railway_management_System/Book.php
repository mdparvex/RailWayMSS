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

 $condi = $_POST['condi'];
 $Train_Name = $_POST['Train_Name'];
 $doj = $_POST['doj'];
 $seatno = $_POST['seatno'];
 //$amount = $_POST['amount'];
 $book = $_POST['book'];
 $email = $_POST['email'];

 




 $query = "SELECT * FROM seats_availability WHERE Train_Name = '$Train_Name' AND book = ('$book') AND doj = ('$doj')";

 $query_run = mysqli_query($con,$query);

 if (mysqli_num_rows ($query_run) > 0) {




  echo '<script type="text/javascript"> alert("This Seat Is Booked")</script>';

}
else {









	
   // mysql query to Update data
 $query = "UPDATE `seats_availability` SET `Train_Name`='".$Train_Name."',`doj`='".$doj."',`condi`= '".$condi."',`email`='".$email."',`book`='".$book."' WHERE `seatno` = $seatno";

 $result = mysqli_query($con, $query);

 if($result)
 {
   echo 'Ticket Booked';
 }else{
   echo 'Error booking Ticket ! Please try again';
 }
 mysqli_close($con);
}
}
?>


<div align="center"> 

<br>

<h1 style="text-align: center; ">Reserve Ticket</h1>

<br>

      <form action="Book.php" method="post">

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
        <!--
        Ticket Price:
        <select name="amount">
          <option value="1500">1500 TK  </option>
          <option value="1200">1200 TK</option>
          <option value="1000">1000 TK   </option>
          <option value="800">800 TK    </option>
          <option value="400">400 TK</option>
          <option value="200">200 TK</option>
        </select>
        -->
        <br>
		Email:
        <input type="text" name="email" required><br><br>
		
	
		Status:
        <select name="book">
          <option value="Reserved">Reserved  </option>
          <option value="Free"> Free</option>
          
          
          <br>
          <br>
        </select>
        <br>
        <br>
        <input type="submit" name="update" value="Book Confirm" class="btn btn-primary">

      

      </form>

</div>


<?php include_once "include/footer.php"; ?>