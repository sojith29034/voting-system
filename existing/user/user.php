<?php
include("../common/connect.php");
include("../common/navbar.php");
?>

<div class="user">
    <div class="opt">
        <img src="../assets/bg.jpg" alt="FCRIT" class="bg">
        <h1>WHAT ARE YOU?</h1>
        <div class="btn">
            <button class="cand"><a href="../user/nominee.php">I am a Nominee</a></button>
            <button disabled class="voter"><a href="../user/voter.php">I am a Voter</a></button>
        </div>
    </div>
</div>

<style>
    a.adminHome, a.userHome{
        display: none;
    }


    .user{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        overflow: auto;
        position: relative;        
    }

    .opt{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: hidden;
    }
    .opt img.bg{
        height: 100%;
        width: 100%;
        position: absolute;
        object-fit: cover;
        overflow: hidden;
        z-index: -1;
        opacity: .7;
    }
    .opt h1{
        padding-top: 50px;
    }
    .btn button{
        padding: 20px 40px;
        width: 350px;
        border: none;
        border-radius: 20px;
        margin: 50px;
        cursor: pointer;
    }
    .opt .btn button.cand{
        background: green; 
        border: 2px solid green;
    }
    .opt .btn button.voter{
        background: red; 
        border: 2px solid red;
    }
    .btn button a{
        text-decoration: none;
        font-size: 24px;
        color: #fff;
        transition: .5s;
    }
    /* .opt .btn button.cand:hover,
    .opt .btn button.voter:hover{
        background: blur;
    } */
    .opt .btn button:hover a{
        color: #000;
    }
</style>