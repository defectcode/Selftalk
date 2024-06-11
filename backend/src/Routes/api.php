<?php
require_once 'path/to/your/database/db.php';
require_once 'path/to/your/Controllers/UserController.php';

$db = new Database();
$pdo = $db->connect();

$userController = new UserController($pdo);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if ($method === 'OPTIONS') {
    exit();
}

switch ($method) {
    case 'GET':
        if ($uri === '/api/users') {
            $users = $userController->index();
            echo json_encode($users);
        } elseif (preg_match('/\/api\/users\/(\d+)/', $uri, $matches)) {
            $userId = $matches[1];
            $user = $userController->show($userId);
            echo json_encode($user);
        }
        break;
    case 'POST':
        if ($uri === '/api/users') {
            $userData = json_decode(file_get_contents('php://input'), true);
            $newUserId = $userController->store($userData);
            echo json_encode(['id' => $newUserId]);
        }
        break;
    case 'PUT':
        if (preg_match('/\/api\/users\/(\d+)/', $uri, $matches)) {
            $userId = $matches[1];
            $userData = json_decode(file_get_contents('php://input'), true);
            $userController->update($userId, $userData);
            echo json_encode(['status' => 'success']);
        }
        break;
    case 'DELETE':
        if (preg_match('/\/api\/users\/(\d+)/', $uri, $matches)) {
            $userId = $matches[1];
            $userController->delete($userId);
            echo json_encode(['status' => 'success']);
        }
        break;
}
