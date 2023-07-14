<?php
class Article {
    private $titre ;
    private $contenu ;
    private $contenuComplet ;
    private $categorie ;
    protected $db;

    public function __construct() {   

        $this->db = MyPDO::getInstance();
    }
    
    public function __destruct()
    {
        $this->db = null;
    }
    function getTitre(){ return $this->titre; }
    function setTitre($titre){ $this->titre = $titre; }
    function getContenu(){ return $this->contenu; }
    function setContenu($contenu){ $this->contenu = $contenu; }
    function getContenuComplet(){ return $this->contenuComplet; }
    function setContenuComplet($contenuComplet){ $this->contenuComplet = $contenuComplet; }
    function getCategorie(){ return $this->categorie; }
    function setCategorie($categorie){ $this->categorie=$categorie; }

    public function hydrate (array $data){
        if(isset($data['titre'])){
        $this->setTitre($data['titre']) ;
        }
        if(isset($data['contenu'])){
        $this->setContenu($data['contenu']) ;
        }
        if(isset($data['contenuComplet'])){
        $this->setContenuComplet($data['contenuComplet']) ;
        }
        if(isset($data['categorie'])){
        $this->setCategorie($data['categorie']) ;
        }
    }

    public function create(string $titre,string $contenu,string $contenuComplet,int $categorie){
    $sql="insert into article values(null, :titre,:contenu,:contenuComplet,null,null,:categorie)";
    $query= $this->db->prepare($sql);
    $query->bindParam(':titre',$titre,PDO::PARAM_STR);
    $query->bindParam(':contenu',$contenu,PDO::PARAM_STR);
    $query->bindParam(':contenuComplet',$contenuComplet,PDO::PARAM_STR);
    $query->bindParam(':categorie',$categorie,PDO::PARAM_INT,1);
    $query->execute();
    return $this->db->lastInsertId();
    }

    public function read(){
    $sql="select * from article";
    $query = $this->db->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id){
    $sql_supprim="delete from article where id=:id";
    $query_supprim=$this->db->prepare($sql_supprim);
    $query_supprim->bindParam(':id',$id,PDO::PARAM_INT);
    $query_supprim->execute();
    }

    public function update(int $id,string $titre,string $contenu,string $contenuComplet,string $categorie){
        $sql_update="update article set titre= :titre, contenu= :contenu,
            contenuComplet= :contenuComplet, categorie= :categorie where id= :id";
        $query_update=$this->db->prepare($sql_update);
        $query_update->execute(["id" => $id,"titre" => $titre,"contenu" => $contenu,"contenuComplet" => $contenuComplet,"categorie" => $categorie]);
        }

    public function details(int $id){
        $sql_fiche="select * from article where id='$id'";
        $query_fiche= $this->db->query($sql_fiche);
        $query_fiche->bindParam(':id',$id,PDO::PARAM_INT);
        return $query_fiche->fetch(PDO::FETCH_ASSOC);
    }
}

