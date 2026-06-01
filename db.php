<?php


class DB{
    protected $dsn='mysql:host=localhost;dbname=school';
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table =$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function all(...$args){
        $sql = "SELECT * FROM $this->table ";
        //$sql = "SELECT * FROM $this->table";  //取得全部資料
        //$sql = "SELECT * FROM $this->table WHERE `code`='A01' AND `name`='John'"; //取得符合條件的資料
        //$sql = "SELECT * FROM $this->table LIMIT 10,10";    //取得第11筆到第20筆資料
        //$sql = "SELECT * FROM $this->table WHERE `code`='A01' AND `name`='John' LIMIT 10,10";  //取得符合條件的資料中的第11筆到第20筆資料

            if(isset($args[0])){
                if(is_array($args[0])){
                    $tmp=[];
                    foreach($args[0] as $idx => $val){
                        $tmp[]="`$idx`='$val'";
                    }
                    $sql .= " WHERE ".join(" AND ",$tmp);
                }else{
                    $sql .=$args[0];
                }
            }

            if(isset($args[1])){
                $sql .=" ".$args[1];
            }
          
            echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

    function find($arg){
        $sql = "SELECT * FROM $this->table ";
            
            if(is_array($arg)){
                $tmp=[];
                foreach($arg as $idx => $val){
                    $tmp[]="`$idx`='$val'";
                }
                $sql .= " WHERE ".join(" AND ",$tmp);
            }else{
                $sql .= " WHERE `id`='$arg'";
                }
            
            echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    }
}

$Status=new DB('status');
$Scores=new DB('student_scores');
//all()方法的使用範例
/* echo "<pre>";
print_r($Status->all());
echo "</pre>";
echo "<pre>";
print_r($Scores->all(['score'=>64]));
echo "</pre>";
echo "<pre>";
print_r($Scores->all(" LIMIT 3,5"));
echo "</pre>";
echo "<pre>";
print_r($Scores->all("WHERE `score`>60","LIMIT 3,5"));
echo "</pre>"; */

//find()方法的使用範例
echo "<pre>";
print_r($Status->find(3));
echo "</pre>";
echo "<pre>";
print_r($Status->find(['status'=>'補結']));
echo "</pre>";
echo "<pre>";
print_r($Scores->find(["school_num"=>'911005']));
echo "</pre>";

?>