<?php
require '../common/connect.php';

if(($_SESSION['id'] == 'admin'))
{
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
  </head>
  <body>
      
    <h1 class="section-title">Admin Dashboard</h1>

    <section class="row justify-content-around">
      <div class="card text-bg-success col-sm-5 col-md col-10 m-1">
        <div class="card-body">
          <h3 class="card-text">Accepted Applications</h3>
          <h1 class="card-title text-end">
            <?php
            $sql = "SELECT * FROM candidates where status='accepted'";
            $result = mysqli_query($conn,$sql);
            $applications = mysqli_num_rows($result);
            echo $applications;
            ?>
          </h1>
        </div>
      </div>

      <div class="card text-bg-info col-sm-5 col-md col-10 m-1">
        <div class="card-body">
          <h3 class="card-text">Submitted Applications</h3>
          <h1 class="card-title text-end">
            <?php
            $sql = "SELECT * FROM candidates";
            $result = mysqli_query($conn,$sql);
            $applications = mysqli_num_rows($result);
            echo $applications;
            ?>
          </h1>
        </div>
      </div>

      <div class="card text-bg-warning col-sm-5 col-md col-10 m-1">
        <div class="card-body">
          <h3 class="card-text">Pending Applications</h3>
          <h1 class="card-title text-end">
            <?php
            $sql = "SELECT * FROM candidates where status='Pending'";
            $result = mysqli_query($conn,$sql);
            $applications = mysqli_num_rows($result);
            echo $applications;
            ?>
          </h1>
        </div>
      </div>

      <div class="card text-bg-danger col-sm-5 col-md col-10 m-1">
        <div class="card-body">
          <h3 class="card-text">Rejected Applications</h3>
          <h1 class="card-title text-end">
            <?php
            $sql = "SELECT * FROM candidates where status='rejected'";
            $result = mysqli_query($conn,$sql);
            $applications = mysqli_num_rows($result);
            echo $applications;
            ?>
          </h1>
        </div>
      </div>
    </section>

    <script>
      document.querySelector(".open-btn").addEventListener('click', function() {
        document.querySelector("aside").classList.add('active');
      });
      document.querySelector(".sidebar .close-btn").addEventListener('click', function() {
          document.querySelector("aside").classList.remove('active');
      });
    </script>
  </body>
</html>

<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>