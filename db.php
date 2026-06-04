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
            if(isset($args[0])){
                if(is_array($args[0])){
                    $tmp=$this->a2s($args[0]);
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
                $tmp=$this->a2s($arg);
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
        $tmp=$this->a2s($arg);
        $sql .= join(",",$tmp);
        $sql .= " WHERE `id`='{$arg['id']}'";
        
        echo $sql;
        return $this->pdo->exec($sql);
  }

  function delete($arg){
    $sql="DELETE FROM $this->table ";
    if(is_array($arg)){
        $tmp=$this->a2s($arg);
        $sql .=" WHERE ".join(" AND ",$tmp);
    }else{
        $sql .=" WHERE `id`='$arg'";
    }
    echo $sql;
    return $this->pdo->exec($sql);

}

    function count(...$args){
        $sql = "SELECT count(*) FROM $this->table ";
            if(isset($args[0])){
                if(is_array($args[0])){
                    $tmp=$this->a2s($args[0]);
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
                    $tmp=$this->a2s($args[0]);
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

    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    private function a2s($array){
        $tmp=[];
        foreach($array as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        return $tmp;
    }

}


function dd($array){
 echo "<pre>";
 print_r($array);
 echo "</pre>";
}

function to($url){
    header("location:$url");
}


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
/* echo "<pre>";
print_r($Status->find(3));
echo "</pre>";
echo "<pre>";
print_r($Status->find(['status'=>'補結']));
echo "</pre>";
echo "<pre>";
print_r($Scores->find(["school_num"=>'911005']));
echo "</pre>"; */

//insert()方法的使用範例
//$Status->save(['code'=>'301','status'=>'退學','note'=>'重大違紀事件']);
//$Status->save(['id'=>'5','status'=>'停學','note'=>'因故中止學業']);

//delete()方法的使用範例
//$Status->delete(5);
//$Status->delete(['code'=>'301','status'=>'退學']);

?>