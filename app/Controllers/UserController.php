<?php
require_once "../../config/database.php";
require_once "../Models/User.php";

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function index() {
        $result = $this->user->read();
        include_once '../app/views/users.php';
    }
}