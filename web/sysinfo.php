<?php include 'header.php'; ?>

<h3 id=h_intro>Systeminfo</h3>
<div id=intro>It shows the system environment this website is running on</div>
<div id=systeminfo>
    <?php

    $sysinfo = array('hosttype', 'user', 'shell', 'lc_time','remote_addr');
    foreach ($sysinfo as $elem) {
        $new_elem = strtoupper($elem);
        echo $new_elem.': ';
        echo  getenv($new_elem) . '<br>';
    }

    ?>
</div>
</div>
</div>
<?php include 'footer.php'; ?>

</div>
</div>