<?php
if (isset($_POST['task']) && $_POST['task'] !== '') {
    $task = htmlspecialchars(trim($_POST['task']));
    file_put_contents("data.txt", $task . "|0" . PHP_EOL, FILE_APPEND);
}
header("Location: index.php");
exit;
