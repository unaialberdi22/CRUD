<?php
$mysqli = new mysqli("localhost", "root", "", "prueba");

/* Sentencia no preparada */
$resultado = $mysqli->query("SELECT * FROM alumnos");

// mostrar resultado
while ($row = $resultado->fetch_assoc()) {
    $DNI=$row['DNI'];
    echo($row['DNI'] . " - " . $row['nombre']. " - " . $row['apellido']. " - " . $row['correo']. " - " . $row['telefono'] . " " . "<button onclick=\"location.href='delete_test.php?DNI=$DNI'\">delete</button> " . " " . "<button onclick=\"location.href='formulario_update.php?DNI=$DNI'\">update</button> ");
    
    //printf("%s - %s\n", $row["DNI"], $row["nombre"], $row["apellido"], $row["correo"], $row["telefono"]);
    echo "<br>";
    
}

/* se recomienda el cierre explícito */
$mysqli->close();

?>
<br>
<button><a href="formulario.php">Anadir alumno</a></button>