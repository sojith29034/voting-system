<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
?>

<!-- Start Voting -->
<?php
if (isset($_POST['startElection'])) {
    $startElection = "UPDATE login SET voteStatus=1 WHERE id=?";
    $stmt = mysqli_prepare($conn, $startElection);
    mysqli_stmt_bind_param($stmt, 's', $_SESSION['id']);
    $result = mysqli_stmt_execute($stmt);
    $_SESSION['successMessage']="The Election has been started.";
    header("Location:../admin/admin.php");
    exit();
}
?>

<!-- Stop Voting -->
<?php
if (isset($_POST['stopElection'])) {
    $stopElection = "UPDATE login SET voteStatus=2 WHERE id=?";
    $stmt = mysqli_prepare($conn, $stopElection);
    mysqli_stmt_bind_param($stmt, 's', $_SESSION['id']);
    $result = mysqli_stmt_execute($stmt);
    $_SESSION['successMessage']="The Election has ended.";
    header("Location:../admin/admin.php");
    exit();
}
?>

<!-- Declare Voting Results -->
<?php
if (isset($_POST['declareResults'])) {
    $declareResults = "UPDATE login SET voteStatus=3 WHERE id=?";
    $stmt = mysqli_prepare($conn, $declareResults);
    mysqli_stmt_bind_param($stmt, 's', $_SESSION['id']);
    $result = mysqli_stmt_execute($stmt);
    $_SESSION['successMessage']="The ELection Results have been declared.";
    header("Location:../admin/admin.php");
    exit();
}
?>



<?php
if (isset($_POST['submitVote'])) {
    $updateVoteFlag = "UPDATE login SET voteStatus=1 WHERE id=?";
    $stmt = mysqli_prepare($conn, $updateVoteFlag);
    mysqli_stmt_bind_param($stmt, 's', $_SESSION['id']);
    $result = mysqli_stmt_execute($stmt);

    // Add Vote count
    foreach ($_POST as $key => $value) {
        if ($key != 'submitVote') {
            $query = "UPDATE candidates SET voteCount = voteCount + 1 WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 's', $value);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                echo "Vote for nominee with id $value updated successfully.<br>";
            } else {
                echo "Error updating vote for nominee with id $value: " . mysqli_error($conn) . "<br>";
            }
            mysqli_stmt_close($stmt);
        }
    }

    
    header("Location:../users/successVote.php");
    exit();
}
?>

<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>