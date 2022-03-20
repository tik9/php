<?php include 'header.php';

$files = array('index.php', 'test.php');

foreach ($files as $elem) {
    if (file_exists($elem)) {
        $fname = $elem;
        break;
    }
}
// $existingFiles = array_filter(
//     $files,
//     function ($elem) { return file_exists($elem); }
// );
var_dump(1,php_ini_loaded_file());
?>


<h3 id=h_intro>Test File</h3>
<div id=intro>For the learning curve and testing of php and JS code and try out new features.</div>

<div id=test></div>

<?php include 'footer.php'; ?>
<script src=../assets/test.js></script>

</div>
</div>
</div>
</div>
