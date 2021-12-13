<?php include('partials/nevibar.php') ?>

    <!--main content starts -->
    <div class="main-content">

      <div class="wraper">
        <h1 class="text-center">Manage Admin</h1>

        <br />

        <?php
            if (isset($_SESSION['add']))
            {
              echo $_SESSION['add']; //display massage
              unset($_SESSION['add']); //removing massage
            }

            if (isset($_SESSION['delete']))
            {
              echo $_SESSION['delete']; //display massage of delete admin
              unset($_SESSION['delete']); //removing massage
            }

            if (isset($_SESSION['update']))
            {
              echo $_SESSION['update']; //display massage of update admin
              unset($_SESSION['update']); //removing massage
            }

            if (isset($_SESSION['user-not-found']))
            {
              echo $_SESSION['user-not-found']; //display massage of delete admin
              unset($_SESSION['user-not-found']); //removing massage
            }

            if (isset($_SESSION['pass-not-match']))
            {
              echo $_SESSION['pass-not-match']; //display massage of delete admin
              unset($_SESSION['pass-not-match']); //removing massage
            }

            if (isset($_SESSION['pass-change']))
            {
              echo $_SESSION['pass-change']; //display massage of delete admin
              unset($_SESSION['pass-change']); //removing massage
            }

            if (isset($_SESSION['failed-pass-change']))
            {
              echo $_SESSION['failed-pass-change']; //display massage of delete admin
              unset($_SESSION['failed-pass-change']); //removing massage
            }

         ?>
         <br /> <br />

        <!--button to add admin-->
        <a href="add-admin.php" class="baton-primary">Add Admin</a>

        <br /> <br/>

        <table class="tbl-full">

          <tr>
            <th>Serial Number</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>

          <?php
            //query to get all admin info
            $sql = "SELECT * FROM tbl_admin";
            //execute the query
            $res = mysqli_query($conn, $sql);

            //checking if the query is executing or not
            if ($res==TRUE)
            {
                  //counting to check if there any data in database
                  $count = mysqli_num_rows($res); //fuction to get all the rows

                  //creating variable and assigning the value
                  $op=1;

                  //check the num of rows
                  if ($count>0)
                  {
                      //we have data in database
                      while ($rows=mysqli_fetch_assoc($res))
                      {
                        // using while loop to get the data from database
                        //and this will run as long as we have data in database

                        //get indivisual data
                        $id= $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //display the values in our table
                        ?>

                        <tr>
                          <td><?php echo $op++; ?></td>
                          <td><?php echo $full_name; ?></td>
                          <td><?php echo $username; ?></td>
                          <td>
                            <a href=" <?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?> " class="baton-primary">Change Password</a>
                            <a href=" <?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?> " class="baton-secondary">Update Admin</a>
                            <a href=" <?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="baton-danger">Delete Admin</a>
                          </td>
                        </tr>


                        <?php



                      }
                  }
                  else
                  {
                    // there is no data in database
                  }

            }

           ?>

        </table>

        <div class="clearfix">

        </div>

      </div>

    </div>
    <!--main content ends -->

    <?php include('partials/footer.php') ?>
