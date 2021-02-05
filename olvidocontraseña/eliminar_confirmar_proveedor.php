<?php 
	include "conexion.php";

	if(!empty($_POST))
	{
		$codproveedor = $_POST['codproveedor'];

		$query_delete = mysqli_query($conection,"DELETE FROM proveedor WHERE codproveedor =$codproveedor ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_proveedor.php");
		}else{
			echo "Error al eliminar";
		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_proveedor.php');
		mysqli_close($conection);
	}
	$codproveedor = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM proveedor
									WHERE codproveedor= $codproveedor ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_proveedor.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$codproveedor = $data['codproveedor'];
			$proveedor  = $data['proveedor'];
			$contacto  = $data['contacto'];
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
			<p>proveedor: <span><?php echo $proveedor; ?></span></p>
			<p>contacto: <span><?php echo $contacto; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="codproveedor" value="<?php echo $codproveedor; ?>">
				<a href="lista_proveedor.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>
	</section>
</body>
</html>