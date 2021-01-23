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
   <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1, maximun-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/estilo.css">
</head>  
<body>
<div class="caja" id="jo">
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
        <h4>usuario: <?php echo $userData['first_name']; ?></h2>
        <a href="cuentausuario.php?logoutSubmit=1" class="menu">SALIR</a>
        <?php } ?>
	</div>
    <header>
    <input type="checkbox" id="btn-menu">
    <label for="btn-menu"><img src="menu.png" alt="">
    </label>
                <nav class="menu">
                <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Servicios</a></li>
                <li><a href="">Productos</a></li>
                <li><a href="">Clientes</a></li>
                <li><a href="">Contacto</a></li>
                </ul>
                </nav>
    </header>
</body>
</html>