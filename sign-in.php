<?php
//connecting database
require_once('startsession.php');

// Start the session
  //session_start();

  // Clear the error message
  $error_msg = "";


  // If the user isn't logged in, try to log them in
if (!isset($_SESSION['user_hash'])) { 
  goto sessiona;
}

if (isset($_SESSION['user_hash'])) {
  sessiona:
    if (isset($_POST['submit'])) {
      //connecting to db
    $dbc =  mysqli_connect("localhost","danistcm_abhi264","Rohan@123") or die("No connection");
      mysqli_select_db($dbc, "danistcm_danish-fit") or die("No DB");


      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));


      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = mysqli_query($dbc, "SELECT `username`, `pass_hash`, `user_hash` FROM `admin_log` WHERE  username = '$user_username' AND pass_hash = SHA('$user_password')")or die("chud gaya tu"); 
        echo $user_password;
        if (mysqli_num_rows($query) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($query);
          $_SESSION['user_hash'] = $row['user_hash'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_hash', $row['user_hash'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin-pannel.php';
          header('Location: ' . $home_url);
          mysqli_close($dbc);
        exit();
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
   // Insert the page header
  $page_title = 'Admin Log In';
   // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_hash'])) {
    echo '<p class="error">' . $error_msg . '</p>';

  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/sign-in.css">
        <link rel="stylesheet" href="CSS/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,800" rel="stylesheet">
        <title><?php echo $page_title; ?></title>
    </head>

    <body class="sign-in">


    <section >

       <div class="sign-in-box">

        <h1 class="form-heading">
            USER
        </h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="row">
               <label for="username" class="text">USERNAME</label>
               <input type="text" name="username" class="input-box">
            
            </div>
            <div class="row">
                    <label for="password" class="text">PASSWORD</label>
                    <input type="password" name="password" class="input-box">

            </div>
            <div class="row">
                     <input type="submit" name="submit" value="LOG-IN" class="button" /> 
            </div>
          </form>
       </div> 
    </section>
  </body>
</html>