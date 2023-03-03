<?php

error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

include "../../DB/db.php";

try {

    $correo;
    $sql="SELECT * FROM persona WHERE correo = '$correo'";
    $query=mysqli_query($DB,$sql);

    $row=mysqli_fetch_array($query);

    if($row > 0)
    {
        $codigo = rand(1000,9999);
        $enviado = false;

        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cottoncosweattt@gmail.com';                     //SMTP username
        $mail->Password   = 'awqelasvixyefjrs';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('cottoncosweattt@gmail.com', 'Cotton & Co Sweaters');
        $mail->addAddress($correo);     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Restablecer tu Password';
        $mail->Body    = '<div style="text-aling:center; background-color:#ccc">
                            <p>Restablecer contraseña</p>
                            <h3>'.$codigo.'</3>
                            <p>
                            <a href="http://localhost/Cotton_-_Co_Sweaters/Código/Ingreso/Restablecer/reset.php?correo='.$correo.'&token='.$token.'">Para restablecer da Click Aqui</a>
                            </p>
                            <p><small>Si usted no solicitó un cambio de contraseña, favor omitir este correo</small></p>
                            </div>';
        if($mail->send()){
            $enviado = true;
        }
    }else{
         echo "<script>alert('Ingresa un correo registrado');window.location='../index.php'</script>";
    }
    } catch (Exception $e) {
    }
    