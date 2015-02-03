<?php
require_once __DIR__ . '/Database.php';

class ArtistQuery extends Database {
    public function __construct(){
        //session_start();
        parent::__construct();
    }
    
    public function getAll(){
        $sql = "
            SELECT *
            FROM artists
            ORDER BY artist_name
        ";
        $statement = static::$pdo->prepare($sql);
        $statement->bindParam(1, $artist_id);
        $statement->bindParam(2, $artist_name);
        $statement->execute();
        $artists = $statement->fetchAll(PDO::FETCH_OBJ);
        if($artists){
            return $artists;
        }
        
    }
}
