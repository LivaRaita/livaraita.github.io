<?php
$connection =[];

$a = "test";

class DB {
    private static $connection;

    public function openConnection() 
    {
        $dbhost = "mysql-server-80";
        $dbuser = "root";
        $dbpass = "root_password";
        $dbname = "web-bootcamp";
        
        static::$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        if (static::$connection->connect_error) {
            die("Connection failed: " . static::$connection->connect_error);
        } else {
            // echo "Connection successful" . "<br/>";
        }
    }

    public static function closeConnection() {
        static::$connection->close();
        static::$connection = null;
    }

    public static function run($sql) {
        if(!static::$connection) {
            static::openConnection();
        }

        $response = static::$connection->query($sql);

        if ($response === TRUE) {
            $response = static::$connection->insert_id;
        }

        static::closeConnection();

        // if ($response) {
        //     return $response;
        // } else {
        //     die("SQL error: " . static::$connection->error . "</br>");
        // }
        if (static::$connection->error) {
            die("SQL error: " . static::$connection->error . "</br>");
        } else {
            return $response;
        }
    }
}
?>