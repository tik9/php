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
    // echo(json_encode(array('outcome' => true)));
} catch (PDOException $ex) {
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
$query = "SELECT title,content FROM todo";
// echo  $query;
$queryObj = $dbPdo->prepare($query);
$queryObj->execute();
$result = $queryObj->fetchAll();

print array2Html($result);

function array2Html($array, $table = true)
{
    $out = '';
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            if (!isset($tableHeader)) {
                $tableHeader =
                    '<th>' .
                    implode('</th><th>', array_keys($value)) .
                    '</th>';
            }
            array_keys($value);
            $out .= '<tr>';
            $out .= array2Html($value, false);
            $out .= '</tr>';
        } else {
            $out .= "<td>$value</td>";
        }
    }

    if ($table) {
        return '<table>' . $tableHeader . $out . '</table>';
    } else {
        return $out;
    }
}

class My_Sql
{
    public $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function fetchAll()
    {
      
        // print_r($queryObj);
        // print_r($result);
        // $result = array( array("title"=>"rose",  "number"=>15),array("title"=>"daisy", "number"=>25));
        if (count($this->result) > 0): ?>
            <table>
              <thead>
                <tr>
                  <th><?php echo implode('</th><th>', array_keys(current($this->result))); ?></th>
                </tr>
              </thead>
              <tbody>
            <?php foreach ($this->result as $row): array_map('htmlentities', $row); ?>
                <tr>
                  <td><?php echo implode('</td><td>', $row); ?></td>
                </tr>
            <?php endforeach; ?>
              </tbody>
            </table>
            <?php endif; 
    }

    public function insert()
    {
        echo 1;
    }
}

$obj = new My_Sql($result);
// $obj->insert();
$obj->fetchAll();
