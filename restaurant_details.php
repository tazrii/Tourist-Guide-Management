<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Restaurant Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="restaurant_details.css">

  </head>
  <body>
    <nav>



      <label class="logo">CSE299Project</label>
      <ul>
        <li><a class="active" href="tourist_dashboard.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><p><?php
                session_start();
                echo "<p style='color:white;'>" .$_SESSION["emailID"];
               ?>
           </p></li>
      </ul>

    </nav>


    <div class="container">
      <div class="header">
  <h1> Restaurant Info </h1>

<?php
require 'connections.php';
$restaurant_id = $_GET['id'];

$sql="SELECT *
      FROM restaurant
      WHERE restaurant_id = '$restaurant_id'";

     $result=mysqli_query($conn,$sql);
     if (mysqli_num_rows($result)>0) {
       while ($row = mysqli_fetch_assoc($result)) {

             echo'<tr>
                     <b>Name:  </b><td>'.$row['restaurant_name'].'</td><br>
                     <b>Email Address:  </b><td>'.$row['restaurant_email'].'</td><br>
                     <b>Phone Number:  +880</b><b>'.$row['restaurant_phone_number'].'</b><br>
                     <b>Address:  </b><td>'.$row['restaurant_address'].'</td><br>
                     <b>About: </b> '.$row['restaurant_description'].'</td><br>
                </tr>';


           }
       }


?>
</div>


    <?php

    $sql="SELECT *
          FROM food
          WHERE restaurant_id='$restaurant_id'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
      echo '<table>
            <tr>
            <th>Image:</th>
            <th>Name:</th>
            <th>Cost (BDT)</th>
            <th>Description</th>
            </tr>';
    while ($row = mysqli_fetch_assoc($result)) {

      echo '<tr>
              <td><img src="images/'.$row['food_image'].'" height="100" width="100"/></td>
              <td>'.$row['food_name'].'</td>
              <td>'.$row['food_price'].'</td>
              <td>'.$row['food_description'].'</td>
              </tr>';

      }

  }
  ?>


  </body>
</html>
<?php include 'footer.php'; ?>
