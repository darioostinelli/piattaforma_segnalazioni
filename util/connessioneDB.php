<?php
class Database{
    private $host = "localhost";
    private $db_name = "my_ostinellidariotest";
    private $username = "root";
    private $password = "";
    public $conn;
    public function getConnection(){
        $this->conn = null;
        $conn = mysqli_connect($servername, $username, $password);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }
}
?>