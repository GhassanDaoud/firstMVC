<?php
class User
{
    private $id;
    private $name;
    private $email;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function get_all_users()
    {
        $result = mysqli_query($this->connect, 'SELECT * FROM users');
         $users = array();
         while ($row = mysqli_fetch_assoc($result)) {
             $user = new User();
             $user->setId($row['id']);
             $user->setName($row['name']);
             $user->setEmail($row['email']);
             $users[] = $user;
         }
         return $users;
    }
    public function add_user($connect)
    {
        $sql = "INSERT INTO users (name,email) VALUES ( '$this->name', '$this->email' ) ";
        $stmt = mysqli_query($this->connect, $sql);

    }
    public function edit_user($id)
    {
        $res = $this->connect->query("SELECT * FROM users WHERE id = '$id'");
        $result = mysqli_fetch_assoc($res);
        $user = new User();
        $user->setName($result['name']);
        $user->setEmail($result['email']);
        
    }
}