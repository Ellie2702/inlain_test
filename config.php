<?php
    $db_host = 'localhost';
    $db_name = 'db_blog';
    $db_user = 'root';
    $db_pass = '';
    

    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) 
    or die('Произошла ошибка' . mysqli_error($link));
?>