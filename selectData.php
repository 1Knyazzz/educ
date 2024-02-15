<?php

class selectData{

    public function __construct(){
    }
    public function selectPagen($connection, $limit)
    {
        $count=$connection->query("SELECT COUNT(*) FROM test1 ");
        $count_rec =$count->fetch(PDO :: FETCH_NUM);
        $count_cur = $count_rec['0'];
        return ceil((int)$count_cur / $limit);
    }
    public function query_out($connection, $limit, $offset)
    {
        return $connection->query("SELECT * FROM test1 LIMIT $limit OFFSET $offset");
    }
}

