<?php
header("Access-Control-Allow-Origin: http://localhost:3000");

require_once 'src/database/db.php';
require_once 'src/Controllers/UserController.php';

// Conectare la baza de date
$db = new Database();
$pdo = $db->connect();

// Instanțierea controllerului pentru utilizatori
$userController = new UserController($pdo);

// Exemplu de utilizare pentru a afișa toți utilizatorii
$users = $userController->index();
echo json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

