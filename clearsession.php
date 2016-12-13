<?php
session_start();
unset($_SESSION["idprop"]);
unset($_SESSION["idcust"]);
//session_destroy();
header("location:dashboard.php");
?>