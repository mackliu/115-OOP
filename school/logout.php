<?php include_once "include/db_conn.php";

unset($_SESSION['login']);
unset($_SESSION['account']);

header("location:index.php");
?>
