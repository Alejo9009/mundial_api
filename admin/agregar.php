<?php
// Conectar a la base de datos
require_once '../config/database.php';

// Obtener la tabla desde la URL
$tabla = isset($_GET['tabla']) ? $_GET['tabla'] : 'participantes';

// Definir campos según la tabla
$campos = [];
$titulo = "";

switch($tabla) {
    case 'participantes':
        $titulo = "Agregar Participante";
        $campos = [
            ['name' => 'nombre', 'label' => 'Nombre del equipo', 'type' => 'text', 'required' => true],
            ['name' => 'confederacion', 'label' => 'Confederación', 'type' => 'text', 'required' => false],
            ['name' => 'escudo_url', 'label' => 'URL del escudo', 'type' => 'url', 'required' => false]
        ];
        break;
        
    case 'convocados':
        $titulo = "Agregar Jugador Convocado";
        $campos = [
            ['name' => 'nombre', 'label' => 'Nombre del jugador', 'type' => 'text', 'required' => true],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes', 'required' => true],
            ['name' => 'posicion', 'label' => 'Posición', 'type' => 'text', 'required' => false],
            ['name' => 'equipo_juega', 'label' => 'equipo_juega', 'type' => 'text', 'required' => false],
            ['name' => 'escudo_url', 'label' => 'URL del escudo/foto', 'type' => 'url', 'required' => false]
        ];
        break;
        
    case 'campeones':
        $titulo = "Agregar Campeón del Mundo";
        $campos = [
            ['name' => 'anio', 'label' => 'Año', 'type' => 'number', 'required' => true],
            ['name' => 'seleccion_id', 'label' => 'Selección Campeona', 'type' => 'select', 'table' => 'participantes', 'required' => true],
            ['name' => 'escudo_url', 'label' => 'URL del escudo', 'type' => 'url', 'required' => false]
        ];
        break;
        
    case 'goleadores':
        $titulo = "Agregar Máximo Goleador";
        $campos = [
            ['name' => 'jugador_nombre', 'label' => 'Nombre del jugador', 'type' => 'text', 'required' => true],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes', 'required' => true],
            ['name' => 'goles', 'label' => 'Cantidad de goles', 'type' => 'number', 'required' => true],
            ['name' => 'anio', 'label' => 'Año', 'type' => 'number', 'required' => true],
            ['name' => 'escudo_url', 'label' => 'URL del escudo/foto', 'type' => 'url', 'required' => false]
        ];
        break;
        
    case 'asistentes':
        $titulo = "Agregar Máximo Asistente";
        $campos = [
            ['name' => 'jugador_nombre', 'label' => 'Nombre del jugador', 'type' => 'text', 'required' => true],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes', 'required' => true],
            ['name' => 'asistencias', 'label' => 'Cantidad de asistencias', 'type' => 'number', 'required' => true],
            ['name' => 'anio', 'label' => 'Año', 'type' => 'number', 'required' => true],
            ['name' => 'escudo_url', 'label' => 'URL del escudo/foto', 'type' => 'url', 'required' => false]
        ];
        break;
        
    case 'partidos':
        $titulo = "Agregar Partido";
        $campos = [
            ['name' => 'equipo_local_id', 'label' => 'Equipo Local', 'type' => 'select', 'table' => 'participantes', 'required' => true],
            ['name' => 'equipo_visitante_id', 'label' => 'Equipo Visitante', 'type' => 'select', 'table' => 'participantes', 'required' => true],
            ['name' => 'fecha', 'label' => 'Fecha', 'type' => 'date', 'required' => true],
            ['name' => 'hora', 'label' => 'Hora', 'type' => 'time', 'required' => true],
            ['name' => 'estadio_id', 'label' => 'Estadio', 'type' => 'select', 'table' => 'estadios', 'required' => true],
            ['name' => 'fase', 'label' => 'Fase del torneo', 'type' => 'text', 'required' => false]
        ];
        break;
        
    case 'estadios':
        $titulo = "Agregar Estadio";
        $campos = [
            ['name' => 'nombre', 'label' => 'Nombre del estadio', 'type' => 'text', 'required' => true],
            ['name' => 'ciudad', 'label' => 'Ciudad', 'type' => 'text', 'required' => true],
            ['name' => 'capacidad', 'label' => 'Capacidad', 'type' => 'number', 'required' => true]
        ];
        break;
        
    case 'grupos':
        $titulo = "Agregar Grupo";
        $campos = [
            ['name' => 'grupo_nombre', 'label' => 'Nombre del Grupo (A, B, C...)', 'type' => 'text', 'required' => true],
            ['name' => 'seleccion_id', 'label' => 'Selección', 'type' => 'select', 'table' => 'participantes', 'required' => true],
            ['name' => 'puntos', 'label' => 'Puntos', 'type' => 'number', 'required' => false]
        ];
        break;
}

// Procesar el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $values = [];
    foreach($campos as $campo) {
        $valor = $_POST[$campo['name']];
        // Si es texto, agregar comillas
        if($campo['type'] == 'text' || $campo['type'] == 'url' || $campo['type'] == 'date' || $campo['type'] == 'time') {
            $values[] = "'" . $conn->real_escape_string($valor) . "'";
        } else {
            $values[] = $valor ? $valor : 'NULL';
        }
    }
    
    $nombres = implode(', ', array_column($campos, 'name'));
    $valores = implode(', ', $values);
    
    $sql = "INSERT INTO $tabla ($nombres) VALUES ($valores)";
    
    if($conn->query($sql)) {
        $mensaje = "✅ Registro agregado correctamente";
        echo "<script>alert('$mensaje'); window.location.href='index.php';</script>";
    } else {
        $error = "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar - <?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f4f4; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; margin-bottom: 20px; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .form-group { margin-bottom: 20px; }
        label { font-weight: bold; margin-bottom: 5px; display: block; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .btn { padding: 10px 20px; margin-right: 10px; }
        .error { color: red; padding: 10px; background: #fee; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>➕ <?php echo $titulo; ?></h2>
    
    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
    
    <form method="POST">
        <?php foreach($campos as $campo): ?>
        <div class="form-group">
            <label><?php echo $campo['label']; ?> <?php echo $campo['required'] ? '*' : ''; ?></label>
            
            <?php if($campo['type'] == 'select'): ?>
                <select name="<?php echo $campo['name']; ?>" <?php echo $campo['required'] ? 'required' : ''; ?>>
                    <option value="">Seleccione...</option>
                    <?php
                    $sql = "SELECT id, nombre FROM {$campo['table']} ORDER BY nombre";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()):
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                    <?php endwhile; ?>
                </select>
            <?php else: ?>
                <input type="<?php echo $campo['type']; ?>" 
                       name="<?php echo $campo['name']; ?>" 
                       <?php echo $campo['required'] ? 'required' : ''; ?>>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-success">💾 Guardar Registro</button>
            <a href="index.php" class="btn btn-secondary">🔙 Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>