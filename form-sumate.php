
<?php 
include 'config.php';

$db = new PDO($db_dsn, $db_user, $db_pass, $db_options);

/*recibo los datos del formulario*/
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$email = $_POST['telefono'];

/*guardo los datos en la db*/
$sql = 'insert into datos (nombre,apellido, email, telefono) values (?, ?)'; //nombres de las columnas de la db
$sql_params = [$nombre, $apellido, $email, $telefono];

$st = $db->prepare($sql);
$st->execute($sql_params);


/*mail destinatario y contenido a recibir*/
$email_to = "hola@telocreo.studio"; 
$contenido = "$nombre ha enviado un mensaje desde la web de mujeressinlimites<br /> Nombre: $nombre<br /> Apellido: $apellido<br />Email: $email<br /> Telefono: $telefono";
$asunto = "Consulta desde la Web Mujeressinlimites";

//Cabeceras del correo para que no llegue a spam
$header = "MIME-Version: 1.0 \r\n";
$header.= "Content-type: text/html; charset=utf-8 \r\n";

/*función para enviar mail*/
mail($email_to, $asunto, utf8_decode($contenido), $header);

//echo "<script>alert('Mensaje enviado con éxito');document.location='$regresar';</script>";
//echo '<h4>¡Mail enviado exitosamente!</h4>';
header('Location: ' . 'form-success-sumate.html');

