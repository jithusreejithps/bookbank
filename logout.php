<?php
session_start();
$a=$_SESSION['uname'];
session_destroy();
header("location:index.php");
?>