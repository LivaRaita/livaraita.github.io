<?php

class User {
    private $name;
    private $password;
    private $id;

    public function __construct()
    {
        $this->name = $data["name"];
        $this->password = $data["password"];
        $this->id = $data["id"];

    }

    public function setName($newName) 
    {
        $this->name = $newName;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setPassword($newPassword) 
    {
        $this->password = $newName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }
}
?>