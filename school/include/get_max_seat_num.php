<?php include "db_conn.php";

$code=$_GET['code'];
echo $max_seat_num=$pdo->query("select max(`seat_num`) from `class_student` where `class_code`='{$code}'")->fetchColumn();

?>