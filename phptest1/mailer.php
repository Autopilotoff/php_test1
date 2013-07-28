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

        //�������� ����� phpmailer

        // ������ ��������� config
        //require_once('config.php');

        // ���������� ����� FreakMailer
        require_once('MailClass.php');

        // �������������� �����
        $mailer_fr = new FreakMailer();


// ������������� ���� ������
$mailer_fr ->Subject = "��� ����";

// ������ ���� ������

$mailer_fr ->Body = $message;

// ��������� ����� � ������ �����������
$mailer_fr ->AddAddress('autopilot_off@mail.ru', 'Mr.X');
        //������ ����������� ���������������
$mailer_fr ->FromName = $name;
$mailer_fr ->From = $email;

if(!$mailer_fr->Send()) {
    $visibleButton = "none;";
    $visibleMessage = "block;";
    $success = '�� ���� �������� ������!';
}
else {
    $visibleButton = "none;";
    $visibleMessage = "block;";
    $success = '�������! ����� ������� ����������!!!';
}
$mailer_fr->ClearAddresses();
$mailer_fr->ClearAttachments();
/* ������� �������� ���������
        $headers  = "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: fucker\r\n";
        $msg = iconv('windows-1251', 'UTF-8', $message);
        mail("autopilot_off@mail.ru", $name, $msg, $headers);

        //mail ("autopilot_off@mail.ru", "��������� �� "+$name+" ����: "+$email, "���������:"+$name+" ����: "+$email+". "+$message);
        $visibleButton = "none;";
        $visibleMessage = "block;";
        $success = '�������! ����� ������� ����������!!!';
*/
    }
}


?>