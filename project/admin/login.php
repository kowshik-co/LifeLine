<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Lifline</title>
    <link rel="stylesheet" href="../css/admin.css">
  </head>
  <body class="bgimage">

      <div class="login">
          <h1 class="text-center">LOGIN</h1>
          <br>

          <?php
              if (isset($_SESSION['login']))
              {
                echo $_SESSION['login'];
                unset ($_SESSION['login']);
              }

              if (isset($_SESSION['no-login-msg']))
              {
                echo $_SESSION['no-login-msg'];
                unset ($_SESSION['no-login-msg']);
              }


           ?>

          <!--login form starts here-->
          <form class="" action="" method="POST">
              Username:
              <input type="text" name="username" value="" placeholder="Enter Username">
              <br> <br>
              Password:
              <input type="password" name="password" value="" placeholder="Enter Password">
              <br> <br>

              <input type="submit" name="submit" value="LOGIN" class="baton-primary">
          </form>

          <!--login form ends here-->


          <br>
          <p class="text-center">Created By <a href="https://www.facebook.com/kowshik.turjo/">Kowshik Sarkar</a> </p>

      </div>

  </body>
</html>

<?php
    //checking if the login button clicked or not
    if (isset($_POST['submit']))
    {
      // get the data from login form
      $username= $_POST['username'];
      $password= md5($_POST['password']);

      //sql query to check does username and password exixt
      $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

      //execute query
      $res = mysqli_query($conn, $sql);

      //count rows to check if the user exixt or not
      $count = mysqli_num_rows($res);

      if ($count==1)
      {
        // user found and login succesfull
        $_SESSION['login'] = "<div class='succesmsg text-center'> Login succesfull </div>";
        $_SESSION['user'] = $username; //to check if the user logged in or not and logout will unset it
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/');
      }
      else {
        // user not found failed to login
        $_SESSION['login'] = "<div class='errormsg text-center'> Login Failed </div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/login.php');

      }


    }

 ?>
