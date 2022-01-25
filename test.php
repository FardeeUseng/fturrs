<?php
session_start();

$_SESSION['nametest'] = "fardee";

echo $_SESSION['nametest'];
session_unset();
// $_SESSION['nametest'] = "fardee1";
// echo $_SESSION['nametest'];
?>