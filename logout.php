<?php
session_start();
unset($_SESSION["logid"]);
//session_destroy();
header("location:index.php");
?>