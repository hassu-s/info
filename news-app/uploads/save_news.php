<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $newsItem = [
        'title' => $title,
        'content' => $content
    ];

    $filename = 'uploads/' . time() . '.json';
    file_put_contents($filename, json_encode($newsItem));

    header('Location: index.php');
    exit();
}
?>
