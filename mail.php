<?php

$post_name = NULL;
$post_tel = NULL;
$post_email = NULL;
$post_message = NULL;
$name = NULL;
$tel = NULL;
$email = NULL;
$message = NULL;
$ok = NULL;

if ($_POST) {

    $post_name = filter_input(INPUT_POST, 'name');
    $post_tel = filter_input(INPUT_POST, 'tel');
    $post_email = filter_input(INPUT_POST, 'email');
    $post_message = filter_input(INPUT_POST, 'message');


    if (preg_match("/^[a-zA-Zа-яА-Я]+$/ui", $post_name)) {
        $name = $post_name;
    } else {
        define("INVALID_NAME", "is-invalid");
    }

    if (preg_match("/^[0-9+()-]{5,20}+$/", str_replace(' ', '', $post_tel))) {
        $tel = str_replace([' ', '(', ')', '-'], ['', '', '', ''], $post_tel);
    } else {
        define("INVALID_PHONE", "is-invalid");
    }

    if (filter_var($post_email, FILTER_VALIDATE_EMAIL)) {
        $email = $post_email;
    } else {
        define("INVALID_EMAIL", "is-invalid");
    }

    if ($post_message) {
        $message = htmlspecialchars($post_message, ENT_QUOTES);
    }

    if ($name and $tel and $email) {
        $to = EMAIL_ADDRES;
        $subject = SUBJECT;
        $message = 'Имя: ' . $name . '<br>' . 'Email: ' . $email . '<br>' . 'Тел: ' . $tel . '<br><br>Сообщение: <br>' . $post_message . '<hr>';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: ' . $subject . '<' . $to . '>' . "\r\n" .
                'Reply-To: ' . $to . '' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        $name = NULL;
        $tel = NULL;
        $email = NULL;
        $message = NULL;
        $ok = OK_EMAIL;
    }
}