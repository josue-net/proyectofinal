<?php
if(isset($_POST["submit"])){
    $descripcion=$_POST["descripcion"];
    $proveedor=$_POST["proveedor"];
    $precio=$_POST["precio"];
    $existencia=$_POST["existencia"];
    $insertar = getimagesize($_FILES["foto"]["tmp_name"]);
    if($insertar !== false){
        $foto = $_FILES['foto']['tmp_name'];
        $img = addslashes(file_get_contents($foto));

        
        $host     = 'localhost';
        $usuario = 'root';
        $password = '12345678';
        $basedatos = 'logtest';
        $puerto = '3360';
        
        $con = new mysqli($host, $usuario, $password, $basedatos, $puerto);

        if($con->connect_error){
            die("Connection failed: " . $con->connect_error);
        }
 
        $producto = $con->query("INSERT into producto (descripcion, proveedor, precio, existencia, foto) 
        VALUES ('$descripcion', '$proveedor', '$precio', '$existencia','$img')");
        if($producto){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
    
}
echo "<center><h2>REGISTRA TU EXPERIENCIA VIVIDA EN LA CIUDAD DE LOS INCAS</h2></center>";
echo <<<_END
<html lang="en">
<head>
<title>REGISTRA TU EXPERIENCIA</title>
<link href="css/estiloinsertarss.css" rel="stylesheet" type="text/css"/> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form action="insertar.php" method="post" enctype="multipart/form-data">
        descripcion:
        <input type="text" name="descripcion"/>
        proveedor:
        <input type="text" name="proveedor"/>
        precio:
        <input type="text" name="precio"/>
        cantidad:
        <input type="text" name="existencia"/>
        Select image to upload:
        <input type="file" name="foto"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
</body>
</html>
_END;
?>