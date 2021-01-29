<?php
include_once "include/header.php";
include_once "include/connect.php";
?>
<!doctype html>
<html lang="en">
<head>
  <title>Bangladesh Railway</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
   .container{
    margin-top:60px;
  </style>

</head>
<body>

  <title>Page Title</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Style the body */
    body {
      font-family: Arial;
      margin: 0;
    }

    /* Header/Logo Title */
    .header {
      padding: 30px;
      text-align: center;
      background: #1abc9c;
      color: white;
      font-size: 30px;
    }

    /* Page Content */
    .content {padding:20px;}
  </style>
</head>
<body>

  <div class="header">
    <h1>Bangladesh Railway</h1>
    <p>Government of the People's Republic of Bangladesh</p>
  </div>






  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       <li class="nav-item active">
        <a class="nav-link" href="login.php">LogIn <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reg.php">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="find1.php">Find Train</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminlog.php">Admin</a>
      </li>
      </ul>
    </div>
  </nav>
  <body background="5.jpg">


  <br>
  <br>
	<!-- Form -->
	<h1 style="text-align: center; ">Find Train</h1>

	<form action="find1.php" method="post" align='center'>
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

<body style="text-align:center;">
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
