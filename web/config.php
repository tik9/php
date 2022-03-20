<?php
include realpath(__DIR__ . '/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$hostname = gethostname();
$hostname = getenv('HTTP_HOST');
$hostname_port = $_SERVER['HTTP_HOST'];
$hostname = explode(':', $hostname_port);

$db_hostname = 'localhost';
$db = $_ENV['db'];
$password = $_ENV['password'];
$user = $_ENV['user'];

$db_hostname = $_ENV['host_heroku'];
$db = $_ENV['db_heroku'];
$password = $_ENV['password_heroku'];
$user = $_ENV['user_heroku'];

$link = mysqli_connect($db_hostname, $user, $password, $db);

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
