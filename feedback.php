<?php

$back = "<p><a href=\"page.html\">Вернуться назад</a></p>";

if (!empty($_POST['name']) and !empty($_POST['phone']) and !empty($_POST['mail']) and !empty($_POST['message'])) {
    $name = trim(strip_tags($_POST['name']));
    $phone = trim(strip_tags($_POST['phone']));
    $mail = trim(strip_tags($_POST['mail']));
    $message = trim(strip_tags($_POST['message']));


    echo "Ваше сообщение успешно отправлено!<Br> Вы получите ответ в ближайшее время<Br> $back";

    exit;
} else {
    echo "Для отправки сообщения заполните все поля! $back";
    exit;
}
