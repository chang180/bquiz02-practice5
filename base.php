<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class DB{
    private $dsn="mysql:host=localhost;dbname=db02;charset=utf8";
    private $root="root";
    private $password="";

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->root,$this->password);
    }

    public function all(...$arg){
        $sql=" SELECT * FROM $this->table ";
        if(!empty($arg[0]) && is_array($arg[0])){
            foreach ($arg[0] as $k=>$v) $tmp[]="`$k`='$v'";
            $sql.=" WHERE ".implode(" && ",$tmp);
        }
        $sql.=$arg[1]??"";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function count(...$arg){
        $sql=" SELECT COUNT(*) FROM $this->table ";
        if(!empty($arg[0]) && is_array($arg[0])){
            foreach ($arg[0] as $k=>$v) $tmp[]="`$k`='$v'";
            $sql.=" WHERE ".implode(" && ",$tmp);
        }
        $sql.=$arg[1]??"";
        return $this->pdo->query($sql)->fetchColumn();
    }
    public function del($arg){
        $sql=" DELETE FROM $this->table ";
        if(is_array($arg)){
            foreach ($arg as $k=>$v) $tmp[]="`$k`='$v'";
            $sql.=" WHERE ".implode(" && ",$tmp);
        }else $sql.=" WHERE `id`='$arg'";
        return $this->pdo->exec($sql);
    }
    public function find($arg){
        $sql=" SELECT * FROM $this->table ";
        if(is_array($arg)){
            foreach ($arg as $k=>$v) $tmp[]="`$k`='$v'";
            $sql.=" WHERE ".implode(" && ",$tmp);
        }else $sql.=" WHERE `id`='$arg'";
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function q($sql){
        return $this->pdo->query($sql)->fetchALL();
    }
    public function save($arg){
        if(isset($arg['id'])){
            foreach ($arg as $k=>$v) $tmp[]="`$k`='$v'";
            $sql=sprintf("UPDATE %s SET %s WHERE `id`='%s'",$this->table,implode(",",$tmp),$arg['id']);
        }else $sql=sprintf("INSERT INTO %s (`%s`) VALUES ('%s')",$this->table,implode("`,`",array_keys($arg)),implode("','",$arg));
        return $this->pdo->exec($sql);
    }
}
function to($url){
    header("location:$url");
}
function jto($url){
    echo "<script>location.href='$url'</script>";
}

$Log=new DB('log');
$News=new DB('news');
$Que=new DB('que');
$User=new DB('user');
$Total=new DB('total');

$chktoday=$Total->count(['date'=>date("Y-m-d")]);
if($chktoday==0){
    $_SESSION['visited']=1;
    $Total->save(['date'=>date("Y-m-d"),'count'=>1]);
}

if(empty($_SESSION['visited'])){
    $_SESSION['visited']=1;
    $today=$Total->find(['date'=>date("Y-m-d")]);
    $today['count']++;
    $Total->save($today);
}

$today=$Total->find(['date'=>date("Y-m-d")])['count'];
$total=$Total->q("SELECT SUM(count) FROM total")[0][0];