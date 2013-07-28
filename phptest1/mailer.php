<?php

$submited = false;
$visibleMessage = "none;";

if (isset($_POST['submit_button']) && !empty($_POST['submit_button'])) {
    $submited  = true;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message= $_POST['message'];

    if ($name == '') {
        $error_name = 'Вы не ввели Ваше Имя!';
    }  else if (!preg_match('/^[А-Яа-яA-Za-z0-9 ]{3,20}$/i', $_POST['name'])) {
        $error_name = 'Вы ввели некорректное Имя!';
    }

    if ($email == '') {
        $error_email = 'Вы не ввели Ваш E-mail!';
    } else if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/i", $_POST['email'])) {
        $error_email = 'Вы ввели некорректный E-mail!';
    }

    if ($message == '') {
        $error_message = 'Вы не ввели сообщение!';
    }

    if (empty($error_email) and empty($error_name) and empty($error_message)) {

        //отправка через phpmailer

        // Читаем настройки config
        //require_once('config.php');

        // Подключаем класс FreakMailer
        require_once('MailClass.php');

        // инициализируем класс
        $mailer_fr = new FreakMailer();


// Устанавливаем тему письма
$mailer_fr ->Subject = "Это тест";

// Задаем тело письма

$mailer_fr ->Body = $message;

// Добавляем адрес в список получателей
$mailer_fr ->AddAddress('autopilot_off@mail.ru', 'Mr.X');
        //адреса отправителя переопределение
$mailer_fr ->FromName = $name;
$mailer_fr ->From = $email;

if(!$mailer_fr->Send()) {
    $visibleButton = "none;";
    $visibleMessage = "block;";
    $success = 'Не могу отослать письмо!';
}
else {
    $visibleButton = "none;";
    $visibleMessage = "block;";
    $success = 'Спасибо! Форма успешно отправлена!!!';
}
$mailer_fr->ClearAddresses();
$mailer_fr->ClearAttachments();
/* простая отправка сообщения
        $headers  = "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: fucker\r\n";
        $msg = iconv('windows-1251', 'UTF-8', $message);
        mail("autopilot_off@mail.ru", $name, $msg, $headers);

        //mail ("autopilot_off@mail.ru", "Сообщение от "+$name+" ящик: "+$email, "Сообщение:"+$name+" ящик: "+$email+". "+$message);
        $visibleButton = "none;";
        $visibleMessage = "block;";
        $success = 'Спасибо! Форма успешно отправлена!!!';
*/
    }
}


?>