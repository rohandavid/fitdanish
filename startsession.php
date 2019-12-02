<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['user_hash'])) {
    if (isset($_COOKIE['user_hash']) && isset($_COOKIE['username'])) {
      $_SESSION['user_hash'] = $_COOKIE['user_hash'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
?>
