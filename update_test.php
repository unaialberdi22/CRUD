<?php
if (isset($_POST['DNI']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
    $DNI= $_POST['DNI'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    
    $mysqli = new mysqli("localhost", "root", "", "prueba");
    
    /* Sentencia preparada, etapa 1: preparación */
    if (!($sentencia = $mysqli->prepare("UPDATE test SET nombre=?, apellido=?, correo=?, telefono=? WHERE DNI=?"))) {
    }
    
    /* Sentencia preparada, etapa 2: vinculación y ejecución */
    if (!$sentencia->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $DNI)) {
    }
    
    if (!$sentencia->execute()) {
    }
    
    /* se recomienda el cierre explícito */
    $sentencia->close();
    
    /* Sentencia no preparada */
    //     $resultado = $mysqli->query("SELECT * FROM test");
    //     var_dump($resultado->fetch_all());
}else{
    echo("<br>Error en parametros<br>");
    
}

header("location: select_test.php");

?>