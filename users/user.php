<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

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
        img.bg{
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
    <img src="../assets/bg.jpg" alt="FCRIT" class="bg">
    <?php include '../common/message.php'; ?>
    <div class="intro text-center">
        <div class="row">
            <h1 class="text-center my-4">Welcome to FCRIT's Online Voting System</h1>

            <?php
            $query = "SELECT voteStatus FROM `login` WHERE id='admin'";
            $result = mysqli_query($conn, $query);
            while ($admin = mysqli_fetch_assoc($result)) {
                // Apply for candidate
                if($admin['voteStatus']==0){
            ?>
            <h3 class="text-center">What is your role? <i class="fas fa-user-tag"></i></h3>
            <div class="btns text-center">
                <a href="nominee.php" class="btn btn-danger mx-2 my-4">I am a Candidate</a>
                <a class="btn btn-success mx-2 my-4 disabled" role="button" aria-disabled="true">I am a Voter</a>
            </div>
            <?php
                }
                else if($admin['voteStatus']==1 || $admin['voteStatus']==2){
                    // Election has started
                    if($admin['voteStatus']==1){
            ?>
            <h3 class="text-center">What is your role? <i class="fas fa-user-tag"></i></h3>
            <div class="btns text-center">
                <a class="btn btn-danger mx-2 my-4 disabled" role="button" aria-disabled="true">I am a Candidate</a>
                <a href="voter.php" class="btn btn-success mx-2 my-4">I am a Voter</a>
            </div>
            <?php
                    } // Election has stopped
                    else if($admin['voteStatus']==2){
            ?>
            <h3 class="text-center">What is your role? <i class="fas fa-user-tag"></i></h3>
            <div class="btns text-center">
                <a class="btn btn-danger mx-2 my-4 disabled" role="button" aria-disabled="true">I am a Candidate</a>
                <a class="btn btn-success mx-2 my-4 disabled" role="button" aria-disabled="true">I am a Voter</a>
            </div>
            <h2>Results will be declared soon!</h2>
            <?php
                    }
            ?>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-5">
                        <div class="card-header text-center"><h3>Campaigns</h3></div>
                        <div class="card-body">
                            <div class="row my-5">
                            <?php
                            $query = "SELECT * FROM campaign";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $campaign) {
                            ?>
                                <div class="<?=$campaign['size']?> position-relative" style="object-fit:cover;">
                                    <p class="position-absolute text-center fs-2"><?=$campaign['motto']?></p>
                                    <img src="<?=htmlspecialchars($campaign['campaign'])?>" alt="<?=htmlspecialchars($campaign['campaign'])?>" class="img-fluid" style="object-fit:cover;">
                                </div>
                            <?php
                                }
                            } else {
                                echo "<div class='alert alert-warning' role='alert'>
                                    No Campaigns added.
                                    </div>";
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
            <?php
                } // Results are declared
                else if($admin['voteStatus']==3){
            ?>
            <div class="container col-12">
                <div class="card"></div>
            </div>
            <?php
                }
            }
            ?>
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