<?php
require_once '../config/database.php';

$tabla = isset($_GET['tabla']) ? $_GET['tabla'] : 'participantes';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

if(!$id) {
    header('Location: index.php');
    exit;
}

// Definir campos según la tabla
$campos = [];
$titulo = "";

switch($tabla) {
    case 'participantes':
        $titulo = "Editar Participante";
        $campos = [
            ['name' => 'nombre', 'label' => 'Nombre del equipo', 'type' => 'text'],
            ['name' => 'confederacion', 'label' => 'Confederación', 'type' => 'text'],
            ['name' => 'escudo_url', 'label' => 'URL del escudo', 'type' => 'url']
        ];
        break;
        
    case 'convocados':
        $titulo = "Editar Jugador Convocado";
        $campos = [
            ['name' => 'nombre', 'label' => 'Nombre del jugador', 'type' => 'text'],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes'],
            ['name' => 'posicion', 'label' => 'Posición', 'type' => 'text'],
            ['name' => 'equipo_juega', 'label' => 'Equipo donde juega', 'type' => 'text'],
            ['name' => 'escudo_url', 'label' => 'URL del escudo/foto', 'type' => 'url']
        ];
        break;
        
    case 'campeones':
        $titulo = "Editar Campeón del Mundo";
        $campos = [
            ['name' => 'anio', 'label' => 'Año', 'type' => 'number'],
            ['name' => 'seleccion_id', 'label' => 'Selección Campeona', 'type' => 'select', 'table' => 'participantes'],
            ['name' => 'escudo_url', 'label' => 'URL del escudo', 'type' => 'url']
        ];
        break;
        
    case 'goleadores':
        $titulo = "Editar Máximo Goleador";
        $campos = [
            ['name' => 'jugador_nombre', 'label' => 'Nombre del jugador', 'type' => 'text'],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes'],
            ['name' => 'goles', 'label' => 'Cantidad de goles', 'type' => 'number'],
            ['name' => 'anio', 'label' => 'Año', 'type' => 'number'],
            ['name' => 'escudo_url', 'label' => 'URL del escudo/foto', 'type' => 'url']
        ];
        break;
        
    case 'asistentes':
        $titulo = "Editar Máximo Asistente";
        $campos = [
            ['name' => 'jugador_nombre', 'label' => 'Nombre del jugador', 'type' => 'text'],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes'],
            ['name' => 'asistencias', 'label' => 'Cantidad de asistencias', 'type' => 'number'],
            ['name' => 'anio', 'label' => 'Año', 'type' => 'number'],
            ['name' => 'escudo_url', 'label' => 'URL del escudo/foto', 'type' => 'url']
        ];
        break;
        
    case 'partidos':
        $titulo = "Editar Partido";
        $campos = [
            ['name' => 'equipo_local_id', 'label' => 'Equipo Local', 'type' => 'select', 'table' => 'participantes'],
            ['name' => 'equipo_visitante_id', 'label' => 'Equipo Visitante', 'type' => 'select', 'table' => 'participantes'],
            ['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date'],
            ['name' => 'hora', 'label' => 'Hora', 'type' => 'time'],
            ['name' => 'estadio_id', 'label' => 'Estadio', 'type' => 'select', 'table' => 'estadios'],
            ['name' => 'fase', 'label' => 'Fase del torneo', 'type' => 'text']
        ];
        break;
        
    case 'estadios':
        $titulo = "Editar Estadio";
        $campos = [
            ['name' => 'nombre', 'label' => 'Nombre del estadio', 'type' => 'text'],
            ['name' => 'ciudad', 'label' => 'Ciudad', 'type' => 'text'],
            ['name' => 'capacidad', 'label' => 'Capacidad', 'type' => 'number']
        ];
        break;
        
    case 'grupos':
        $titulo = "Editar Grupo";
        $campos = [
            ['name' => 'grupo_nombre', 'label' => 'Nombre del Grupo', 'type' => 'text'],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes'],
            ['name' => 'puntos', 'label' => 'Puntos', 'type' => 'number']
        ];
        break;
}

// Obtener datos actuales
$sql = "SELECT * FROM $tabla WHERE id = $id";
$result = $conn->query($sql);
$registro = $result->fetch_assoc();

if(!$registro) {
    header('Location: index.php');
    exit;
}

// Procesar actualización
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sets = [];
    foreach($campos as $campo) {
        $valor = $_POST[$campo['name']];
        if($campo['type'] == 'text' || $campo['type'] == 'url' || $campo['type'] == 'date' || $campo['type'] == 'time') {
            $sets[] = "{$campo['name']} = '" . $conn->real_escape_string($valor) . "'";
        } else {
            $sets[] = "{$campo['name']} = " . ($valor ? $valor : 'NULL');
        }
    }
    
    $sql = "UPDATE $tabla SET " . implode(', ', $sets) . " WHERE id = $id";
    
    if($conn->query($sql)) {
        echo "<script>alert('✅ Registro actualizado correctamente'); window.location.href='index.php';</script>";
    } else {
        $error = "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar - <?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f4f4; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; margin-bottom: 20px; border-bottom: 2px solid #ffc107; padding-bottom: 10px; }
        .form-group { margin-bottom: 20px; }
        label { font-weight: bold; margin-bottom: 5px; display: block; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .btn { padding: 10px 20px; margin-right: 10px; }
        .error { color: red; padding: 10px; background: #fee; border-radius: 5px; margin-bottom: 20px; }
        .current-image { margin-top: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h2>✏️ <?php echo $titulo; ?></h2>
    
    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
    
    <form method="POST">
        <?php foreach($campos as $campo): ?>
        <div class="form-group">
            <label><?php echo $campo['label']; ?></label>
            
            <?php if($campo['type'] == 'select'): ?>
                <select name="<?php echo $campo['name']; ?>">
                    <option value="">Seleccione...</option>
                    <?php
                    $sql = "SELECT id, nombre FROM {$campo['table']} ORDER BY nombre";
                    $resultSelect = $conn->query($sql);
                    while($row = $resultSelect->fetch_assoc()):
                    ?>
                    <option value="<?php echo $row['id']; ?>" <?php echo ($registro[$campo['name']] == $row['id']) ? 'selected' : ''; ?>>
                        <?php echo $row['nombre']; ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            <?php else: ?>
                <input type="<?php echo $campo['type']; ?>" 
                       name="<?php echo $campo['name']; ?>" 
                       value="<?php echo htmlspecialchars($registro[$campo['name']]); ?>">
            <?php endif; ?>
            
            <?php if($campo['name'] == 'escudo_url' && $registro['escudo_url']): ?>
                <div class="current-image">
                    <img src="<?php echo $registro['escudo_url']; ?>" width="50" onerror="this.style.display='none'">
                </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-warning">💾 Actualizar Registro</button>
            <a href="index.php" class="btn btn-secondary">🔙 Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>