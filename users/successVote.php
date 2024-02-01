<?php
require '../common/connect.php';

session_start();

require '../common/links.php';

if(isset($_SESSION['id']))
{
    
include '../common/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCRIT Voting System | Voting Successful | <?=$_SESSION['uname']?></title>
</head>
<body>
</body>
</html>

<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>