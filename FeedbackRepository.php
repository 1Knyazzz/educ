<?php
require 'static/connect.php';
$initDb = DbConnection::getInstance();
$connection = $initDb -> initDbConnection();
class FeedbackRepository
{
    public $name;
    public $password;
    public $email;
    public $number;
    public $description;
    private $connection;
    public function __construct($connection){
        $this->connection =$connection;
    }
    function create()
    {
        $name= htmlspecialchars(strip_tags($this -> name));
        $password = htmlspecialchars(strip_tags($this->password));
        $email = htmlspecialchars(strip_tags(filter_var($this->email, FILTER_VALIDATE_EMAIL)));
        $number = htmlspecialchars(strip_tags($this->number));
        $description = htmlspecialchars(strip_tags($this->description));

        $query = $this->connection->prepare("INSERT INTO test1(username, email, password, number, description)  VALUES (:name, :email, :password, :number, :description)");

        if     ($query -> execute(array(':name' => $name, ':email' =>$email, ':password'=>$password, ':number'=>$number, ':description'=>$description))) {
            return true;
            $this->selectId();
        } else {
            return false;
        }
    }
    function selectId()
    {
        $id = $this->connection->query("SELECT MAX(id) FROM test1");
        return settype($id, 'integer');
    }
    public function selectPagen(int $limit)
    {
        $count=$this->connection->query("SELECT COUNT(*) FROM test1 ");
        $countRaw =$count->fetch(PDO::FETCH_NUM);
        $countCur = $countRaw['0'];
        $countPage =ceil((int)$countCur / $limit);
        return settype($countPage, 'integer');
    }
    public function queryOut(int $limit, int $offset)
    {

        $records = $this->connection->query("SELECT * FROM test1 LIMIT $limit OFFSET $offset");
        return  settype($records, 'array');
    }
}