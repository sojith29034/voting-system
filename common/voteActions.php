<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
?>

<?php
if (isset($_POST['submitVote'])) {
    foreach ($_POST as $key => $value) {
        if ($key != 'submitVote') {
            $query = "UPDATE candidates SET voteCount = voteCount + 1 WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 's', $value);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                echo "Vote for nominee with id $value updated successfully.<br>";
                header("Location:../users/successVote.php");
            } else {
                echo "Error updating vote for nominee with id $value: " . mysqli_error($conn) . "<br>";
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>

<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>