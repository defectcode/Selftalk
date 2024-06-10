<?php
require_once "../Controllers/UserController.php";

// Conectare la baza de date
$db = new Database();
$pdo = $db->connect();

// Instanțierea controllerului pentru utilizatori
$userController = new UserController($pdo);

// Definirea rutelor API-ului

// Ruta pentru afișarea tuturor utilizatorilor
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/api/users') {
    $users = $userController->index();
    echo json_encode($users);
}

// Alte rute și logica asociată pot fi adăugate aici pentru alte operații CRUD
