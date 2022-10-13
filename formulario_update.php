<?php
$DNI=$_GET['DNI'];
$mysqli = new mysqli("localhost", "root", "", "prueba");
$resultado = $mysqli->query("SELECT * FROM alumnos WHERE DNI=" .$DNI);

$usuario = $resultado->fetch_assoc();

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>

<body>
    <form method="post" action="update_test.php">
        <input type="text" name="DNI" placeholder="DNI" value="<?=$usuario['DNI']?>" readonly>
        <input type="text" name="nombre" placeholder="nombre"  value="<?=$usuario['nombre']?>">
        <input type="text" name="apellido" placeholder="apellido"  value="<?=$usuario['apellido']?>">
        <input type="email" name="correo" placeholder="correo"  value="<?=$usuario['correo']?>">
        <input type="text" name="telefono" placeholder="telefono"  value="<?=$usuario['telefono']?>">
        <input type="submit" value="Guardar">
    </form>
</body>

</html>