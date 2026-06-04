<?php 
include_once "include/db_conn.php";

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */

$sql="INSERT INTO `members` (`account`,`password`,`email`,`tel`,`birthday`)
            VALUES ('{$_POST['account']}',
                    '{$_POST['password']}',
                    '{$_POST['email']}',
                    '{$_POST['tel']}',
                    '{$_POST['birthday']}')";

$pdo->exec($sql);
header("location:login.php");

?>