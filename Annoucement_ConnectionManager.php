<?php
class ConnectionManager{
    public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "allAnnoucements";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}

?>