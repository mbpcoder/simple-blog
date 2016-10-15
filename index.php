<?php
require_once './lib/database.php';
if (isset($_GET['category'])) {
    $posts = post_find_by_category_id($_GET['category']);
} else {
    $posts = post_all();
}

$categories = category_all();

?>

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
        <?php
        $html = '';
        foreach ($categories as $category) {
            $html .= "<a href='index.php?category={$category['id']}'>{$category['name']}</a>";
        }
        echo $html;
        ?>

    </aside>
    <section class="articles">
        <?php
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
