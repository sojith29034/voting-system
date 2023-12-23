<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="ad_style.css">
</head>
<body>
    <?php
    include("../common/connect.php");
    // include 'newcand.php';
    // include 'newcandidate.php';
    ?>
    <?php
    // $sname="localhost";
    // $unmae="root";
    // $password="";

    // $db_name="voting system";

    // $conn = mysqli_connect($sname,$unmae,$password,$db_name);

    // $name = $_POST['name'];
    // $dept = $_POST['dept'];
    // $post = $_POST['post'];
    // $detail = $_POST['detail'];
    ?>


    <div class="nav">
        <h1 class="admin">Welcome back, Administrator</h1>
        <div class="admin-controls">
            <!-- <a href="newcandidate.php">Add New Candidate</a> -->
            <a href="../admin/newcandidate.php">Add New Candidate</a>
            <a href="" style="background: green;">Start Voting</a>
        </div>
        <a class="logout" href="../common/logout.php">Logout</a>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <!-- <th>Sr. No.</th> -->
                <th>Nominee Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Details of the Nominee</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>
        <?php
        $query = "SELECT * FROM candidates";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run)>0){

            foreach($query_run as $row)
            {
                ?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['post']?></td>
                    <td><?=$row['dept']?></td>
                    <td class="detail"><?=$row['detail']?></td>
                    <td><a href="">Delete</a></td>
                </tr>
                <?php
            }
        }
        else{
           ?>
            <tr>
                <td colspan="5">No candidates added. <a href="../admin/newcandidate.php">Add New Candidate now</a>.</td>
            </tr>
           <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>