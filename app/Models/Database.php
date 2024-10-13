<?php

namespace App\Models;

use PDO;

abstract class Database {
    protected $db;

    public function __construct() {
      $host = "localhost";
      $db_name = "arkandia";
      $username = "root";
      $password = "root";
  
      try {
          $this->db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password, [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
          ]);
          echo '<script>console.log("Connexion à la base de données réussie !");</script>';;
      } catch(PDOException $e) {
          echo "Erreur de connexion : " . $e->getMessage();
      }
  }
}