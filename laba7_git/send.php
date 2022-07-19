<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // include
    require_once 'PHPMailer/Exception.php';
    require_once 'PHPMailer/PHPMailer.php';
    require_once 'PHPMailer/SMTP.php';

    session_start();

    $mail = new PHPMailer();

    // Настройки SMTP
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'ssl://smtp.gmail.com';
   // $mail->SMTPDebug = 5;

    $mail->Port = 465;
    $mail->Username = 'testpop3lab@gmail.com';
    $mail->Password = 'hardpass123';

    // От кого
    $mail->SetFrom('testpop3lab@gmail.com');

    // Кому
    $mail->AddAddress($_POST['email']);

    // Тема письма
    $mail->Subject = $_POST['subject'];

    $mail->msgHTML($_POST['message']);

    // Приложение
    if (strcmp($_FILES['file']['name'][0], "") != 0) {
        foreach ($_FILES["file"]["name"] as $k => $v) {
            $mail->AddAttachment($_FILES["file"]["tmp_name"][$k], $_FILES["file"]["name"][$k]);
        }
    }

    $mail->IsHTML(true);

        if ($mail->send()) {
            echo "Message has been sent successfully";
        }
        else{
            echo "Mail Error ". $mail->ErrorInfo;
        }

?>