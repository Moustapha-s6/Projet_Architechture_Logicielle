<?php 
class MyPDO extends PDO{
    private const SERVER = "localhost";
    private const USER = "root";
    private const PWD = "";
    private const DB =  "mglsi";
    private const DSN = "mysql:host=".self::SERVER.";dbname=".self::DB;
    private static $instance;

    protected function __clone(){
    return new Exception('Le clonage est interdit');
    }

    public static function  getInstance(){
        if(!self::$instance){
            try {
                self::$instance  = new MyPDO(self::DSN,self::USER,self::PWD,array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ));
            } catch (PDOException $e) {
              die("Erreur connexion:".$e->getMessage());
            }
        }
        return self::$instance;
    }
}