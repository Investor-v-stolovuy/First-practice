<?php

$back = "<p><a href=\"page.html\">Вернуться назад</a></p>";
$mysql = new mysqli('localhost', 'sasha', 'sashaone9189', 'first_practice');

if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['mail']) && !empty($_POST['message'])) {
    $name = trim(strip_tags($_POST['name']));
    $phone = trim(strip_tags($_POST['phone']));
    $mail = trim(strip_tags($_POST['mail']));
    $message = trim(strip_tags($_POST['message']));


    echo "Ваше сообщение успешно отправлено!<Br> Вы получите ответ в ближайшее время<Br> $back";
} else {
    echo "Для отправки сообщения заполните все поля! $back";
    exit();
}
if (isset($_POST["check"])) {
    $result1 = mysqli_query($mysql, "INSERT INTO `checks` (data_check) VALUES ('{$_POST['check']}')");
        exit();
    }
if (isset($_POST["check1"])) {
    $result1 = mysqli_query($mysql, "INSERT INTO `checks` (news_check) VALUES ('{$_POST['check1']}')");
    exit();
}
if (isset($_POST["check2"])) {
    $result1 = mysqli_query($mysql, "INSERT INTO `checks` (test_check) VALUES ('{$_POST['check2']}')");
    exit();
}
if (isset($_POST["radio-1"])) {
    $result1 = mysqli_query($mysql, "INSERT INTO `checks` (send_mail) VALUES ('{$_POST['send_mail']}')");
    exit();
}


