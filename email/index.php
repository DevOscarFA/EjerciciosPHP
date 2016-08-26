<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo 'hola';

require("phpmailer/class.phpmailer.php");


$mail = new PHPMailer();


//indico a la clase que use SMTP
$mail­>IsSMTP();
/*/permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail­>SMTPDebug = 2;
//Debo de hacer autenticación SMTP
$mail­>SMTPAuth = true;
$mail­>SMTPSecure = "ssl";
//indico el servidor de Gmail para SMTP
$mail­>Host = "smtp.gmail.com";
//indico el puerto que usa Gmail
$mail­>Port = 465;
//indico un usuario / clave de un usuario de gmail
$mail­>Username = "codigoelectronica@gmail.com";
$mail­>Password = "c0d1g0++";
$mail­>SetFrom('codigoelectronica@gmail.com', 'Código Electrónica');
$mail­>AddReplyTo("codigoelectronica@gmail.com","Código Electrónica");
$mail­>Subject = "Envío de email usando SMTP de Gmail";
$mail­>MsgHTML("Hola que tal, esto es el cuerpo del mensaje!");
//indico destinatario
$address = "oscarfdzalz@gmail.com.com";
$mail­>AddAddress($address, "Oscar");
if(!$mail­>Send()) {
echo "Error al enviar: " . $mail­>ErrorInfo;
} else {
echo "Mensaje enviado!";
}*/