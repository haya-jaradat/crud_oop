<?php
class Database
{
    private $db_name = 'My_application';
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'Haya3010!!';

    public $conn;

    public function create_connection()
    {
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ";dbname=" . $this->db_name,
                $this->username, $this->password);

            echo 'connected succuss';
        } catch (PDOException $exception) {
            echo "connection Error" . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
