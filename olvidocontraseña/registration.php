<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido usted se va registrar para acceder al sistema de inventario</title>
    <link rel="stylesheet" href="css/logi.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
    <h1>Bienvenido usted se va registrar para acceder al sistema de inventario</h1>
	<div class="container">
		<h2>Crear una Nueva Cuenta</h2>
		<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="cuentausuario.php" method="post">
				<input type="text" name="first_name" placeholder="Nombre" required="">
				<input type="text" name="last_name" placeholder="Apellido" required="">
				<input type="email" name="email" placeholder="Correo Electrónico" required="">
				<input type="text" name="phone" placeholder="Número Telefónico" required="">
				<input type="password" name="password" placeholder="Contraseña" required="">
				<input type="password" name="confirm_password" placeholder="Confirma tu Contraseña" required="">
				<div class="send-button">
					<input type="submit" name="signupSubmit" value="Crear Cuenta">
				</div>
			</form>
		</div>
	</div>
</body>
</html>