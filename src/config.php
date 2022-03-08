<?php
require_once realpath(__DIR__ . '/../vendor/autoload.php');

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

if ($hostname[0] != 'localhost') {

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db_hostname = $cleardb_url["host"];
    $user = $cleardb_url["user"];
    $password = $cleardb_url["pass"];
    $db = substr($cleardb_url["path"], 1);
    // $active_group = 'default';
    // $query_builder = TRUE;
}

$link = mysqli_connect($db_hostname, $user, $password, $db);


if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
