<?php 
	include "conexion.php";

	if(!empty($_POST))
	{
		$codproveedor = $_POST['codproducto'];

		$query_delete = mysqli_query($conection,"DELETE FROM productos WHERE codproducto =$codproducto ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_productos.php");
		}else{
			echo "Error al eliminar";
		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_productos.php');
		mysqli_close($conection);
	}
	$codproducto = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM productos
									WHERE codproducto= $codproducto ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_productos.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$codproducto = $data['codproducto'];
			$proveedor  = $data['proveedor'];
			$producto  = $data['descripcion'];
			$precio = $data['precio'];
			$cantidad   = $data['cantidad'];
            $foto  = $data['foto'];


		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "scripts.php"; ?>
	<title>Eliminar Producto</title>
</head>
<body>
	<?php include "index2.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de eliminar el siguiente registro?</h2>
			<p>proveedor: <span><?php echo $proveedor; ?></span></p>
			<p>descripcion: <span><?php echo $producto; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="codproducto" value="<?php echo $codproducto; ?>">
				<a href="lista_productos.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>
	</section>
</body>
</html>