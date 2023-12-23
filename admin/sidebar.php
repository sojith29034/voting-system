<?php
require '../common/connect.php';
?>
<style>
    .sidebar {
position: fixed;
top: 51px;
bottom: 0;
left: 0;
width: 180px;
z-index: 1000;
display: block;
padding: 20px;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
background-color: #f5f5f5;
border-right: 1px solid #eee;
}
</style>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <!-- <div class="container-fluid">
            <div class="row">
                <div class="sidebar bg-transparent">
                    <div class="list-group list-group-flush" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Home</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                    </div>
                </div>
            </div>
        </div> -->

            <!-- <div class="col-10">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Home1</div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Home2</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Home3</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Home4</div>
                </div>
            </div> -->

        <div class="sidebar bg-secondary-subtle">
            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item list-group-item-secondary active" data-bs-toggle="list">Dashboard</a>
                <a href="Election" class="list-group-item list-group-item-secondary" data-bs-toggle="list">Election Status</a>
                <a href="Candidates" class="list-group-item list-group-item-secondary" data-bs-toggle="list">Candidate Details</a>
                <a href="Applications" class="list-group-item list-group-item-secondary " data-bs-toggle="list">Nominee Applications</a>
                <a href="" class="list-group-item list-group-item-secondary " data-bs-toggle="list">gvhjbnhj</a>
                <a href="" class="list-group-item list-group-item-secondary " data-bs-toggle="list">vvghbjghj</a>
            </div>
        </div>

        <style>
        .sidebar{
            display: block;
            width: fit-content;
        }
        </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>