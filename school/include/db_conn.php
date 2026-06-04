<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

session_start();
date_default_timezone_set("Asia/Taipei");

function all($table){
    //連線資料庫
    global $pdo;
    $rows=$pdo->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);

    return $rows; //整個$table 的資料
}

function find($table,$id){
    //連線資料庫
    global $pdo;

    if(!is_numeric($id)){
        echo "ID 必須為數字";
        return false;
    }else if($id<1){
        echo "ID 必須大於等於 1";
        return false;
    }else if(!$pdo->query("SELECT count(*) FROM $table WHERE `id`='$id'")->fetchColumn()){
        echo "找不到指定的資料";
        return false;
    }

    $row=$pdo->query("SELECT * FROM $table WHERE `id`='$id'")->fetch(PDO::FETCH_ASSOC);

 return $row;
}

function update($table,$arg,$cols){
    global $pdo;

    $sql="UPDATE $table SET ";
    $tmp=[];
    foreach($cols as $key => $val){
        $tmp[]="`$key`='$val'";
    }
     
    $sql .= join(",",$tmp);


    if(is_numeric($arg)){
        $sql .= " WHERE `id`='$arg'";
    }else{
        $tmp=[];
        foreach($arg as $key=>$val){
            $tmp[]="`$key`='$val'";
        }
        $sql .= " WHERE ".join(" AND ", $tmp);
    }

    //echo $sql;
 return $pdo->exec($sql);
}


function insert($table,$arg){
    global $pdo;

    $keys=array_keys($arg);

    $sql="INSERT INTO $table (`" . join("`,`",$keys) . "`) VALUES ('" . join("','",$arg) . "')";
    echo $sql;
return $pdo->exec($sql);
}


function delete($table,$arg){
    global $pdo;
    $sql="DELETE FROM `$table` ";
    if(is_numeric($arg)){
        $sql .=" WHERE `id`='$arg'";
    }else{
        $tmp=[];
        foreach($arg as $key => $val ){
            $tmp[]="`$key`='$val'";
        }
        $sql .=" WHERE ".join(" AND ",$tmp);
    }
   // echo $sql;
    return $pdo->exec($sql);

}


?>