<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
include '../common/navbar.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FCRIT Voting System | <?=$_SESSION['uname']?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .intro{
            overflow: hidden;
        }
        img{
            height: 100%;
            width: 100%;
            object-fit: cover;
            position: fixed;
            z-index: -1;
            opacity: 0.4;
        }
        main{
            background: #fff;
        }
    </style>
</head>
  <body>
    <img src="../assets/bg.jpg" alt="FCRIT">
    <?php include '../common/message.php'; ?>
    <div class="intro text-center">
        <div class="row">
            <h1 class="text-center my-4">Welcome to FCRIT's Online Voting System</h1>

            <h3 class="text-center">What is your role?</h3>
            <div class="btns text-center">
                <a href="candidate.php" class="btn btn-danger mx-2 my-4">I am a Candidate</a>
                <a href="voter.php" class="btn btn-success mx-2 my-4">I am a Voter</a>
            </div>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header text-center"><h3>Campaigns</h3></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">Hello</div>
                                <div class="col-4">Hello</div>
                                <div class="col-2">Hello</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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