<?php 
include_once "include/db_conn.php";

$sql="select count(*) from `members` where `account`='{$_POST['account']}' AND `password`='{$_POST['password']}'";

//$result=$pdo->query($sql)->fetch();
$result=$pdo->query($sql)->fetchColumn();


?>
<pre>
    <?= print_r($result); 
        /* if($result[0]==1){
            echo "登入成功";
        }else{
            echo "登入失敗";

        } */
        if($result==1){
            echo "登入成功";
            $_SESSION['login']=1;
            $_SESSION['account']=$_POST['account'];
            header("location:admin.php");
        }else{
            echo "登入失敗";
            header("location:login.php?err=1");

        }
    ?>
</pre>