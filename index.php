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
        <a href="about.html">About</a>
    </aside>
    <section class="articles">
        <?php
        require_once './lib/database.php';
        $posts = post_all();
        $html = '';
        foreach ($posts as $post) {
          $article = '<article>';
          $article .= "<h4>{$post['title']}</h4><hr/>";
          $article .= $post['body'];
          $article .= '</article>';
          $html .= $article;
        }
        echo $html;
        ?>
    </section>
</div>
<footer>All rights reserved!</footer>
</body>
</html>
