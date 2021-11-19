<?php

   //include './lib_php_mailer/class.phpmailer.php';

   include './PHPMailer-master/PHPMailer.php'; 
   include './PHPMailer-master/SMTP.php'; 
   include './PHPMailer-master/Exception.php'; 
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;



   if (!isset($_POST['nombre'])) header('Location: form-email.php');
   echo '<h2>RESULTADO DEL CORREO</h2>';

   //Recoger datos y adaptarlos
   $nombre = $_POST['nombre'];
   $telefono = $_POST['telefono'];
   $email = $_POST['email'];
   $asunto = $_POST['asunto'];
   $mensaje = $_POST['mensaje'];
   $departamento = $_POST['departamento'];
   $importante = $_POST['importante'];

   try {
       //Crear EMAIL --> PHPMAILER
       $phpMailer = new PHPMailer();

       //Configuración GENERAL
       //$phpMailer->setLanguage('es','./lib_php_mailer/'); //Idioma de los errores
       $phpMailer->setLanguage('es','./PHPMailer-master/'); //Idioma de los errores
       //$phpMailer->PluginDir = './lib_php_mailer/'; //Ruta al directorio del plugin
       $phpMailer->PluginDir = './PHPMailer-master/'; //Ruta al directorio del plugin
       $phpMailer->CharSet = 'utf-8'; //Juego de caracteres
       $phpMailer->Timeout = 30; //Cantidad de segundos hasta error
       $phpMailer->Mailer = 'smtp'; //Protocolo de envio
       $phpMailer->SMTPAuth = true; //Se requiere seguridad para acceder
       $phpMailer->isHTML(true); //El correo es de tipo HTML


       //Configuración de la cuenta para GMAIL

       $phpMailer->Port = 465; //Puerto IP de envío
       $phpMailer->SMTPSecure = 'ssl'; //Tipo de seguridad
       $phpMailer->Host= 'smtp.gmail.com'; //Servidor de correo --> smtp.gmail.com
       $phpMailer->Username = 'correo puente llamalo como quieras@gmail.com'; // correo puente
       $phpMailer->Password='CONTRASEÑA'; // contraseña del correo puente
       $phpMailer->From = 'correo puente llamalo como quieras@gmail.com'; // correo puente
       // tienes que crear un correo en gmail y permitir en ese correo el uso de terceros para que funcione
       // luego tienes que usar la contraseña del gmail que has creado para que funcione
       // esto funciona, pero lo normal es usar una cuenta en el mismo servidor que has contratado

       //Configuración de la cuenta para SERVIDOR CONTRATADO

       /* $phpMailer->Port = 465; //Puerto IP de envío
       $phpMailer->SMTPSecure = 'ssl'; //Tipo de seguridad
       $phpMailer->Host= 'mail.multiserval.es'; //Servidor de correo
       $phpMailer->Username = 'al06@multiserval.es';
       $phpMailer->Password='CONTRASEÑA';
       $phpMailer->From = 'al06@multiserval.es'; */


       //Configuración del correos
       $phpMailer->FromName = 'PRUEBA 1 - '.$nombre; //Nombre del remitente
       $phpMailer->addAddress('luisjuradoquesada@gmail.com'); //Dirección de correo electronico destinatario
       $phpMailer->addBCC('al04@multiserval.es');
       $phpMailer->addReplyTo($email);
       $phpMailer->Subject = trim($_POST['asunto']);
       $body = '<h2>Mensaje recibido por la Web</h2>';
       $body .= '<p><strong>Nombre: </strong>'.trim($nombre).'</p>';
       $body .= '<p><strong>Email: </strong>'.trim($email).'</p>';
       $body .= '<p><strong>Teléfono: </strong>'.trim($telefono).'</p>';
       $body .= '<p><strong>Departamento: </strong>'.trim($departamento).'</p>';
       $body .= '<p><strong>Importancia: </strong>'.trim($importante).'</p>';
       $body .= '<p><strong>Mensaje: </strong></p>';
       $body .= nl2br($mensaje);
       $phpMailer->Body = $body;
       
       if ($_FILES['archivo']['tmp_name'])
           $phpMailer->addAttachment($_FILES['archivo']['tmp_name'],$_FILES['archivo']['name']);

       //Enviar el correo
       if ($phpMailer->Send())
           echo '<p>Tu correo electrónico ha sido enviado correctamente</p>';
       else {
           echo $phpMailer->ErrorInfo;
           echo '<p>Se ha producido un error enviando el correo</p>';
       }
   } catch (Exception $ex) {
       echo 'ERROR GENERAL: '.$ex->getMessage();
   }

?>