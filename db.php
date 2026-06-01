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

        $rows=$this->pdo->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_ASSOC);

        return $rows; //整個$table 的資料

    }
}

$Status=new DB('status');
$Scores=new DB('student_scores');
echo "<pre>";
print_r($Status->all());
echo "</pre>";
echo "<pre>";
print_r($Scores->all());
echo "</pre>";

?>