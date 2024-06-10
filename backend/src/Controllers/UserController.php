<?php
require_once "src/Models/Users.php";

class UserController {
    private $usersModel;

    public function __construct($pdo) {
        $this->usersModel = new Users($pdo);
    }

    public function index() {
        return $this->usersModel->getAllUsers();
    }

}
