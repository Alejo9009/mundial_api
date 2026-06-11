<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if(isset($_GET['anio'])) {
            $anio = intval($_GET['anio']);
            $sql = "SELECT g.*, p.nombre as seleccion_nombre FROM goleadores g JOIN participantes p ON g.seleccion_id = p.id WHERE g.anio = $anio ORDER BY g.goles DESC";
        } else {
            $sql = "SELECT g.*, p.nombre as seleccion_nombre FROM goleadores g JOIN participantes p ON g.seleccion_id = p.id ORDER BY g.goles DESC, g.anio DESC";
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
        $goles = intval($input['goles']);
        $anio = intval($input['anio']);
        $escudo_url = $conn->real_escape_string($input['escudo_url']);
        
        $sql = "INSERT INTO goleadores (jugador_nombre, seleccion_id, goles, anio, escudo_url) VALUES ('$jugador_nombre', $seleccion_id, $goles, $anio, '$escudo_url')";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Goleador registrado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $goles = intval($input['goles']);
        
        $sql = "UPDATE goleadores SET goles = $goles WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Goles actualizados']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM goleadores WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Goleador eliminado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
}
?>