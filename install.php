<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $connection = mysqli_connect($_POST['db_host'], $_POST['db_user'], $_POST['db_password'], $_POST['db_name']);

    $sql_create_users = "CREATE TABLE IF NOT EXISTS users (
                                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                name VARCHAR(32) NOT NULL,
                                email VARCHAR(128) NOT NULL,
                                password VARCHAR(32) NOT NULL,
                                is_admin tinyint(1) DEFAULT '0',
                                description TEXT,
                                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                          ) DEFAULT CHARSET=utf8";
    $sql_insert_users = "INSERT INTO `users` (`id`, `email`, `name`, `password`, `is_admin`) VALUES (1, 'admin@simple-blog.com', 'admin', '123456', 1)";
    $sql_create_categories = "CREATE TABLE IF NOT EXISTS categories (
                              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              `name` VARCHAR(128) NOT NULL,                              
                              user_id INT(11) NOT NULL,
                              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                          ) DEFAULT CHARSET=utf8";
    $sql_insert_categories = "INSERT INTO `categories` (`id`, `name`, `user_id`) VALUES (1, 'Main', 1);";
    $sql_create_posts = "CREATE TABLE IF NOT EXISTS posts (
                              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              title VARCHAR(64) NOT NULL,
                              body TEXT NOT NULL,
                              user_id INT(11) NOT NULL,
                              category_id INT(11) NOT NULL,
                              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                          ) DEFAULT CHARSET=utf8";
    $sql_insert_posts = "INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `category_id`) VALUES (1, 'Test Title', 'Test Post Body', 1, 1);";

    if (mysqli_query($connection, $sql_create_users)) {
        echo "Table users created successfully<br/>";
    } else {
        echo "<pre>Error creating users table: " . mysqli_error($connection) . '</pre>';
    }

    if (mysqli_query($connection, $sql_insert_users)) {
        echo "Table users inserted successfully<br/>";
    } else {
        echo "<pre>Error inserting users table: " . mysqli_error($connection) . '</pre>';
    }

    if (mysqli_query($connection, $sql_create_categories)) {
        echo "Table categories created successfully<br/>";
    } else {
        echo "<pre>Error creating categories table: " . mysqli_error($connection) . '</pre>';
    }

    if (mysqli_query($connection, $sql_insert_categories)) {
        echo "Table categories inserted successfully<br/>";
    } else {
        echo "<pre>Error inserting categories table: " . mysqli_error($connection) . '</pre>';
    }

    if (mysqli_query($connection, $sql_create_posts)) {
        echo "Table posts created successfully<br/>";
    } else {
        echo "<pre>Error creating posts table: " . mysqli_error($connection) . '</pre>';
    }

    if (mysqli_query($connection, $sql_insert_posts)) {
        echo "Table posts inserted successfully<br/>";
    } else {
        echo "<pre>Error inserting posts table: " . mysqli_error($connection) . '</pre>';
    }

    mysqli_close($connection);

    $config = "<?php
                  const DB_HOST = '{$_POST['db_host']}';
                  const DB_DATABASE = '{$_POST['db_name']}';
                  const DB_USER = '{$_POST['db_user']}';
                  const DB_PASSWORD = '{$_POST['db_password']}';
              ";

    file_put_contents('./lib/config.php', $config);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Blog Installer</title>
    <link rel="stylesheet" href="css/install.css">
</head>
<body>
<form action="install.php" method="post">
    <div>
        <label for="db_host">Database Host: </label>
        <input type="text" name="db_host" id="db_host" value="localhost">
    </div>
    <div>
        <label for="db_name">Database Name: </label>
        <input type="text" name="db_name" id="db_name" value="simple-blog">
    </div>
    <div>
        <label for="db_user">Database User: </label>
        <input type="text" name="db_user" id="db_user" value="root">
    </div>
    <div>
        <label for="db_password">Database Password: </label>
        <input type="password" name="db_password" id="db_password" value="">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Install Simple Blog">
    </div>
</form>
</body>
</html>
