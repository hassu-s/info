<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ニュース投稿ページ</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>
    <div class="container">
        <h1>ニュース投稿ページ</h1>
        <form id="newsForm" action="save_news.php" method="post">
            <label for="title">タイトル:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">内容:</label>
            <textarea id="content" name="content" required></textarea>
            <button type="submit">投稿</button>
        </form>
        <div id="newsList">
            <?php
            $files = glob('uploads/*.json');
            foreach ($files as $file) {
                $newsItem = json_decode(file_get_contents($file), true);
                echo '<div class="news-item">';
                echo '<h2>' . htmlspecialchars($newsItem['title']) . '</h2>';
                echo '<div>' . $newsItem['content'] . '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>
