<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require __DIR__ . "/../vendor/autoload.php";
    require __DIR__ . "/smtp.env.php";
    // Ejemplo para configurar SMTP:
    // require __DIR__ . "/smtp.php"; 

    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    // Credenciales de SMTP
    $mail->Host = $smtp_host;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtp_port;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;

    $mail->isHTML(true);

    return $mail;