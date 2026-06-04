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
        $sql = "SELECT * FROM $this->table";
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
          
           // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }
function pagiation($item,$div){
    $total=$this->count();
    $pages=ceil($total/$div);
    $now_page=$_GET['page']??1;
    $start=($now_page-1)*$div;
    
//    $students=$this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        //最左邊的上一頁
    if($now_page-1 >0){
        $perv=$now_page-1;
        echo "<a href='?inc=$item&page=$perv'> < </a>";
    }else{
        echo "<a href='javascript:return false;'> < </a>";
    }

    echo "<div>";
    if($now_page > 3){
        echo "<a href='?inc=$item&page=1'> 1 </a>";
        echo "<span> ... </span>";
    }

    $start_page=$now_page-2;
    $end_page=$now_page+2;

    if($start_page <=1){
        $start_page=1;
        $end_page=min(5,$pages);
    }

    if($end_page > $pages){
        $start_page=max(1,$pages-4);
        $end_page=$pages;
    }
        
    for($i=$start_page;$i<=$end_page;$i++){
        
        $now_class=($now_page==$i)?"now-page":"";
      
       echo "<a href='?inc=$item&page=$i' class='$now_class'> $i </a>";
    }

    if($now_page < $pages-2){
        echo "<span> ... </span>";
        echo "<a href='?inc=$item&page=$pages'> $pages </a>";
    }

    echo "</div>";

    //最右邊的下一頁
    if($now_page+1 <=$pages){
        $next=$now_page+1;
        echo "<a href='?inc=$item&page=$next'> > </a>";
    }else{
        echo "<a href='javascript:return false;'> > </a>";

    }


    return [
        'total'=>$total,
        'pages'=>$pages,
        'now_page'=>$now_page,
        'start'=>$start,
        'div'=>$div
    ];

}

    function count(...$args){
        $sql = "SELECT count(*) FROM $this->table ";
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
          
           // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();

    }
    function math($math,$column,...$args){
        $sql = "SELECT $math($column) FROM $this->table ";
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
        return $this->pdo->query($sql)->fetchColumn();

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

    function save($arg){

        if(isset($arg['id'])){
            $this->update($arg);
        }else{
            $this->insert($arg);
        }

    }

    function insert($arg){
    
        $keys=array_keys($arg);
        $sql="INSERT INTO $this->table (`" . join("`,`",$keys) . "`) VALUES ('" . join("','",$arg) . "')";
        echo $sql;
        return $this->pdo->exec($sql);
    }
    

    function update($arg){
        $sql="UPDATE $this->table SET ";
        $tmp=[];
        foreach($arg as $key => $val){
            $tmp[]="`$key`='$val'";
        }

        $sql .= join(",",$tmp);
        $sql .= " WHERE `id`='{$arg['id']}'";
        
        echo $sql;
        return $this->pdo->exec($sql);
  }

  function delete($arg){
    $sql="DELETE FROM $this->table ";
    if(is_array($arg)){
        $tmp=[];
        foreach($arg as $key => $val ){
            $tmp[]="`$key`='$val'";
        }
        $sql .=" WHERE ".join(" AND ",$tmp);
    }else{
        $sql .=" WHERE `id`='$arg'";
    }
    echo $sql;
    return $this->pdo->exec($sql);

}


    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

$Student=new DB('students');
$ClassStudent=new DB('class_student');
$StudentScore=new DB('student_scores');
$Class=new DB('classes');

?>