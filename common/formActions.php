<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
?>

<!---------------------------------- Submit New Application ----------------------------------->
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

            $query = "INSERT INTO `candidates` (`name`, `pfp`, `dept`, `post`, `reason`, `cgpa`, `achieve`, `club`, `cert`, `detail`, `status`, `attempts`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssssssssssi", $name, $pfp_upload, $dept, $post, $reason, $cgpa, $achieve, $club, $cert_upload, $detail, $status, $attempts);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['notification']="Application submitted Successfully!";
                header("Location:../users/nominee.php");
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
<!-----------------X---------------- Submit New Application ----------------X------------------>



<!---------------------------------- Update Application ----------------------------------->
<?php
if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $post = mysqli_real_escape_string($conn, $_POST['post']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $reason = mysqli_real_escape_string($conn, $_POST['nomiReason']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
    $achieve = mysqli_real_escape_string($conn, $_POST['achieve']);
    $club = mysqli_real_escape_string($conn, $_POST['club']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $status = "Pending";

    $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];

    // Check if new pfp file is uploaded
    if (!empty($_FILES['pfp']['name'])) {
        $pfpTmpName = $_FILES['pfp']['tmp_name'];
        $pfpUploadPath = '../assets/pfp/' . $_FILES['pfp']['name'];

        // Check if pfp file upload was successful
        if (move_uploaded_file($pfpTmpName, $pfpUploadPath)) {
            $pfpUpdate = "pfp='$pfpUploadPath',";
        } else {
            echo "PFP file upload failed.";
            exit();
        }
    } else {
        $pfpUpdate = "";
    }

    // Check if new cert file is uploaded
    if (!empty($_FILES['cert']['name'])) {
        $certTmpName = $_FILES['cert']['tmp_name'];
        $certUploadPath = '../assets/certificate/' . $_FILES['cert']['name'];

        // Check if certificate file upload was successful
        if (move_uploaded_file($certTmpName, $certUploadPath)) {
            $certUpdate = "cert='$certUploadPath',";
        } else {
            echo "Cert file upload failed.";
            exit();
        }
    } else {
        $certUpdate = "";
    }

    // Use prepared statement for the update query
    $query = "UPDATE candidates SET $pfpUpdate post=?, dept=?, reason=?, cgpa=?, achieve=?, club=?, $certUpdate detail=?, status=? WHERE name=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssssssss', $post, $dept, $reason, $cgpa, $achieve, $club, $detail, $status, $name);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['notification']="Application Updated and resubmitted Successfully!";
            header("Location:../users/nominee.php");
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }
} else {
    echo "Update not requested.";
}
?>
<!---------------X------------------ Update Application ----------------------------------->








<!---------------------------------- Application Status ----------------------------------->
<?php
if (isset($_GET['status']) && isset($_GET['name'])) {
    $status = ($_GET['status'] == 'A') ? "Accepted" : "Rejected";
    $name = $_GET['name'];

    $attempts = isset($_GET['attempts']) ? $_GET['attempts'] + 1 : 1;

    if (!$conn) {
        echo "Connection failed";
    } else {
        $query = "UPDATE candidates SET status=?, attempts=? WHERE name=?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sis", $status, $attempts, $name);
            $query_run = mysqli_stmt_execute($stmt);

            if ($query_run) {
                echo "Operation Successful: $status";
                // header("Location:../admin/applications.php");
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
<!-----------------X---------------- Application Status -----------------X----------------->



<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>