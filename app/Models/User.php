<?php
namespace App\Models;

class UserModel extends BaseModel {
    protected $validTables = ['user'];

    public function __construct($db) {
        parent::__construct($db);
        $this->setTable('user');
    }

    public function getById($id) {
        $query = "SELECT id, username, email FROM {$this->getTable()} WHERE id = :id";
        return $this->fetchById($query, $id);
    }

    // Exemple de getter et setter pour une propriété spécifique
    private $username;

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        // Vous pouvez ajouter une validation ici
        $this->username = $username;
    }

    // Méthodes magiques pour un accès flexible aux données de la base
    private $data = [];

    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}