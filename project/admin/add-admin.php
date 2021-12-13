<?php include('partials/nevibar.php'); ?>

<!--add admin starts-->
      <div class="main-content">

        <div class="wraper">

          <h1>Add Admin</h1>

          <br>

          <?php
              if (isset($_SESSION['add'])) //cheacking is the session set or not
              {
                echo $_SESSION['add']; //display massage
                unset($SESSION['add']);//removing massage
              }


           ?>

          <form class="" action="" method="POST">

                <table class="tbl-30">

                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full-name" value="" placeholder="Enter your name">
                        </td>
                    </tr>

                    <tr>
                        <td>User Name: </td>
                        <td>
                            <input type="text" name="user-name" value="" placeholder="Enter your user name">
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" value="" placeholder="Enter your password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="">
                          <input type="submit" name="submit" value="ADD ADMIN" class="baton-secondary">

                        </td>
                    </tr>

                </table>

          </form>

        </div>
      </div>

<?php include('partials/footer.php'); ?>

<?php
    //processing value from page to SQLiteDatabase
    //cheacking if the submit button clicked or not

    if (isset($_POST['submit'])) {

      //get the data from form

      $full_name = $_POST['full-name'];
      $username = $_POST['user-name'];
      $password = md5($_POST['password']);  //password encription with md5

      //SQL query to save the data into Database

      $sql = "INSERT INTO tbl_admin SET

            full_name = '$full_name',
            username = '$username',
            password = '$password'
      ";

      //executing query and saving data into database
      $res = mysqli_query($conn, $sql) or die(mysqli_error());

      //cheacking data is inserted or not and display appropiate massage
      if ($res==TRUE) {
        //creating session variable to display massage
        $_SESSION['add'] = "<div class='succesmsg'>Admin added succesfully</div>";
        //redirect page to manage admin page
        header("location:".SITEURL.'admin/manage-admin.php');
      }
      else {
        //creating session variable to display massage
        $_SESSION['add'] = "<div class='errormsg'>Action Failed</div>";
        //redirect page add admin page
        header("location:".SITEURL.'admin/add-admin.php');
      }



    }
 ?>
