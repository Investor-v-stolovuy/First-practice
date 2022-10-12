<?php

$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
$pass = filter_var(trim($_POST['pass']), FILTER_UNSAFE_RAW);

 // Создаем хэш из пароля


$sql = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=sashaone9189");


$result = pg_query($sql, "SELECT login, password FROM first_practice WHERE login = '$login' AND password = '$pass'");
$user = pg_fetch_row($result); // Конвертируем в массив
if(empty($user)){
    echo "Такой пользователь не найден.";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

pg_close($sql);

header('Location: page.html');


