
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

//echo "<script>alert('Mensaje enviado con éxito');document.location='$regresar';</script>";
//echo '<h4>¡Mail enviado exitosamente!</h4>';
header('Location: ' . 'form-success.html');

