<?php
$sname="localhost";
$unmae="root";
$password="";

$db_name="voting system";

$conn = mysqli_connect($sname,$unmae,$password,$db_name);
?>


<?php
session_start();

if(!$conn){
    echo "Connection failed";
}
else{
    echo "Connection success";
}

// include "./db_conn.php";
if(isset($_POST['userid']) && isset($_POST['password'])){
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }

    $uid = validate($_POST["userid"]);
    $pwd = validate($_POST["password"]);

    if(empty($uid)){
        header("Location:../login.php?error=User ID Required.");
        exit();
    }
    else if(empty($pwd)){
        header("Location:../login.php?error=Password Required.");
        exit();
    }
    else{
        $sql = "SELECT * FROM login WHERE id='$uid' AND pw='$pwd'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            
            if($row['id']=='admin' && $row['pw']=='admin'){
                header("Location:../admin/admin.php");
                exit();
            }
            if($row['id']==$uid && $row['pw']==$pwd){
                $_SESSION['uname']=$row['uname'];
                $_SESSION['id']=$row['id'];
                header("Location:../user/user.php");
                exit();
            }
            // echo '<br>Logged in to ID ';
            // print ($row['id']);
            // echo '<br>';
            // print_r ($row);
            // exit();
            else{
                header("Location:../login.php?error=Incorrect User ID or Password.");
                exit();
            }
        }
        else{
            header("Location:../login.php?error=Incorrect User ID or Password.");
            exit();
        }
    }
}
else{
    header("Location:../login.php");
    exit();
}
?>