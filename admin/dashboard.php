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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <h1 class="">Admin Dashboard</h1>

    <div class="row justify-content-evenly">
      <div class="card text-bg-success" style="width: 20%;">
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

      <div class="card text-bg-info" style="width: 20%;">
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

      <div class="card text-bg-warning" style="width: 20%;">
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

      <div class="card text-bg-danger" style="width: 20%;">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>