<?php

use UserController as GlobalUserController;

require_once __DIR__ . '/../models/User.php';
class UserController
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function index()
    {
        $user->get_all_users();
       
        require 'views/user/index.php';
    }



    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $name = $user->getName();
            $email = $user->getEmail();
            $user->add_user($this->conn);
            header('Location: /PHPCOURSE/Darrebeni/MVC/');
            exit;
        } else {
            require 'views/user/create.php';
        }
    }
    public function edit($id)
    {
        $res = $this->connect->query("SELECT * FROM users WHERE id = '$id'");
        $result = mysqli_fetch_assoc($res);
        $user = new User();
        $user->setName($result['name']);
        $user->setEmail($result['email']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $name = $user->getName();
            $email = $user->getEmail();
            $stmt = $this->connect->query("UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'");
            header("Location:/PHPCOURSE/Darrebeni/MVC/");
            exit;
        } else {
            require 'views/user/edit.php';
        }
    }

    public function delete_user($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $select = "DELETE FROM users where id='$user_id'";
            $query = mysqli_query($this->connect, $select);
            header("Location:/PHPCOURSE/Darrebeni/MVC/");
        } else {
            require_once "views/user/delete_user.php";
        }
    }
}