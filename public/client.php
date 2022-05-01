<link href="/assets//favicon.ico" rel="icon"/>

<?php
$web = $_SERVER['HTTP_HOST'] . '/public/';
// $url = "https://reqbin.com/echo/get/json";
$url = $web . 'server.php';

$result = curl_init($url);
var_dump($result);
$result = curl_exec($result);
// curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

// $result = json_decode($result);

// curl_setopt($curl, CURLOPT_URL, $url);

// $headers = array(
//     "Accept: application/json",
//     // "Accept: application/text",
// );
// curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
// //for debug only!

// curl_close($curl);