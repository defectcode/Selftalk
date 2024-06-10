<?php

class Users {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($userData) {
        $stmt = $this->pdo->prepare("INSERT INTO users (first_name, last_name, email, age, gender, city, country, occupation) 
                                    VALUES (:first_name, :last_name, :email, :age, :gender, :city, :country, :occupation)");
        $stmt->execute($userData);
        return $this->pdo->lastInsertId();
    }

    public function updateUser($id, $userData) {
        $stmt = $this->pdo->prepare("UPDATE users SET 
                                    first_name = :first_name, 
                                    last_name = :last_name, 
                                    email = :email, 
                                    age = :age, 
                                    gender = :gender, 
                                    city = :city, 
                                    country = :country, 
                                    occupation = :occupation 
                                    WHERE id = :id");
        $userData['id'] = $id;
        $stmt->execute($userData);
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
