<?php
class Database
{
    private $host = "www.iasdcentraldebrasilia.com.br";
    private $db_name = "iasdc624_dbv_app";
    private $username = "iasdc624_dbv_app";
    private $password = "^KF{V~{lWdf8";
    public $conn;

    public function getConnection()

    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>