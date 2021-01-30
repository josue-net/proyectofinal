<?php 

$conexion=mysqli_connect('localhost','root','12345678','logtest',3360);

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
    <?php include "scripts.php"; ?>
</head>
<body>
<?php include "index2.php"; ?>
<section id="container">
<h1>Lista de usuarios</h1>
<a href="registro_usuario.php" class="btn_new">Crear usuario</a>
		
<form action="buscar_usuario.php" method="get" class="form_search">
<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
<input type="submit" value="Buscar" class="btn_search">
</form>
<br>
<br>

	<table >
		<tr>
			<th>id</th>
			<th>nombre</th>
			<th>apellido</th>
			<th>email</th>
			<th>telefono</th>	
		</tr>

		<?php 
		$sql="SELECT id,first_name,last_name,email,phone from users";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<th><?php echo $mostrar['id'] ?></th>
			<th><?php echo $mostrar['first_name'] ?></th>
			<th><?php echo $mostrar['last_name'] ?></th>
			<th><?php echo $mostrar['email'] ?></th>
			<th><?php echo $mostrar['phone'] ?></th>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>