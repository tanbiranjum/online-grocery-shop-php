<?php

class Db
{
    private $user = 'root';
    private $password = '';
    private $dsn = "mysql:host=localhost;dbname=testdb";

    public function connect()
    {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo $error_message;
        }
    }
}
