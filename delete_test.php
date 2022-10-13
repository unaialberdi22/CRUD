
<?php
if (isset($_GET['DNI'])) {
    $DNI= $_GET['DNI'];

    $mysqli = new mysqli("localhost", "root", "", "prueba");

    
    /* Sentencia preparada, etapa 1: preparación */
    if (!($sentencia = $mysqli->prepare("DELETE FROM alumnos WHERE DNI=?"))) {
        echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    
    /* Sentencia preparada, etapa 2: vinculación y ejecución */
    if (!$sentencia->bind_param("i", $DNI)) {
        echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
    }
    
    if (!$sentencia->execute()) {
        echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
    }
    
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