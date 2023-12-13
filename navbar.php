<?php
include("./connect.php");

session_start();

if(isset($_SESSION['id']) &&isset($_SESSION['uname']))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCRIT Online Voting</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .nav{
            display: flex;
            flex-wrap: wrap;
            align-content: center;
            align-items: center;
            justify-content: space-between;
            padding: 30px;
        }
        h1{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            /* padding: 20px 40px; */
        }
        a.logout{
            padding: 10px 20px;
            background: #1b1b1b;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
            text-decoration: none;
            transition: .5s ease;
        }
        a.logout:hover{
            background: #515151;
        }
        
        .user-btns a{
            /* border: 2px solid red; */
            padding: 10px 20px;
            background: #1b1b1b;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
            text-decoration: none;
            transition: .5s ease;
        }
        .user-btns a:hover{
            background: #ececec;
            color: #000;
        }
    </style>

</head>
<body>
    <div class="nav">
        <h1 class="user">Hello <?=$_SESSION['uname']?></h1>
        <div class="user-btns">
            <!-- <a class="userHome" href="user.php">Home</a> -->
            <!-- <a class="adminHome" href="user.php">Home</a> -->
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </div>
    <hr>
</body>
</html>