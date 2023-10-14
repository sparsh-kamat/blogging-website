<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'sparshblogs';

$conn = new MySQLi($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}

define("ROOT_PATH", realpath(dirname(__FILE__)));
define("BASE_URL", "http://localhost/sparshblogs");

session_start();
