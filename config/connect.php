<?php

class Database {

    public PDO $pdo;

    public function __construct() {

        $host = "localhost";
        $dbname = "metise";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $user,
                $pass
            );
        } catch (PDOException $e) {
            die("Erreur DB : " . $e->getMessage());
        }
    }
}
