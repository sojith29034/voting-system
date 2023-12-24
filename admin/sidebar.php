<?php
require '../common/connect.php';
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
        <style>
        .sidebar {
        position: fixed;
        top: 51px;
        bottom: 0;
        left: 0;
        width: fit-content;
        z-index: 1000;
        display: block;
        padding: 20px;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        background-color: #f5f5f5;
        border-right: 1px solid #eee;
        }
        </style>
    </head>
  <body>
        <div class="sidebar bg-primary-subtle">
            <div class="list-group list-group-flush" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-primary active" id="list-dashboard-list" data-bs-toggle="list" href="#dashboard" role="tab" aria-controls="list-dashboard">Dashboard</a>
                <a class="list-group-item list-group-item-primary" id="list-electionStatus-list" data-bs-toggle="list" href="#electionStatus" role="tab" aria-controls="list-electionStatus">Election Status</a>
                <a class="list-group-item list-group-item-primary" id="list-CandDetail-list" data-bs-toggle="list" href="#CandDetail" role="tab" aria-controls="list-CandDetail">Candidate Details</a>
                <a class="list-group-item list-group-item-primary" id="list-applications-list" data-bs-toggle="list" href="#applications" role="tab" aria-controls="list-applications">Nominee Applications</a>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>