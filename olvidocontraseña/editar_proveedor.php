<?php 
	include "conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono'])  || empty($_POST['direccion']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$codproveedor = $_POST['id'];
			$proveedor = $_POST['proveedor'];
			$contacto  = $_POST['contacto'];
			$telefono  = $_POST['telefono'];
			$direccion  =$_POST['direccion'];



			$query = mysqli_query($conection,"SELECT * FROM proveedor
													   WHERE (proveedor = '$proveedor' AND codproveedor != $codproveedor)");

			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El numero de nit  ya existe.</p>';
			}else{

				if(empty($_POST['contacto']))
				{

					$sql_update = mysqli_query($conection,"UPDATE proveedor
															SET proveedor = '$proveedor', contacto='$contacto',telefono='$telefono',direccion='$direccion'
															WHERE codproveedor= $codproveedor ");
				}else{
					$sql_update = mysqli_query($conection,"UPDATE proveedor
															SET proveedor = '$proveedor', contacto='$contacto',telefono='$telefono',direccion='$direccion'
															WHERE codproveedor= $codproveedor ");

				}

				if($sql_update){
					$alert='<p class="msg_save">proveedor actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el proveedor.</p>';
				}

			}


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
			$codproveedor  = $data['codproveedor'];
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
	<title>Actualizar cliente</title>
</head>
<body>
	<?php include "index2.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Actualizar cliente</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $codproveedor;?>">
				<label for="proveedor">Proveedor</label>
				<input type="text" name="proveedor" id="proveedor" placeholder="Marca del proveedor" value="<?php echo $proveedor;?>">
				<label for="contacto">Contacto</label>
				<input type="text" name="contacto" id="contacto" placeholder="Nombre Completo" value="<?php echo $contacto;?>">
				<label for="telefono">telefono</label>
				<input type="number" name="telefono" id="telefono" placeholder="Telefono"value="<?php echo $telefono;?>">
				<label for="direccion">direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion"value="<?php echo $direccion;?>">
				

				<input type="submit" value="Actualizar proveedor" class="btn_save">

			</form>


		</div>


	</section>

</body>
</html>