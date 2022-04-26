<?php

include "config.php";

function do_it($sql, $link)
{
    $error = [];
    $id = $_POST["id"];

    $input_title = trim($_POST["title"]);
    $input_content = trim($_POST["content"]);

    if (empty($input_title)) {
        $error['title'] = 'The title is empty';
    } elseif (empty($input_content)) {
        $error['content'] = 'The content is empty';
    } elseif (!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $error['title'] = 'The title contains invalid characters';
    }
    if ($error) return array($input_title, $input_content, $error);

    if ($stmt = mysqli_prepare($link, $sql)) {
        if ($id) {
            mysqli_stmt_bind_param($stmt, "ssi", $param_title, $param_content, $param_id);
            $param_id = $id;
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $param_title, $param_content);
        }
        $param_title = $input_title;
        $param_content = $input_content;

        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        } else {
            echo "Oops! Something wrong.";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return (array($input_title, $input_content));
}

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $sql = "UPDATE todo SET title=?, content=? WHERE id=?";
    list($title, $content, $error) = do_it($sql, $link);
} else if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $id = trim($_GET["id"]);
    $sql = "SELECT * FROM todo WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = $id;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $title = $row["title"];
                $content = $row["content"];
            } else {
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something wrong.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else if ($_GET['newentry']) {
} else if ($_GET['newentry_save']) {
    $sql = "INSERT INTO todo (title, content) VALUES (?, ?)";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        list($title, $content, $error) = do_it($sql, $link);
    }
} else {
    header("location: error.php");
    exit();
}
include 'header.php';
echo '<h3 id=h_intro>';
if (!empty($_GET['newentry']) || !empty($_GET['newentry_save'])) {
    echo 'Create';
} else
    echo 'Update';
?> Todo</h3>
<div id=intro>The page should give an example how I create a form which is editable and has error form entry checking - filtering unwanted chars and no or blank entries</div>

<div>Please submit to create/update the record.</div>
<form action="<?php
                if ($id) {
                    echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));
                } else echo 'update.php?newentry_save=true';
                ?>" method="post">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control <?php echo (!empty($error['title'])) ? 'is-invalid' : ''; ?>" value="<?php if (!empty($title)) echo $title; ?>">
        <span class="invalid-feedback"><?php echo $error['title']; ?></span>
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control <?php echo (!empty($error['content'])) ? 'is-invalid' : ''; ?>"><?php if (!empty($content)) echo $content; ?></textarea>
        <span class="invalid-feedback"><?php echo $error['content']; ?></span>
    </div>
    <?php
    if (!empty($id)) echo '<input type="hidden" name="id" value=' . $id . ' />';
    ?>
    <input type="submit" class="btn btn-primary" value="Submit">
    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
</form>

</div>
</div>
<?php include 'footer.php'; ?>
</div>
</div>