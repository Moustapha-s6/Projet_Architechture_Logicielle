<?php
class Categorie {
    private $id ;
    private $libelle ;
    protected $db;

    public function __construct() {   

        $this->db = MyPDO::getInstance();
    }
    
    public function __destruct()
    {
        $this->db = null;
    }
    function getId(){ return $this->id; }
    function setId($id){ $this->id = $id; }
    function getLibelle(){ return $this->libelle; }
    function setLibelle($libelle){ $this->libelle = $libelle; }
    

    public function hydrate (array $data){
        if(isset($data['id'])){
        $this->setId($data['id']) ;
        }
        if(isset($data['libelle'])){
        $this->setLibelle($data['libelle']) ;
        }
    }

    public function create(int $id,string $libelle){
    $sql="insert into categorie values(:id, :libelle)";
    $query= $this->db->prepare($sql);
    $query->bindParam(':id',$id,PDO::PARAM_INT);
    $query->bindParam(':libelle',$libelle,PDO::PARAM_STR);
    $query->execute();
    return $this->db->lastInsertId();
    }

    public function read(){
    $sql="select * from categorie";
    $query = $this->db->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id){
    $sql_supprim="delete from categorie where id=:id";
    $query_supprim=$this->db->prepare($sql_supprim);
    $query_supprim->bindParam(':id',$id,PDO::PARAM_INT);
    $query_supprim->execute();
    }

    public function update(int $id,string $libelle){
        $sql_update="update categorie set libelle= :libelle where id= :id";
        $query_update=$this->db->prepare($sql_update);
        $query_update->execute(["id" => $id,"libelle" => $libelle]);
        }

    public function details(int $id){
        $sql_fiche="select * from categorie where id='$id'";
        $query_fiche= $this->db->query($sql_fiche);
        $query_fiche->bindParam(':id',$id,PDO::PARAM_INT);
        return $query_fiche->fetch(PDO::FETCH_ASSOC);
    }
}

