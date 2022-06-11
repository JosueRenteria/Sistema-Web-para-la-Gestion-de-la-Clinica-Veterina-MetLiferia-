<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
        
    if(isset($_SESSION["boleta"])){
        require "./../phpmailer/vendor/autoload.php";
        require "./passwordGmail.php";
        
        $boleta = $_GET["boleta"];
        $conexion = mysqli_connect("localhost","root","","sem20221");
        $sql = "SELECT * FROM alumno WHERE boleta = '$boleta'";
        $res = mysqli_query($conexion,$sql);
        $inf = mysqli_fetch_row($res);
        $dirCorreo = $inf[4];
        $nombreCompleto = $inf[1]." ".$inf[2]." ".$inf[3];
        $archPDF = "./../archsPdfs/".$boleta.".pdf";
            
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'tareas.jaor@gmail.com';
        $mail->Password = $contrasena;
        $mail->setFrom('tareas.jaor@gmail.com', 'TDAW20221-JAOR');
        $mail->addAddress($dirCorreo, $nombreCompleto);
        $mail->Subject = 'Test TDAW 20221';
        $mail->msgHTML("<h1 style='color:#006699;'>Test 14 DIC 2021</h1><h2>Escuela Superior de Cómputo</h2>");
        $mail->AltBody = 'Test 14 DIC 2021';
        $mail->addAttachment($archPDF);
        $mail->addAttachment('./../imgs/header.png');
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }else{
        header("location:./../login.html");
    }
?>