<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        img.bg{
            height: 100%;
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: .7;
        }
        img{
            height: 100%;
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: .7;
        }
        form{
            max-width: 400px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            border: 2px solid #000;
            background: #ffffffac;
        }
        h1{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-align: center;
            margin-bottom: 40px;
        }
        label{
            display: block;
            margin: 5px 10px;
            width: 300px;
            font-family: 'Times New Roman', Times, serif;
        }
        input{
            display: block;
            margin: 5px 10px;
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: none;
        }
        .button{   
            margin-top: 30px;
            padding: 10px 20px;
            background: #1b1b1b;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
            border: none;
        }
        .button:hover{
            background: #515151;
        }
        p.error{
            display: flex;
            align-items: center;
            justify-content: start;
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            color: #fff;
            background: rgba(255, 0, 0, 0.5);
        }
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
    <?php include './common/message.php'; ?>
    <img src="./assets/bg.jpg" alt="FCRIT" class="bg">
    <img src="./assets/logo.png" alt="FCRIT" class="logo">
    <form action="./common/postLogin.php" method="post">
        <h1>LOGIN</h1>

        <?php
        if (isset($_GET['error'])) {?>
            <p class='error'><?php echo $_GET['error'];?></p>
        <?php
        }
        ?>
        <label for="id"><i class="fas fa-portrait"></i> USER ID</label>
        <input type="tel" name="userid" id="id" placeholder="User ID" autofocus>
        <br>
        <label for="pw"><i class="fas fa-lock"></i> PASSWORD</label>
        <input type="password" name="password" id="pw" placeholder="Password">

        <button type="submit" class="button">LOGIN</button>
    </form>
</body>
</html>