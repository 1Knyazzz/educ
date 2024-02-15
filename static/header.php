<?php
require 'connect.php';

define('HOST', 'pgsql:host=localhost;port=5432;dbname=test');
define('USER', 'root');
define('PASSWORD', '1');

$initDb = DbConnection::getInstance();
$connection = $initDb -> initDbConnection(HOST, USER, PASSWORD);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="static/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<header>
    <a href ='input.php' class="navig">input</a>
    <a href ='output.php' class="navig">output</a>
</header>
<main role="main">
