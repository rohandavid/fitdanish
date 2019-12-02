<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/ionicons.min.css">
        <link rel="stylesheet" href="CSS/edit.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,800" rel="stylesheet">
                <title>Train with Danish |Customized meal plans and work-out plans</title>
    </head>
<body >
    
    <div class="admin-box">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div>
      <p>Enter USER-ID : <INPUT type="text" name="id" required> </p>
        <p> Job-status?</p>

       <p>yes <input type="radio" name="job_status" value="Yes"></p> 
       <p>no  <input type="radio" name="job_status" value="No">
       </p>
  </div>  

  <div>
        <p> payment recieved?</p>
      <p>yes  <input type="radio" name="paid" value="Yes"></p> 
      <p>no  <input type="radio" name="paid" value="No"></p> 
       
  </div>  

<input type="submit" value="Update" name="update" class="button">
</form>
        
        <a href="admin-pannel.php"><input type="submit" value="piche nikal(back)" name="back" class="button"></a>

<?php
//adding files
require_once('startsession.php');

//validating session
if (!isset($_SESSION['user_hash'])) {
    echo '<p class="login">Please <a href="sign-in.php">log in</a> to access this page.</p>';
    exit();
  }
// Connect to the database
$dbc =  mysqli_connect("localhost","danistcm_abhi264","Rohan@123") or die("No connection");
                     mysqli_select_db($dbc, "danistcm_danish-fit") or die("No DB");

if (isset($_POST['update'])) {

  $id = mysqli_real_escape_string($dbc, trim($_POST['id']));
  $paid = mysqli_real_escape_string($dbc, trim($_POST['paid']));
  $job_status = mysqli_real_escape_string($dbc, trim($_POST['job_status']));
  


  if (!empty($id)) {
      
      //running query
      $query = "UPDATE `personal information` SET `paid`='$paid',`job_status`='$job_status' WHERE ID='$id'";
      $data = mysqli_query($dbc, $query)or die('database ki gaand fatt gayi');


      mysqli_close($dbc);
        exit();

  }
}

?>


    </div>
        
</body>



</html>