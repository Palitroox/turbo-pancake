<?php
$conexion = new mysqli("localhost", "root", "", "empresa");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];

$sql = "INSERT INTO jornada_laboral (nombre, fecha, hora_entrada, hora_salida) 
        VALUES (?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $nombre, $fecha, $entrada, $salida);

if ($stmt->execute()) {
    echo "Jornada registrada correctamente.";
} else {
    echo "Error al registrar la jornada: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
