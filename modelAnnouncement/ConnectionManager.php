<?php

class ConnectionManager {
    public function getConnection() {
        $dsn = 'mysql:host=localhost;dbname=allAnnouncements;charset=utf8';
        $username = 'root';
        $password = 'root';

        try {
            return new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}



?>