
<?php
if (isset($_POST['DNI']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
    $DNI= $_POST['DNI'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    
    //para acceder base de datos es http://10.10.17.150:8080/phpmyadmin/
    

    $mysqli = new mysqli("localhost", "root", "", "prueba");

    
    /* Sentencia preparada, etapa 1: preparación */
   $sentencia = $mysqli->prepare("INSERT INTO alumnos(DNI, nombre, apellido, correo, telefono) VALUES (?, ?, ?,?,?)");
    
    /* Sentencia preparada, etapa 2: vinculación y ejecución */
    $sentencia->bind_param("sssss", $DNI, $nombre, $apellido, $correo, $telefono);
    
   $sentencia->execute();
    
    /* se recomienda el cierre explícito */
    $sentencia->close();
    
    /* Sentencia no preparada */
     $resultado = $mysqli->query("SELECT * FROM alumnos");
     var_dump($resultado->fetch_all());
     header("location: select_test.php");
}else{
    echo("<br>Error en parametros<br>");
    
}
?>