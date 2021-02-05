<?php 
	include "conexion.php";	
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "scripts.php"; ?>
	<title>Lista de Productos</title>
</head>
<body>
	<?php include "index2.php"; ?>
	<section id="container">
		
		<h1>Lista de Productos</h1>
		<a href="registro_producto.php" class="btn_new">Agregar nuevo Producto</a>
		
		<form action="buscar_producto.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>Codigo</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Proveedor</th>
                <th>Foto</th>
				<th>Acciones</th>
			</tr>
		<?php 
	
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM productos");
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

			$query = mysqli_query($conection,"SELECT * FROM productos  ORDER BY codproducto DESC LIMIT $desde,$por_pagina 
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
                    if($data["foto"] != 'img_producto.png'){
                        $foto ='IMG/uploads/'.$data["foto"];
                    }else{
                        $foto='IMG/'.$data["foto"];
                    }
					
			?>
				<tr>
					<td><?php echo $data["codproducto"]; ?></td>
                    <td><?php echo $data["descripcion"]; ?></td>
                    <td><?php echo $data["precio"]; ?></td>
                    <td><?php echo $data["cantidad"]; ?></td>
					<td><?php echo $data["proveedor"]; ?></td>
                    <td class="img_producto"><img src="<?php echo $foto; ?>" alt="<?php echo $data["descripcion"]; ?>"></td>
					<td>
						<a class="link_edit" href="editar_productos.php?id=<?php echo $data["codproducto"]; ?>">Editar</a>
						<a class="link_delete" href="eliminar_confirmar_productos.php?id=<?php echo $data["codproducto"]; ?>">Eliminar</a>
					</td>
				</tr>
			
		<?php 
				}

			}
		 ?>


		</table>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
			<?php } ?>
			</ul>
		</div>


	</section>
</body>
</html>