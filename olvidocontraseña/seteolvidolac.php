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
    <title>Bienvenido</title>
	<link rel="stylesheet" href="css/logi.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
    <a href="index.php"><h1>Bienvenido</h1></a>
	<div class="container">
		<h2>Ingresa tu Dirección de Correo Electrónico para Restablecer tu Contraseña</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="cuentausuario.php" method="post">
				<input type="email" name="email" placeholder="Correo" required="">
				<div class="send-button">
					<input type="submit" name="forgotSubmit" value="Continuar">
				</div>
			</form>
		</div>
	</div>
</body>
</html>