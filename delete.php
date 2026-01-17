<?php
$file = "data.txt";
$tasks = file($file, FILE_IGNORE_NEW_LINES);

if (isset($_GET['id'])) {
    unset($tasks[$_GET['id']]);
    file_put_contents($file, implode(PHP_EOL, $tasks));
}

header("Location: index.php");
exit;
