<?php
// Variables de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda";

// Establecemos la conexión usando mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar la actualización si se envía el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit-id'])) {
    $id = $_POST['edit-id'];
    $tarea = $_POST['edit-tarea'];
    $descripcion = $_POST['edit-descripcion'];
    $fecha_inicio = $_POST['edit-fecha_inicio'];
    $fecha_termino = $_POST['edit-fecha_termino'];
    $estado = $_POST['edit-estado'];

    // Actualizamos los datos en la base de datos
    $sql_update = "UPDATE agenda_jersy SET tarea='$tarea', descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_termino='$fecha_termino', estado='$estado' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        // Éxito en la actualización
        echo "<script>alert('Tarea actualizada correctamente.'); window.location.href = 'index.php';</script>";
        exit;
    } else {
        echo "Error al actualizar la tarea: " . $conn->error;
    }
}

// Consulta SQL para seleccionar todos los registros de la tabla
$sql = "SELECT id, tarea, descripcion, fecha_inicio, fecha_termino, estado FROM agenda_jersy";
$result = $conn->query($sql);

// Cerramos la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Tareas</title>
  <!-- Incluimos Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        Lista de Tareas
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Término</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row["id"] . "</td>";
                      echo "<td>" . $row["tarea"] . "</td>";
                      echo "<td>" . $row["descripcion"] . "</td>";
                      echo "<td>" . $row["fecha_inicio"] . "</td>";
                      echo "<td>" . $row["fecha_termino"] . "</td>";
                      echo "<td>" . $row["estado"] . "</td>";
                      echo "<td>";
                      echo "<button type='button' class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#editarModal" . $row["id"] . "'>Editar</button>";
                      echo "</td>";
                      echo "</tr>";

                      // Modal de Edición para cada tarea
                      echo "<div class='modal fade' id='editarModal" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='editarModalLabel" . $row["id"] . "' aria-hidden='true'>";
                      echo "<div class='modal-dialog' role='document'>";
                      echo "<div class='modal-content'>";
                      echo "<div class='modal-header'>";
                      echo "<h5 class='modal-title' id='editarModalLabel" . $row["id"] . "'>Editar Tarea</h5>";
                      echo "<button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>";
                      echo "<span aria-hidden='true'>&times;</span>";
                      echo "</button>";
                      echo "</div>";
                      echo "<form method='post' action='index.php'>";
                      echo "<div class='modal-body'>";
                      echo "<input type='hidden' name='edit-id' value='" . $row["id"] . "'>";
                      echo "<div class='form-group'>";
                      echo "<label for='edit-tarea'>Tarea:</label>";
                      echo "<input type='text' class='form-control' id='edit-tarea' name='edit-tarea' value='" . $row["tarea"] . "' required>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='edit-descripcion'>Descripción:</label>";
                      echo "<textarea class='form-control' id='edit-descripcion' name='edit-descripcion' rows='3' required>" . $row["descripcion"] . "</textarea>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='edit-fecha_inicio'>Fecha de Inicio:</label>";
                      echo "<input type='date' class='form-control' id='edit-fecha_inicio' name='edit-fecha_inicio' value='" . $row["fecha_inicio"] . "' required>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='edit-fecha_termino'>Fecha de Término:</label>";
                      echo "<input type='date' class='form-control' id='edit-fecha_termino' name='edit-fecha_termino' value='" . $row["fecha_termino"] . "' required>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='edit-estado'>Estado:</label>";
                      echo "<select class='form-control' id='edit-estado' name='edit-estado' required>";
                      echo "<option value='Pendiente' " . ($row["estado"] == "Pendiente" ? "selected" : "") . ">Pendiente</option>";
                      echo "<option value='En proceso' " . ($row["estado"] == "En proceso" ? "selected" : "") . ">En proceso</option>";
                      echo "<option value='Terminado' " . ($row["estado"] == "Terminado" ? "selected" : "") . ">Terminado</option>";
                      echo "</select>";
                      echo "</div>";
                      echo "</div>";
                      echo "<div class='modal-footer'>";
                      echo "<button type='submit' class='btn btn-primary'>Guardar Cambios</button>";
                      echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>";
                      echo "</div>";
                      echo "</form>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                  }
              } else {
                  echo "<tr><td colspan='7'>No hay tareas registradas</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Incluimos Bootstrap JS y dependencias si es necesario -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
