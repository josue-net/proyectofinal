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
    <title>Menu</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script type="text/javascript" src="js/main.js"></script>
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
        <a href="cuentausuario.php?logoutSubmit=1"><img class="close" src="IMG/salir.png" alt="Salir del sistema" title="Salir"></a>
        <?php } ?>
	</div>
    <header>
    <div class="menu-bar">
        </div>
        <nav>
            <ul>
                <li><a href="index2.php"><span class="icon-home"></span>INICIO</a></li>
                <li class="submenu">
                    <a href="#"><span class="icon-library"></span>Usuarios<span class="despegable icon-circle-down"></span></a>
                    <ul class="hijos">
                        <li><a href="registro_usuario.php">Nuevo Usuario<span class="icon"></span></a></li>
                        <li><a href="lista_usuario.php">Lista de Usuarios<span class="icon"></span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="icon-library"></span>Clientes<span class="despegable icon-circle-down"></span></a>
                    <ul class="hijos">
                        <li><a href="registro_cliente.php">Nuevo Cliente<span class="icon"></span></a></li>
                        <li><a href="lista_cliente.php">Lista de Cliente<span class="icon"></span></a></li>
                        </ul>
                <li class="submenu">
                    <a href="#"><span class="icon-library"></span>Proveedores<span class="despegable icon-circle-down"></span></a>
                    <ul class="hijos">
                        <li><a href="#">Nuevo Proveedor<span class="icon"></span></a></li>
                        <li><a href="#">Lista de Proveedores<span class="icon"></span></a></li>
                    </ul>
               <li class="submenu">
                    <a href="#"><span class="icon-library"></span>Productos<span class="despegable icon-circle-down"></span></a>
                    <ul class="hijos">
                        <li><a href="#">Nuevo Producto<span class="icon"></span></a></li>
                        <li><a href="#">Lista de Productos<span class="icon"></span></a></li>
                    </ul>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
</body>
</html>