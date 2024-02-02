<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
?>

<?php
if (isset($_POST['submitVote'])) {
    // add vote to vote table

    // Retrieve voter ID and timestamp
    // $voterId = ($_SESSION['id']);
    // $timestamp = date('Y-m-d H:i:s');
    
    // Iterate through post positions and insert into the database
    // $positions = ['General Secretary', 'Joint Secretary', 'Sports Secretary', 'Cultural Secretary'];
    // foreach ($positions as $position) {
    //     if (isset($_POST[$position])) {
    //         $candidateId = $_POST[$position];
    
    //         // Add debugging statements
    //         echo "Voter ID: $voterId<br>";
    //         echo "Timestamp: $timestamp<br>";
    //         echo "Position: $position<br>";
    //         echo "Candidate ID: $candidateId<br>";
    
    //         // Insert into the votes table
    //         $query = "INSERT INTO votes (voter_id, time, `$position`, `$position`) VALUES ('$voterId', '$timestamp', '$candidateId', '$candidateId')";
    //         $result = mysqli_query($conn, $query);
    
    //         if (!$result) {
    //             echo "Error: " . mysqli_error($conn);
    //         }
    //     }
    // }

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