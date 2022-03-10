<?php
$uri = $_SERVER['REQUEST_URI'];
$github = 'https://github.com/tik9/php/';
echo '<a href=' . $github . '>Github Repo</a> | ';
echo '<a href=' . $github . 'blob/master' . $uri . '>Source Code</a> | Made by Tiko';
