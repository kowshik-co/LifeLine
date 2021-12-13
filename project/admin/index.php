
<?php include('partials/nevibar.php'); ?>


    <!--main content starts -->
    <div class="main-content">

      <div class="wraper">
        <h1 class="text-center">DASHBOARD</h1>
        <br> <br>

        <?php
            if (isset($_SESSION['login']))
            {
              echo $_SESSION['login'];
              unset ($_SESSION['login']);
            }

         ?>

         <br> <br>

        <div class="col-4 text-center">
          <h1>5</h1>
          <br>
          Bookings
        </div>

        <div class="col-4 text-center">
          <h1>3</h1>
          <br>
          Cancel Booking
        </div>

        <div class="col-4 text-center">
          <h1>10</h1>
          <br>
          Payment
        </div>

        <div class="col-4 text-center">
          <h1>8</h1>
          <br>
          Test result
        </div>

        <div class="clearfix">

        </div>

      </div>

    </div>
    <!--main content ends -->

<?php include('partials/footer.php'); ?>
