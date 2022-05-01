<?php include 'header.php'; ?>

<h3 id=h_intro>To dos</h3>
<div id=intro>The page should give an example how I create a form which is editable and has error form entry checking - filtering unwanted chars and no or blank entries</div>

<span style="margin-left: 500px;margin-top:10px;position: fixed;">
<a href='update.php?newentry=true' class='btn btn-primary'>new Entry</a>
</span>

<?php
include "config.php";

$sql = "SELECT id,title,content FROM todo";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<div style="margin-bottom: 70px;"></div><table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Title</th>";
        echo "<th>Content</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['content'] . "</td>";
            echo "<td>";
            echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record"><span class="fa fa-pencil"></span></a>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo '<div class="alert"><em>No records found.</em></div>';
    }
} else {
    echo "Oops! Something wrong.";
}

mysqli_close($link);
?>
</div>
</div>

<?php include 'footer.php'; ?>
</div>
</div>
</body>

</html>