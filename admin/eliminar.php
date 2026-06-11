<?php
require_once '../config/database.php';

$tabla = isset($_GET['tabla']) ? $_GET['tabla'] : 'participantes';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

if(!$id) {
    header('Location: index.php');
    exit;
}

// Obtener el nombre del registro para mostrar
$sql = "SELECT * FROM $tabla WHERE id = $id";
$result = $conn->query($sql);
$registro = $result->fetch_assoc();

if(!$registro) {
    header('Location: index.php');
    exit;
}

// Determinar qué campo mostrar como nombre
$nombreCampo = 'nombre';
if($tabla == 'goleadores' || $tabla == 'asistentes') {
    $nombreCampo = 'jugador_nombre';
} elseif($tabla == 'partidos') {
    $nombreCampo = 'id';
}

$nombreRegistro = isset($registro[$nombreCampo]) ? $registro[$nombreCampo] : "ID: $id";

// Procesar eliminación
if(isset($_POST['confirmar'])) {
    $sql = "DELETE FROM $tabla WHERE id = $id";
    
    if($conn->query($sql)) {
        echo "<script>alert('✅ Registro eliminado correctamente'); window.location.href='index.php';</script>";
    } else {
        $error = "❌ Error al eliminar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: center; }
        h2 { color: #dc3545; margin-bottom: 20px; }
        .warning { background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .btn { padding: 10px 20px; margin: 10px; }
        .record-info { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0; }
    </style>
</head>
<body>
<div class="container">
    <h2>🗑️ Eliminar Registro</h2>
    
    <div class="warning">
        ⚠️ <strong>¡ADVERTENCIA!</strong> Esta acción no se puede deshacer.
    </div>
    
    <div class="record-info">
        <strong>Tabla:</strong> <?php echo ucfirst($tabla); ?><br>
        <strong>Registro a eliminar:</strong> <?php echo htmlspecialchars($nombreRegistro); ?>
    </div>
    
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    
    <form method="POST">
        <button type="submit" name="confirmar" class="btn btn-danger">✅ Sí, Eliminar</button>
        <a href="index.php" class="btn btn-secondary">❌ Cancelar</a>
    </form>
</div>
</body>
</html>