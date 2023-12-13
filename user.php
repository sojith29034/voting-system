<?php
include("./connect.php");
include("navbar.php");
?>

<main>
    <h1>WHAT ARE YOU?</h1>

    <div class="btn">
        <button style="background: green;"><a href="newcandidate.php">I am a Nominee</a></button>
        <button disabled style="background: red;"><a href="voter.php">I am a Voter</a></button>
    </div>
</main>

<style>
    a.adminHome, a.userHome{
        display: none;
    }


    main{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        margin: 50px auto;
        /* border: 2px solid red; */
    }

    .btn button{
        padding: 20px 40px;
        width: 350px;
        border: none;
        border-radius: 20px;
        margin: 100px 50px;
    }
    .btn button a{
        text-decoration: none;
        font-size: 24px;
        color: #fff;
    }
</style>