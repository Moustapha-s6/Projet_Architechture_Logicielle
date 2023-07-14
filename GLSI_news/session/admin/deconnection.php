<?php include ("config.php");

$login = $_SESSION['root'];
session_unset();
session_destroy();
header("location:./");
exit();