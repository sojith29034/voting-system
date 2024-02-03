<?php
require '../common/connect.php';

session_start();

if(isset($_SESSION['id']))
{
?>

<!---------------------------------- Add New Campaign ----------------------------------->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitCampaign'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $motto = mysqli_real_escape_string($conn, $_POST['motto']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $campaign = $_FILES['campaign'];

    // File type validation
    $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];

    if (!empty($campaign['tmp_name'])) {
        $campaignMimeType = mime_content_type($campaign['tmp_name']);

        if (in_array($campaignMimeType, $allowedImageTypes)) {
            $campaign_upload = '../assets/campaigns/' . $campaign['name'];
            move_uploaded_file($campaign['tmp_name'], $campaign_upload);

            $query = "INSERT INTO `campaign` (`id`, `motto`, `size`, `campaign`) 
            VALUES (?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssis", $id, $motto, $size, $campaign_upload);

            if (mysqli_stmt_execute($stmt)) {
                echo "Campaign added Successfully!";
                $_SESSION['successMessage']="Campaign added Successfully!";
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
<!-----------------X---------------- Add New Campaign ----------------X------------------>


<?php
}
else{
    header("Location:../login.php");
    exit();
}
?>