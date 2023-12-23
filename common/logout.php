<?php
session_start();

header("Location:../login.php");

session_unset();
session_destroy();
exit();
?>