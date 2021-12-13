<?php
    //authorization - access control
    //to check whether the user logged in or not
    if (!isset($_SESSION['user'])) //if user session is not set
    {
      //user is not looged in
      //redirect to login page with masaage
      $_SESSION['no-login-msg'] = "<div class='errormsg text-center'>Please Login First </div>";
      //redirect to log in page
      header('location:'.SITEURL.'admin/login.php');
    }
 ?>
