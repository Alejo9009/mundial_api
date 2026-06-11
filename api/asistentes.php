<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if(isset($_GET['anio'])) {
            $anio = intval($_GET['anio']);
            $sql = "SELECT a.*, p.nombre as seleccion_nombre FROM asistentes a JOIN participantes p ON a.seleccion_id = p.id WHERE a.anio = $anio ORDER BY a.asistencias DESC";
        } else {
            $sql = "SELECT a.*, p.nombre as seleccion_nombre FROM asistentes a JOIN participantes p ON a.seleccion_id = p.id ORDER BY a.asistencias DESC, a.anio DESC";
        }
        $result = $conn->query($sql);
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(['success' => true, 'data' => $data]);
        break;
        
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $jugador_nombre = $conn->real_escape_string($input['jugador_nombre']);
        $seleccion_id = intval($input['seleccion_id']);
        $asistencias = intval($input['asistencias']);
        $anio = intval($input['anio']);
        $escudo_url = $conn->real_escape_string($input['escudo_url']);
        
        $sql = "INSERT INTO asistentes (jugador_nombre, seleccion_id, asistencias, anio, escudo_url) VALUES ('$jugador_nombre', $seleccion_id, $asistencias, $anio, '$escudo_url')";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Asistente registrado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $asistencias = intval($input['asistencias']);
        
        $sql = "UPDATE asistentes SET asistencias = $asistencias WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Asistencias actualizadas']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM asistentes WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Asistente eliminado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
}
?>