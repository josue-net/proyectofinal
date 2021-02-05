<?php 
	include "conexion.php";

	if(!empty($_POST))
	{
		$idcliente = $_POST['idcliente'];

		$query_delete = mysqli_query($conection,"DELETE FROM cliente WHERE idcliente =$idcliente ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_cliente.php");
		}else{
			echo "Error al eliminar";
		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_cliente.php');
		mysqli_close($conection);
	}
	$idcliente = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM cliente
									WHERE idcliente= $idcliente ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_cliente.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$idcliente  = $data['idcliente'];
			$nit  = $data['nit'];
			$nombre  = $data['nombre'];
			$telefono = $data['telefono'];
			$direccion   = $data['direccion'];


		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "scripts.php"; ?>
	<title>Eliminar Usuario</title>
</head>
<body>
	<?php include "index2.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de eliminar el siguiente registro?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>nit: <span><?php echo $nit; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="idcliente" value="<?php echo $idcliente; ?>">
				<a href="lista_cliente.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>
	</section>
</body>
</html>