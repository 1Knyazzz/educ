<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
</head>
<body>
<?php
$conn = new PDO('pgsql:host=localhost port=5432 dbname=test user=root password=1');
if($conn)
    echo 'connected';
else
    echo 'non';
$count=$conn->query("SELECT COUNT(*) FROM test1 ");
//print_r($count);
$count_rec =$count->fetch(PDO :: FETCH_NUM);
print_r($count_rec);
echo $count_rec['0'];
//$count=pg_query($conn, "SELECT COUNT(*) FROM test1 ");
//$count_rec =pg_fetch_all_columns($count, );
//echo $count_rec['0'];
//$count_cur = $count_rec['0'];
//$total_pages = round((int)$count_cur / 5);
//echo $total_pages;



if($_GET['source'] != ''){
    $link = explode('?source=',$_SERVER['REQUEST_URI']);
    $relink = 'http://'.$_SERVER['HTTP_HOST'].$link[0];
    header('Location: '.$relink);
}
?>

</body>
</html>

