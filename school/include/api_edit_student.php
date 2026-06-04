<?php
include_once "db_conn.php";

/* echo "<pre>";
print_r($_POST['name']);
echo "</pre>"; */

$sql_student="UPDATE `students` SET 
                         `name`='{$_POST['name']}', 
                         `birthday`='{$_POST['birthday']}', 
                         `uni_id`='{$_POST['uni_id']}', 
                         `addr`='{$_POST['addr']}', 
                         `parents`='{$_POST['parents']}', 
                         `tel`='{$_POST['tel']}', 
                         `dept`='{$_POST['dept']}', 
                         `graduate_at`='{$_POST['graduate_at']}', 
                         `status_code`='{$_POST['status_code']}' 
                WHERE `school_num`='{$_POST['school_num']}'";

$sql_class="UPDATE `class_student` 
               SET `class_code`='{$_POST['class_code']}' 
               WHERE `school_num`='{$_POST['school_num']}'";

$pdo->exec($sql_student);
$pdo->exec($sql_class);

header("location:../admin.php?inc=class_students&code={$_POST['class_code']}");
?>