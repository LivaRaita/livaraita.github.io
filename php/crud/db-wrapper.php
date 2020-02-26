<?php
$connection =[];

$a = "test";

class DB {
    public $connection;

    public function openConnection() 
    {
        $dbhost = "mysql-server-80";
        $dbuser = "root";
        $dbpass = "root_password";
        $dbname = "web-bootcamp";
        
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } else {
            echo "Connection successful" . "<br/>";
        }
    }

    public function closeConnection() {
        $this->connection->close();
    }

    public function run($sql) {
        $response = $this->connection->query($sql);

        if ($response) {
            return $response;
        } else {
            die("SQL error: " . $this->connection->error . "</br>");
        }
    }
}
?>