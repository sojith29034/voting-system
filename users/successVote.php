<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

if(isset($_SESSION['id']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCRIT Voting System | Voting Successful | <?=$_SESSION['uname']?></title>
</head>
<body>
    <?php include '../common/navbar.php'; ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card col-md-4 col-12 my-5">
            <div class="card-header text-bg-info text-center">
                <h2>FCRIT Online Voting System</h2>
            </div>
            <div class="card-body">
                <h2 class="text-success text-center mb-3"><i class="far fa-check-circle"></i> Thank you for Voting.</h2>
                <p>Your participation is crucial in making a difference. Your vote contributes to the strength of our college and the democratic process.</p>
                <p>We appreciate your time and commitment to shaping a better future. Thank you for being an active member of our college!</p>
                <div class="text-center"><a href="../users/user.php" class="btn btn-primary"><i class="fas fa-home"></i> Home</a></div>
            </div>
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