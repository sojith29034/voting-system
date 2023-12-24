<?php
require '../common/connect.php';

session_start();

if(($_SESSION['id'] == 'admin'))
{
include '../common/navbar.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="row mx-0">
        <?php include '../common/message.php'; ?>

        <div class="col-2 my-5">
          <?php include 'sidebar.php'; ?>
        </div>


        <div class="col-10 my-3">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="list-dashboard-list"><?php include 'dashboard.php' ?></div>
                <div class="tab-pane fade" id="electionStatus" role="tabpanel" aria-labelledby="list-electionStatus-list">Home2</div>
                <div class="tab-pane fade" id="candDetail" role="tabpanel" aria-labelledby="list-candDetail-list">Home3</div>
                <div class="tab-pane fade" id="applications" role="tabpanel" aria-labelledby="list-applications-list"><?php include 'applications.php' ?></div>
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