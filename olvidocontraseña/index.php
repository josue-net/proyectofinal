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
    <h1>Bienvenido</h1>
	<div class="container">
        <?php
			if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
				include 'user.php';
				$user = new User();
				$conditions['where'] = array(
					'id' => $sessData['userID'],
				);
				$conditions['return_type'] = 'single';
				$userData = $user->getRows($conditions);
		?>
        <h2>Bienvenid@ <?php echo $userData['first_name']; ?>!</h2>
        <a href="cuentausuario.php?logoutSubmit=1" class="logout">Cerrar Sesión</a>
		<div class="regisFrm">
			<p><b>Nombre: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
            <p><b>Correo: </b><?php echo $userData['email']; ?></p>
            <p><b>Teléfono: </b><?php echo $userData['phone']; ?></p>
		</div>
        <?php }else{ ?>
		<h2 align="center">Ingresa en tu Cuenta</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="cuentausuario.php" method="post">
				<input type="email" name="email" placeholder="Correo Electrónico" required="">
				<input type="password" name="password" placeholder="Contraseña" required="">
				<div class="send-button">
					<input type="submit" name="loginSubmit" value="Ingresar">
				</div>
				<br><br><a href="seteolvidolac.php">¿Olvidaste tu Contraseña?</a>
			</form>
            <p>¿No tienes cuenta aún? <a href="registration.php">Regístrate acá</a></p>
		</div>
        <?php } ?>
	</div>
</body>
</html>