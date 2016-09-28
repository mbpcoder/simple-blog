<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<header>Simple Responsive blog</header>
<div class="content">
    <aside>
        <a href="programming.html">Programming With PHP</a>
        <a href="website.html">WebSite</a>
        <a href="book.html">Book</a>
        <a href="aout.html">About</a>
    </aside>
    <section class="articles">
        <?php
        $connection = mysqli_connect('localhost', 'root', '2110', 'student_blog');
        $sql = 'SELECT * FROM posts';
        $result = mysqli_query($connection, $sql);
        $html = '';
        while ($post = mysqli_fetch_assoc($result)) {
            $article = '<article>';
            $article .= "<h4>{$post['title']}</h4><hr/>";
            $article .= $post['body'];
            $article .= '</article>';
            $html .= $article;
        }
        echo $html;
        mysqli_close($connection);
        ?>
    </section>
</div>
<footer>All rights reserved!</footer>
</body>
</html>