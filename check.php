<?php

$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW); // Удаляет все лишнее и записываем значение в переменную //$login
$pass = filter_var(trim($_POST['pass']), FILTER_UNSAFE_RAW);

if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
    echo "Недопустимая длина логина";
    exit();
}

$pass = sha1($pass); // Создаем хэш из пароля

$sql = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=sashaone9189");

$result1 = pg_query_params($sql, "SELECT * FROM 'users' WHERE 'login' = '$login' AND 'password' = '$pass'");
$user1 = pg_fetch_assoc($result1); // Конвертируем в массив
if(!empty($user1)){
    echo "Данный логин уже используется!";
    exit();
}


header('Location: /');
exit();
