<?php

class FeedbackRepository
{

    private PDO $connection;
    public function __construct(PDO $connection)
    {
        $this->connection =$connection;
    }
    function create($name, $password, $email, $number, $description): int
    {
        $valid = true;
        $name= htmlspecialchars(strip_tags($name));
        $password = htmlspecialchars(strip_tags($password));
        $email = htmlspecialchars(strip_tags($email));
        $number = htmlspecialchars(strip_tags($number));
        $description = htmlspecialchars(strip_tags($description));

        if (!preg_match('/^[a-zA-Z0-9-_]+$/', $name)){
            $valid = false;
        }
        elseif(filter_var($email, FILTER_VALIDATE_EMAIL) != $email){
            $valid = false;
        }
        elseif (!is_string($password) || $password == '' || strlen($password) < 8 || strlen($password) > 64){
            $valid = false;
        }
        else{
            $valid = true;
        }


        $query = $this->connection->prepare("INSERT INTO test1(username, email, password, number, description)  VALUES (:name, :email, :password, :number, :description)");

        if ($valid) {
            $query -> execute(array(':name' => $name, ':email' =>$email, ':password'=>$password, ':number'=>$number, ':description'=>$description));
            $idCreate = $this->selectId();
            return $idCreate;
        } else {
            return false;
        }
    }
    function selectId(): int
    {
        $queryid = $this->connection->query("SELECT MAX(id) FROM test1");
        $id =$queryid->fetch(PDO::FETCH_NUM);
        return $id;
    }
    public function selectPagen(int $limit): int
    {
        $count=$this->connection->query("SELECT COUNT(*) FROM test1 ");
        $countRaw =$count->fetch(PDO::FETCH_NUM);
        $countCur = $countRaw['0'];
        $countPage =ceil((int)$countCur / $limit);
        return $countPage;
    }
    public function queryOut(int $limit, int $offset): array
    {
        $arrayRecords = array();
        $records = $this->connection->query("SELECT * FROM test1 LIMIT $limit OFFSET $offset");
        foreach ($records as $current)
            $arrayRecords[]= $current;
        return  $arrayRecords;
    }
}