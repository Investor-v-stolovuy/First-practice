<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."forhktkntuhpi"); // Создаем хэш из пароля

$postgresql = new postgresql('localhost', 'root', '', 'register-bd');


$result = $postgresql->query("SELECT * FROM `first_practice` WHERE `login` = '$login' AND `password` = '$pass'");
$user = $result->fetch_assoc(); // Конвертируем в массив
if(count($user) == 0){
    echo "Такой пользователь не найден.";
    exit();
}
else if(count($user) == 1){
    echo "Логин или пароль введены неверно";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$postgresql->close();

header('Location: page.html');

?>
