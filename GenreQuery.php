<?php
require_once __DIR__ . '/Database.php';

class GenreQuery extends Database {
    public function __construct(){
        //session_start();
        parent::__construct();
    }
    
    public function getAll(){
        $sql = "
            SELECT *
            FROM genres
            ORDER BY genre
        ";
        $statement = static::$pdo->prepare($sql);
        $statement->bindParam(1, $genre_id);
        $statement->bindParam(2, $genre_name);
        $statement->execute();
        $genres = $statement->fetchAll(PDO::FETCH_OBJ);
        if($genres){
            return $genres;
        }
        
    }
}