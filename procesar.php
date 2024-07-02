<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Variables de conexión a la base de datos (debes reemplazar con tus propios datos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agenda";

    // Establecemos la conexión usando mysqli (PHP Data Objects)
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificamos la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparamos los datos para la inserción
    $tarea = $_POST['tarea'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_termino = $_POST['fecha_termino'];
    $estado = $_POST['estado'];

    // Preparamos la consulta SQL para la inserción de datos
    $sql = "INSERT INTO agenda_jersy (tarea, descripcion, fecha_inicio, fecha_termino, estado)
            VALUES ('$tarea', '$descripcion', '$fecha_inicio', '$fecha_termino', '$estado')";

    if ($conn->query($sql) === TRUE) {
        // Registro insertado correctamente, redireccionamos a index.php
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerramos la conexión
    $conn->close();
}
?>
