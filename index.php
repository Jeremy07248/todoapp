<?php
$file = "data.txt";
$tasks = file_exists($file) ? file($file, FILE_IGNORE_NEW_LINES) : [];

$total = count($tasks);
$done = 0;

foreach ($tasks as $line) {
    if (strpos($line, "|") !== false) {
        list($_, $status) = explode("|", $line);
        if ($status == 1) $done++;
    }
}
$pending = $total - $done;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>To-Do App | UAS Web Dasar</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <div class="top-bar">
        <h1>📌 To-Do App</h1>
        <button id="darkToggle">🌙</button>
    </div>

    <div class="stats">
        <span>Total: <b><?= $total ?></b></span>
        <span>Selesai: <b><?= $done ?></b></span>
        <span>Belum: <b><?= $pending ?></b></span>
    </div>

    <form action="process.php" method="POST">
        <input type="text" name="task" placeholder="Masukkan tugas..." required>
        <button type="submit">Tambah</button>
    </form>

    <ul>
        <?php foreach ($tasks as $i => $line): 
            if (strpos($line, "|") === false) continue;
            list($task, $status) = explode("|", $line);
            $class = $status == 1 ? "done" : "";
        ?>
        <li class="<?= $class ?>">
            <span><?= htmlspecialchars($task) ?></span>
            <div>
                <a href="toggle.php?id=<?= $i ?>">✔</a>
                <a href="delete.php?id=<?= $i ?>">❌</a>
                <div class="author-corner">
    Thimotyus Jeremy<br>
    A12.2024.07248
</div>

            </div>
        </li>
        <?php endforeach; ?>
    </ul>

   <small class="footer">
    UAS Web Dasar — <?= date('Y') ?>
</small>



</div>

<script src="assets/script.js"></script>
</body>
</html>
