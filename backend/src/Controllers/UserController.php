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

    // Metodele pentru manipularea utilizatorilor pot fi adăugate aici în funcție de necesități
}
