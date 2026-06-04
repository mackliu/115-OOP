<?php include_once "db_conn.php"; 


/* $sql="insert into news (`subject`,`content`,`author`,`department`) values 
('{$_POST['subject']}','{$_POST['content']}','{$_POST['author']}','{$_POST['department']}')";

$pdo->exec($sql); */

insert('news',$_POST);

header("location:../admin.php?inc=news");

?>