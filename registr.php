<?php

$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
$pass = filter_var(trim($_POST['pass']), FILTER_UNSAFE_RAW);

if (mb_strlen($login, 'utf8') < 5 || mb_strlen($login, 'utf8') > 25) {
    echo "Недопустимая длина логина";
    exit();
}

$mysql = new mysqli('localhost', 'sasha', 'sashaone9189', 'first_practice');
if (isset($_POST["login"])) {
    $result1 = mysqli_query($mysql, "INSERT INTO `users` (`login`, `password`) VALUES ('{$_POST['login']}', '{$_POST['pass']}')");
    if (!empty($user1)) {
        echo "Данный логин уже используется!";
        exit();
    }
}

header('Location: page.html');
exit();
