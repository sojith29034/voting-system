<?php
require 'connect.php';
?>

<nav class="navbar sticky-top bg-primary">
  <div class="container-fluid">
    <h1 class="navbar-brand text-light">Hello <?=$_SESSION['uname']?></h1>

    <a href="../common/logout.php" class="btn btn-light">Logout</a>
  </div>
</nav>