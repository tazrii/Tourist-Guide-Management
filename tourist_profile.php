<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="tourist_profile.css">

  </head>
  <body>
    <nav>



      <label class="logo">TouristGuide</label>
      <ul>
        <li><a class="active" href="tourist_dashboard.php">Home</a></li>
        <li><a href="tourist_profile.php">Profile</a></li>
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
  <h1> Tourist info </h1>




          <?php

      include 'connections.php';

    $useremail= $_SESSION["emailID"];
    $sql="SELECT *
          FROM tourist
          WHERE
        tourist_email = '$useremail'
        ";

     $result=mysqli_query($conn,$sql);
     if (mysqli_num_rows($result)>0) {
       while ($row = mysqli_fetch_assoc($result)) {

             echo'<tr>



                <h2 style="text-align:center">tourist profile</h2>

                <div class="card">
                  <img src="images/'.$row['tourist_image'].'" alt="John" style="width:30%">
                  <h1><b>Name:  </b><td>'.$row['tourist_firstName'].'</td> <td>'.$row['tourist_lastName'].'</td><br></h1>
                  <p class="title"><b>Email Address:  </b><td>'.$row['tourist_email'].'</td><br>
                  <b>Phone Number:  +880</b><b>'.$row['tourist_phone'].'</b><br>
                  <b>Address:  </b><td>'.$row['tourist_address'].'</td><br></p>
                  <p><a href="edit_profile.php?id='.$row['tourist_id'].'"><button type="button" class="editbtn">EDIT</button></a></p>
                </div>
                </tr>';

           }
       }


?>
</div>


  </body>
</html>
<?php include 'footer.php'; ?>
