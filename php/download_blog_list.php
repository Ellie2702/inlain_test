<?php
    include('../config.php');

    // Определение источников данных
    define('Comments', 'https://jsonplaceholder.typicode.com/comments');
    define('Posts', 'https://jsonplaceholder.typicode.com/posts');

    // Парсим json
    $data_comments = json_decode(file_get_contents(Comments), true);
    $data_posts = json_decode(file_get_contents(Posts), true);

    // Импортируем посты
    for ($i = 0; $i < count($data_posts); $i++) {
        $query = mysqli_prepare($link,
            "INSERT INTO posts (userId, id, title, body)
            VALUES (?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $query,
            "iiss",
            $data_posts[$i]["userId"],
            $data_posts[$i]["id"],
            $data_posts[$i]["title"],
            $data_posts[$i]["body"]
        );

        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
    }

    // Импортируем комментарии
    for ($i = 0; $i < count($data_comments); $i++) {
        $query = mysqli_prepare($link,
            "INSERT INTO comments (postId, id, name, email, body)
            VALUES (?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $query,
            "iisss",
            $data_comments[$i]["postId"],
            $data_comments[$i]["id"],
            $data_comments[$i]["name"],
            $data_comments[$i]["email"],
            $data_comments[$i]["body"]
        );

        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
    }

    $result = "Загружено " . count($data_posts) . " записей и " . count($data_comments) . " комментариев";
    
    echo $result;    
?>