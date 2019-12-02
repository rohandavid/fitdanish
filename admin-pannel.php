<?php
  // Start the session
  require_once('startsession.php');

  // Insert the page header
  $page_title = 'ADMIN PANNEL';
  if (!isset($_SESSION['user_hash'])) {
    echo '<p class="login">Please <a href="sign-in.php">log in</a> to access this page.</p>';
    exit();
  }


    //connecting to db
    $dbc =  mysqli_connect("localhost","danistcm_abhi264","Rohan@123") or die("No connection");
      mysqli_select_db($dbc, "danistcm_danish-fit") or die("No DB");


  // Retrieve the user data from MySQL
  $query = mysqli_query($dbc, "SELECT `ID`, `username`, `pass_hash`, `user_hash` FROM `admin_log` WHERE username='" .$_SESSION['username']. "'")or die("chud gaya tu");
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/ionicons.min.css">
        <link rel="stylesheet" href="CSS/adminpannel.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,800" rel="stylesheet">
                <title>Train with Danish |Customized meal plans and work-out plans</title>
    </head>
    <body >
        <div class="form-heading">
         <h1>welcome to the admin pannel <?php echo $_SESSION['username']; ?></h1>
        </div>
      <div class="table">

<form action="">



                      <table>
                    <tr>
                      <th>ID</th>
                      <th>USERNAME</th>
                      <th>PLAN</th>
                      <th> PAID</th>
                      <th> job-status </th>
                      <th> Edit </th>
                    </tr>
                    <?php

                     $dbc =  mysqli_connect("localhost","danistcm_abhi264","Rohan@123") or die("No connection");
                     mysqli_select_db($dbc, "danistcm_danish-fit") or die("No DB");

                        // Retrieve the user data from MySQL
                        $query = "SELECT * FROM `personal information`;";
                        $data = mysqli_query($dbc, $query);


                        // Loop through the array of user data, formatting it as HTML
                        while ($row = mysqli_fetch_array($data)) {
                         if (!empty($row['ID'])) {
                          echo '<tr><td>' .$row['ID'] . '</td>';
                        }
                         else {
                          echo '<tr><td>NULL</td>';
                         }

                         if (!empty($row['Full_Name'])) {
                          echo '<td>' .$row['Full_Name'] . '</td>';
                        }
                         else {
                          echo '<td>NULL</td>';
                         }

                         if (!empty($row['Plan_Type'])) {
                          echo '<td>' .$row['Plan_Type'] . '</td>';
                        }
                         else {
                          echo '<td>NULL</td>';
                         }

                        if (!empty($row['paid'])) {
                          echo '<td>' .$row['paid']. '</td>';
                        }
                        
                        if (!empty($row['job_status'])) {
                         echo '<td>' .$row['job_status']. '</td>';
                        }
                        
                        echo '<td><a href="edit-user.php">Update</a></td></tr>';
                        
                      }
                      echo '</table>';

                      echo '<a class="form-heading" href="logout.php">Logout</a>' ;

                     
                    mysqli_close($dbc);
                        exit();

                    ?>
                             
             
      </div>

      
    </body>

    </html>