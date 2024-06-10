<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;

    public function __construct() {
        $config = require_once 'config/config.php';
        $this->host = $config['db_host'];
        $this->db_name = $config['db_name'];
        $this->username = $config['db_user'];
        $this->password = $config['db_password'];
    }

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $pdo = new PDO($dsn, $this->username, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
