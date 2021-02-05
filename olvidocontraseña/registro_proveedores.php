<?php 
	
	include "conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['contacto']) || empty($_POST['telefono']) || empty($_POST['direccion']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			
			$proveedor =$_POST['proveedor'];
			$contacto = $_POST['contacto'];
			$telefono  = $_POST['telefono'];
			$direccion   = $_POST['direccion'];

			$result =0;
			if(is_numeric($proveedor))
			{
				$query = mysqli_query($conection,"SELECT * FROM proveedor WHERE proveedor = '$proveedor' ");
			    $result=mysqli_fetch_array($query);
			}
			if($result>0){
				$alert='<p class="msg_save">El proveedor ya existe.</p>';
			}else{
				$query_insert=mysqli_query($conection,"insert into proveedor(proveedor,contacto,telefono,direccion)
														values('$proveedor','$contacto','$telefono','$direccion')");
				
				if($query_insert){
				$alert='<p class="msg_save">proveedor creado correctamente.</p>';
				}else{
				$alert='<p class="msg_error">Error al crear el proveedor.</p>';
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
	<title>Registro proveedor</title>
</head>
<body>
<?php include "index2.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Registro Proveedor</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="proveedor">Proveedor</label>
				<input type="text" name="proveedor" id="proveedor" placeholder="Marca del proveedor">
				<label for="contacto">Contacto</label>
				<input type="text" name="contacto" id="contacto" placeholder="Nombre Completo">
				<label for="telefono">telefono</label>
				<input type="number" name="telefono" id="telefono" placeholder="Telefono">
				<label for="direccion">direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion">
				

				<input type="submit" value="Guardar proveedor" class="btn_save">

			</form>


		</div>


	</section>
	
</body>
</html>