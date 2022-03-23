
<?php 
include 'config.php';

$db = new PDO($db_dsn, $db_user, $db_pass, $db_options);

/*recibo los datos del formulario*/
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

/*guardo los datos en la db*/
$sql = 'insert into sumate (nombre,apellido, email, telefono) values (?, ?, ?, ?)'; //nombres de las columnas de la db
$sql_params = [$nombre, $apellido, $email, $telefono];

$st = $db->prepare($sql);
$st->execute($sql_params);


//echo "<script>alert('Mensaje enviado con éxito');document.location='$regresar';</script>";
//echo '<h4>¡Mail enviado exitosamente!</h4>';
header('Location: ' . 'form-success-sumate.html');

?>