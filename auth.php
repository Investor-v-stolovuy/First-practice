<?php

$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
$pass = filter_var(trim($_POST['pass']), FILTER_UNSAFE_RAW);

$mysql = new mysqli('localhost', 'sasha', 'sashaone9189', 'first_practice');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
$user = $result->fetch_assoc();
        if (empty($user)) {
            echo "Пользователь не найден.";
            exit();
        }
        setcookie('user', $user['name'], time() + 3600, "/");

        $mysql->close();

        header('Location: page.html');
