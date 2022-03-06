<?php
// echo 'h w 2';
require_once realpath(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$hostname = 'localhost';
$db = $_ENV['db'];
$password = $_ENV['password'];
$user = $_ENV['user'];
// echo $db.$user.$password;

try {
    $dbPdo = new PDO("mysql:host=$hostname;dbname=$db", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    echo(json_encode(array('outcome' => true)));
} catch (PDOException $ex) {
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}

class My_Sql
{
    public $dbPdo;

    public function __construct($dbPdo)
    {
        $this->dbPdo = $dbPdo;
    }

    public function fetchAll()
    {
        $query = "SELECT * FROM todo";
        // echo  $query;
        $queryObj = $this->dbPdo->prepare($query);
        $queryObj->execute();
        $result = $queryObj->fetchAll();
        // print_r($queryObj);
        // print_r($result);
        foreach ($result as $row) {
            echo $row['title'];
            echo $row['content'];
        }
    }

    public function testDb()
    {
        echo 1;
    }
}

$obj = new My_Sql($dbPdo);
$obj->testDb();
$obj->fetchAll();
