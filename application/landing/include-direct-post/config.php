<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', '127.0.0.1');
define('DATABASE', 'gabrica');

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

try {
    $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>