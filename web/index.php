<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Timo Körner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Timo Körner - To dos</h2>
                    </div>
<span style="margin-left: 500px;"></span>
<a href='update.php?newentry=true' class='btn btn-primary'>new Entry</a>

<?php
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT id,title,content FROM todo";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<div style="margin-bottom: 50px;"></div><table class="table table-bordered table-striped">';
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
        </div>
    </div>
</body>

</html>