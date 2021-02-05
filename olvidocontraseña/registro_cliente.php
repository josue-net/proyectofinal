<?php 
	
	include "conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			
			$nit =$_POST['nit'];
			$nombre = $_POST['nombre'];
			$telefono  = $_POST['telefono'];
			$direccion   = $_POST['direccion'];

			$result =0;
			if(is_numeric($nit))
			{
				$query = mysqli_query($conection,"SELECT * FROM cliente WHERE nit = '$nit' ");
			    $result=mysqli_fetch_array($query);
			}
			if($result>0){
				$alert='<p class="msg_save">El numero de NIT ya existe.</p>';
			}else{
				$query_insert=mysqli_query($conection,"insert into cliente(nit,nombre,telefono,direccion)
														values('$nit','$nombre','$telefono','$direccion')");
				
				if($query_insert){
				$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}else{
				$alert='<p class="msg_error">Error al crear el usuario.</p>';
					}										

			}	
		}
		mysqli_close($conection);
	}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "scripts.php"; ?>
	<title>Registro Cliente</title>
</head>
<body>
<?php include "index2.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Registro Cliente</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nit">DNI</label>
				<input type="number" name="nit" id="nit" placeholder="Numero de DNI">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
				<label for="telefono">telefono</label>
				<input type="number" name="telefono" id="telefono" placeholder="Telefono">
				<label for="direccion">direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion">
				

				<input type="submit" value="Guardar cliente" class="btn_save">

			</form>


		</div>


	</section>
	
</body>
</html>