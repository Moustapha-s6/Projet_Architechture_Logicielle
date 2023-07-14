<?php 
class Admin {

    protected $db;

    public function __construct() {    
        $this->db = MyPDO::getInstance();
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function authentifier(string $login ,string $mdp){
    $sql="select count(*) nbl from admin where login='$login' and mdp='$mdp'";
    $query_auth = $this->db->query($sql);
    return $query_auth->fetch(PDO::FETCH_OBJ);
    }
}