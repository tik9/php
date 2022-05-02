<?php
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'localhost:80/public/server2.php');
curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 5 seconds
curl_setopt($ch, CURLOPT_VERBOSE, true);

$result = curl_exec($ch);
var_dump($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);