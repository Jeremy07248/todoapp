<?php
$file = "data.txt";
$tasks = file($file, FILE_IGNORE_NEW_LINES);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    list($task, $status) = explode("|", $tasks[$id]);
    $status = $status == 0 ? 1 : 0;
    $tasks[$id] = "$task|$status";
    file_put_contents($file, implode(PHP_EOL, $tasks));
}

header("Location: index.php");
exit;
