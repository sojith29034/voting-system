<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

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
  </head>
  <body>

    <div class="container-fluid row">
        <?php include '../common/message.php'; ?>

        <div class="col-lg-2 my-lg-3">
          <div class="sidebar"><?php include 'sidebar.php'; ?></div>
        </div>


        <div class="col-lg-10 col-md px-md-5 my-3 tab-content w-md-80 w-sm-100" id="nav-tabContent">
          <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="list-dashboard-list"><?php include 'dashboard.php' ?></div>
          <div class="tab-pane fade" id="electionStatus" role="tabpanel" aria-labelledby="list-electionStatus-list"><?php include 'electionStatus.php' ?></div>
          <div class="tab-pane fade" id="candDetail" role="tabpanel" aria-labelledby="list-candDetail-list"><?php include 'candidates.php' ?></div>
          <div class="tab-pane fade" id="applications" role="tabpanel" aria-labelledby="list-applications-list"><?php include 'applications.php' ?></div>
        </div>
    </div>
  </body>
</html>


<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>