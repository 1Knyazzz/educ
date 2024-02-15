<?php

class FeedbackRepository
{
    public function __construct(){
    }
    function create($connection)
    {
        $name = htmlspecialchars(strip_tags($_POST['username']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $number = htmlspecialchars(strip_tags($_POST['number']));
        $description = htmlspecialchars(strip_tags($_POST['description']));

        $query = $connection->prepare("INSERT INTO test1(username, email, password, number, description)  VALUES (:name, :email, :password, :number, :description)");
        //можно  добавить сюда returning id

        if     ($query -> execute(array(':name' => $name, ':email' =>$email, ':password'=>$password, ':number'=>$number, ':description'=>$description))) {
            return true;
            $this->selectId($connection);
        } else {
            return false;
        }
        exit();
    }
    function selectId($connection)
    {
        return $connection->query("SELECT MAX(id) FROM test1");
    }
}