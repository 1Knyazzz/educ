<?php
//уведомаления
    function f_alert($message) {
    echo "<script>alert('$message');</script>";
}
//запись в бд
function insert($name, $password, $email, $number, $description, $conn)
{
    $do_insert = $conn->prepare("INSERT INTO test1(username, email, password, number, description)  VALUES (:name, :email, :password, :number, :description)");
    $do_insert -> execute(array(':name' => $name, ':email' =>$email, ':password'=>$password, ':number'=>$number, ':description'=>$description));
//    $query ="INSERT INTO test1(username, email, password, number, description)  VALUES ('$name', '$password', '$email', '$number', '$description')";
//    $conn-> $query;
}
//запрос кол-ва страниц
function pagen($conn, $limit)
{
    $count=$conn->query("SELECT COUNT(*) FROM test1 ");
    $count_rec =$count->fetch(PDO :: FETCH_NUM);
    $count_cur = $count_rec['0'];
    return ceil((int)$count_cur / $limit);
}
//запрос данных
function query_out($conn, $limit, $offset)
{
    return $conn->query("SELECT * FROM test1 LIMIT $limit OFFSET $offset");
}