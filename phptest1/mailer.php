<?php

$submited = false;
$visibleMessage = "none;";

if (isset($_POST['submit_button']) && !empty($_POST['submit_button'])) {
    $submited  = true;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message= $_POST['message'];

    if ($name == '') {
        $error_name = '�� �� ����� ���� ���!';
    }  else if (!preg_match('/^[�-��-�A-Za-z0-9 ]{3,20}$/i', $_POST['name'])) {
        $error_name = '�� ����� ������������ ���!';
    }

    if ($email == '') {
        $error_email = '�� �� ����� ��� E-mail!';
    } else if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/i", $_POST['email'])) {
        $error_email = '�� ����� ������������ E-mail!';
    }

    if ($message == '') {
        $error_message = '�� �� ����� ���������!';
    }

    if (empty($error_email) and empty($error_name) and empty($error_message)) {
        $headers  = "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: fucker\r\n";
        $msg = iconv('windows-1251', 'UTF-8', $message);
        mail("autopilot_off@mail.ru", $name, $msg, $headers);

        //mail ("autopilot_off@mail.ru", "��������� �� "+$name+" ����: "+$email, "���������:"+$name+" ����: "+$email+". "+$message);
        $visibleButton = "none;";
        $visibleMessage = "block;";
        $success = '�������! ����� ������� ����������!!!';
    }
}

if (!$submited) {
    $errors[] = '';
}

?>