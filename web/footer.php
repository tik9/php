<div id=marginfooter></div>
<div id=sitemap>
    
<?php
$content = array(
    'index',
    'sysinfo',
    'test'
);

foreach ($content as $elem) {
    echo '| <a href=' . $elem . '.php>' . ucfirst($elem) . '</a> | ';
}
$uri = $_SERVER['REQUEST_URI'];
$github = 'https://github.com/tik9/php/';
echo '</div><div id=footer> <a href=' . $github . '>Github Repo</a> | ';
echo '<a href=' . $github . 'blob/master' . $uri . '>Source</a> | Made by Tiko</div>';
?>

<script src="../assets/client.js"></script>