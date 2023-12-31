<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
?>


<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pfp = $_FILES['pfp'];
    $post = mysqli_real_escape_string($conn, $_POST['post']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $reason = mysqli_real_escape_string($conn, $_POST['nomiReason']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
    $achieve = mysqli_real_escape_string($conn, $_POST['achieve']);
    $club = mysqli_real_escape_string($conn, $_POST['club']);
    $cert = $_FILES['cert'];
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $status = "Pending";

    // File type validation
    $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];

    if (!empty($pfp['tmp_name']) && !empty($cert['tmp_name'])) {
        $pfpMimeType = mime_content_type($pfp['tmp_name']);
        $certMimeType = mime_content_type($cert['tmp_name']);

        if (in_array($pfpMimeType, $allowedImageTypes) && in_array($certMimeType, $allowedImageTypes)) {
            $pfp_upload = '../assets/pfp/' . $pfp['name'];
            move_uploaded_file($pfp['tmp_name'], $pfp_upload);

            $cert_upload = '../assets/certificate/' . $cert['name'];
            move_uploaded_file($cert['tmp_name'], $cert_upload);

            $query = "INSERT INTO `candidates` (`name`, `pfp`, `dept`, `post`, `reason`, `cgpa`, `achieve`, `club`, `cert`, `detail`, `status`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssssssssss", $name, $pfp_upload, $dept, $post, $reason, $cgpa, $achieve, $club, $cert_upload, $detail, $status);

            if (mysqli_stmt_execute($stmt)) {
                echo "Profile created Successfully!";
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Invalid file types. Please upload JPEG or PNG images.";
        }
    } else {
        echo "Error: File not found.";
    }
}
?>


<?php
require '../common/connect.php';

if(isset($_GET['status']) && isset($_GET['name'])){
    $status = ($_GET['status'] == 'A') ? "Accepted" : "Rejected";
    $name = $_GET['name'];

    if(!$conn){
        echo "Connection failed";
    }
    else{
        // Use prepared statements to prevent SQL injection
        $query = "UPDATE candidates SET status=? WHERE name=?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $status, $name);
            $query_run = mysqli_stmt_execute($stmt);

            if ($query_run) {
                echo "Operation Successful: $status";
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error in prepared statement: " . mysqli_error($conn);
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