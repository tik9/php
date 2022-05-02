<link href="/assets//favicon.ico" rel="icon" />

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$lh = 'localhost/public/';
$serv = 'server2.php';
$url = "https://reqbin.com/echo/get/json";
// $web = 'http://' . $_SERVER['HTTP_HOST'] . '/public/' . $serv;
$url = $lh . $serv;
// $url = $web;

$curl = curl_init($url);

// curl_setopt($curl, CURLOPT_VERBOSE, true);
// curl_setopt($curl, CURLOPT_HEADER, true);

// 1 - Check curl error
$error = curl_error($curl);    
$errnum = curl_errno($curl);
$errstr = curl_strerror($errnum);

// 2 - Check http status code of the response
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// $headers = array("Accept: application/json");
// curl_setopt($client, CURLOPT_HTTPHEADER, $headers);
// session_write_close();

curl_setopt($curl, CURLOPT_TIMEOUT, 5); // 5 seconds

// var_dump(curl_getinfo($client));
// var_dump( "error number:" .curl_errno($client));

$result = curl_exec($curl);

// print(curl_error($client));

// if (!empty($result))
    // var_dump($result);

// curl_close($curl);
