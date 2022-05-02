<?php
header("Access-Control-Allow-Origin: *");

$obj = (object) [
    'aString' => 'some string',
];

echo json_encode($obj);