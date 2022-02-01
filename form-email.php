
<?php 
include 'config.php';

$db = new PDO($db_dsn, $db_user, $db_pass, $db_options);

/*recibo los datos del formulario*/
$email = $_POST['email'];

/*guardo los datos en la db*/
$sql = 'insert into datos (email) values (?, ?)'; //nombres de las columnas de la db
$sql_params = [$email];

$st = $db->prepare($sql);
$st->execute($sql_params);


/*mail destinatario y contenido a recibir*/
$email_to = "hola@telocreo.studio"; 
$contenido = "$email ha enviado un mensaje desde la web de mujeressinlimites<br />Email: $email";
$asunto = "Consulta desde la Web Mujeressinlimites";

//Cabeceras del correo para que no llegue a spam
$header = "MIME-Version: 1.0 \r\n";
$header.= "Content-type: text/html; charset=utf-8 \r\n";

/*función para enviar mail*/
mail($email_to, $asunto, utf8_decode($contenido), $header);

//echo "<script>alert('Mensaje enviado con éxito');document.location='$regresar';</script>";
//echo '<h4>¡Mail enviado exitosamente!</h4>';
header('Location: ' . 'form-success.html');

