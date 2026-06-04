<?php include "db_conn.php";
$id=$_POST['id'];
$sql="DELETE FROM `news` WHERE `id`='{$id}'";
$pdo->exec($sql);
//header("location:../admin.php?inc=news");
to("../admin.php?inc=news");
?>