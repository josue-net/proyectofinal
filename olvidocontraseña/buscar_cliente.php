<?php 

	include "conexion.php";	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "scripts.php"; ?>
	<title>Lista de clientes</title>
</head>
<body>
	<?php include "index2.php"; ?>
	<section id="container">
		<?php 

			$busqueda = strtolower($_REQUEST['busqueda']);
			if(empty($busqueda))
			{
				header("location: lista_cliente.php");
				mysqli_close($conection);
			}


		 ?>
		
		<h1>Lista de clientes</h1>
		<a href="registro_cliente.php" class="btn_new">Agregar Cliente</a>
		
		<form action="buscar_cliente.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>ID</th>
				<th>DNI</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Direccion</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$rol = '';
			if($busqueda == 'administrador')
			{
				$rol = " OR rol LIKE '%1%' ";

			}else if($busqueda == 'supervisor'){

				$rol = " OR rol LIKE '%2%' ";

			}else if($busqueda == 'vendedor'){

				$rol = " OR rol LIKE '%3%' ";
			}


			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM cliente
																WHERE ( idcliente LIKE '%$busqueda%' OR 
																		nit LIKE '%$busqueda%' OR 
																		nombre LIKE '%$busqueda%' OR 
																		telefono LIKE '%$busqueda%')");

			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 5;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT * FROM cliente	WHERE 
										( idcliente LIKE '%$busqueda%' OR 
											nit LIKE '%$busqueda%' OR 
											nombre LIKE '%$busqueda%' OR 
											telefono LIKE '%$busqueda%' OR 
											direccion  LIKE  '%$busqueda%' )");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["idcliente"]; ?></td>
					<td><?php echo $data["nit"]; ?></td>
					<td><?php echo $data["nombre"]; ?></td>
					<td><?php echo $data["telefono"]; ?></td>
					<td><?php echo $data['direccion'] ?></td>
					<td>
						<a class="link_edit" href="editar_cliente.php?id=<?php echo $data["idcliente"]; ?>">Editar</a>

					<?php if($data["idcliente"] != 1){ ?>
						|
						<a class="link_delete" href="eliminar_confirmar_cliente.php?id=<?php echo $data["idcliente"]; ?>">Eliminar</a>
					<?php } ?>
						
					</td>
				</tr>
			
		<?php 
				}

			}
		 ?>


		</table>
<?php 
	
	if($total_registro != 0)
	{
 ?>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> ">>|</a></li>
			<?php } ?>
			</ul>
		</div>
<?php } ?>


	</section>
</body>
</html>