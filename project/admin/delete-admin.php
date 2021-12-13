<?php

    //including constants.php file
    include('../config/constants.php');

    //1. getting Id of the admin to be deleted
     $id = $_GET['id'];

    //creating sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    #executing query
    $res = mysqli_query($conn, $sql);

    //check whether the query succesfully executed or not
    if ($res==TRUE)
    {
      // query executed succesfully admin deleted
      //echo "Admin deleted succesfully";
      //creating session variable
      $_SESSION['delete'] = "<div class='succesmsg'> Admin deleted succesfully </div>";
      //redirect to manage admin page
      header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
      // failed to delete admin
      //echo "Failed to delete admin";
      $_SESSION['delete'] = "<div class='errormsg'> Failed to delete admin </div>";
      header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //redirect to manage admin with massage (succesfull deleted/ error)

 ?>
