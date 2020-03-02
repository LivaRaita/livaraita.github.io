<?php

    require_once __DIR__ . "/../helpers/db-wrapper.php";

    class UserModel {

        public static function getAllUsers($limit = 25) 
        {
            echo $limit;
            return $result = DB::run("SELECT name, password, id FROM people LIMIT " . $limit);
        }

        public function addUser(User $data)
        {
            $name = $data->getName();
            $password = $data->getPassword();

            $sql = "INSERT INTO people (name, password) VALUES ('$name', '$password')";
            DB::run($sql);
        }

        public static function getUserById($id) 
        {
            $result = DB::run("SELECT * FROM people WHERE id=$id");
            return $result ? $result : [];
            
        }

        public static function updateUser($data) 
        {
            $sql = "UPDATE people SET name='$name', password='$password' WHERE id='$id'";
            DB::run($sql);
        }

        public static function deleteUserByID($id) {
            DB::run("DELETE FROM people
            WHERE id =" .$_GET["id"]);
        }
    }
?>