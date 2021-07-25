<?php
    if(!isset($_GET['query'])) exit(0);
    include('../config.php');

    $param = '%'.$_GET['query'].'%';
    $query = mysqli_prepare($link,"SELECT p.title, c.body FROM posts AS p INNER JOIN comments AS c ON p.id = c.postId WHERE c.body LIKE ?");
    mysqli_stmt_bind_param($query, "s", $param);
    mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));

    $result = mysqli_stmt_get_result($query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    mysqli_stmt_close($query);
    echo json_encode($myArray);
?>