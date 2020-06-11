<?php
include("logowanie2.php");
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location: ../logowanie.php");
?>