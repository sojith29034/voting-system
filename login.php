<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

    <style>
        img.logo{
            height: 100px;
            width: auto;
            position: absolute;
            top: 20px;
            left: 20px;
            opacity: 1;
        }
    </style>
</head>
<body>
    <img src="./bg.jpg" alt="FCRIT" class="bg">
    <img src="./logo.png" alt="FCRIT" class="logo">
    <form action="action.php" method="post">
        <h1>LOGIN</h1>

        <?php
        if (isset($_GET['error'])) {?>
            <p class='error'><?php echo $_GET['error'];?></p>
        <?php
        }
        ?>
        <label for="id">USER ID</label>
        <input type="tel" name="userid" id="id" placeholder="User ID" autofocus>
        <br>
        <label for="pw">PASSWORD</label>
        <input type="password" name="password" id="pw" placeholder="Password">

        <button type="submit" class="btn">LOGIN</button>
    </form>
</body>
</html>