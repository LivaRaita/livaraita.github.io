<?php

    require_once __DIR__ . "/../helpers/db-wrapper.php";
    require_once __DIR__ . "/../entity/User.php";

    class UserModel {

        public static function getAllTodos($limit = 25) 
        {
            return $result = DB::run("SELECT description, checked, order_id, id FROM todo LIMIT " . $limit);
        }

        public function addTodo(Todo $data)
        {
            $description = $data->getTodo();

            // $password = User::hashPassword($data->getPassword());
           
            $sql = "INSERT INTO todo (description) VALUES ('$description')";
            DB::run($sql);
        }

        public static function getTodoById($id) 
        {
            $result = DB::run("SELECT * FROM todo WHERE id=$id");
            return $result ? $result : [];
            
        }

        public static function updateTodo($data) 
        {
            $description = $data["description"];
            $sql = "UPDATE todo SET description='$description' WHERE id='$id'";
            DB::run($sql);
            $id = $data["id"];
        }

        public static function deleteTodoById($id) {
            DB::run("DELETE FROM todo
            WHERE id =" .$_GET["id"]);
        }
    }
?>