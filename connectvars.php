<?php

//connecting to db
    $dbc =  mysqli_connect("localhost","danistcm_abhi264","Rohan@123") or die("No connection");
      mysqli_select_db($dbc, "danistcm_danish-fit") or die("No DB");


?>
