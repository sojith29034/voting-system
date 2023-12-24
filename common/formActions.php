<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
?>


<?php
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $pfp = mysqli_real_escape_string($conn,$_FILES['pfp']);
    $post = mysqli_real_escape_string($conn,$_POST['post']);
    $dept = mysqli_real_escape_string($conn,$_POST['dept']);
    $reason = mysqli_real_escape_string($conn,$_POST['nomiReason']);
    $cgpa = mysqli_real_escape_string($conn,$_POST['cgpa']);
    $achieve = mysqli_real_escape_string($conn,$_POST['achieve']);
    $club = mysqli_real_escape_string($conn,$_POST['club']);
    $cert = mysqli_real_escape_string($conn,$_FILES['cert']);
    $detail = mysqli_real_escape_string($conn,$_POST['detail']);
    
    $ext=array('jpeg','jpg','png');

    $pfpName=$pfp['name'];
    $pfp_separate=explode('.',$pfpName);
    $pfp_ext=strtolower(end($pfp_separate));
    echo $pfp_ext;

    $certName=$cert['name'];
    $cert_separate=explode('.',$certName);
    $cert_ext=strtolower(end($cert_separate));
    echo $cert_ext;

    if(in_array($pfp_ext,$ext) && in_array($cert_ext,$ext)){
        $pfp_upload='../assets/pfp/'.$pfpName;
        move_uploaded_file($pfp['tmp_name'],$pfp_upload);

        $cert_upload='../assets/certificate/'.$certName;
        move_uploaded_file($cert['tmp_name'],$cert_upload);

        $query = "INSERT INTO `candidates` (`name`, `pfp`, `dept`, `post`, `reason`, `cgpa`, `achieve`, `club`, `cert`, `detail`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $pfp_upload, $dept, $post, $reason, $cgpa, $achieve, $club, $cert_upload, $detail);
        $run_query = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


        if ($run_query) {
            echo "Profile Updated Successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
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