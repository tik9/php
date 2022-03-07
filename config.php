<?php

require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = 'localhost';
$db = $_ENV['db'];
$password = $_ENV['password'];
$user = $_ENV['user'];

$link = mysqli_connect($hostname, $user, $password, $db);

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
