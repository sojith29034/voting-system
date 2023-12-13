<?php
$sname="localhost";
$unmae="root";
$password="";

$db_name="voting system";

$conn = mysqli_connect($sname,$unmae,$password,$db_name);
?>

<?php
$name = $_POST['name'];
$dept = $_POST['dept'];
$post = $_POST['post'];
$detail = $_POST['detail'];

if(!$conn){
    echo "Connection failed";
}
else{
    $stmt = $conn->prepare("insert into candidates(name, dept, post, detail)
    values (?, ?, ? ,?) ");
    $stmt->bind_param("ssss",$name, $dept, $post, $detail);
    $stmt->execute();
    echo "Saved Successfully.";
    header("Location:admin.php");
    exit();
    $stmt->close();
    $conn->close();
}
?> 