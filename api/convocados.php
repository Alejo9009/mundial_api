<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT c.*, p.nombre as seleccion_nombre FROM convocados c JOIN participantes p ON c.seleccion_id = p.id WHERE c.id = $id";
            $result = $conn->query($sql);
            echo json_encode(['success' => true, 'data' => $result->fetch_assoc()]);
        } else {
            $sql = "SELECT c.*, p.nombre as seleccion_nombre FROM convocados c JOIN participantes p ON c.seleccion_id = p.id ORDER BY p.nombre, c.equipo_juega";
            $result = $conn->query($sql);
            $data = [];
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode(['success' => true, 'data' => $data]);
        }
        break;
        
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $nombre = $conn->real_escape_string($input['nombre']);
        $seleccion_id = intval($input['seleccion_id']);
        $posicion = $conn->real_escape_string($input['posicion']);
        $equipo_juega = $conn->real_escape_string($input['equipo_juega']);
        $escudo_url = $conn->real_escape_string($input['escudo_url']);
        
        $sql = "INSERT INTO convocados (nombre, seleccion_id, posicion, equipo_juega, escudo_url) VALUES ('$nombre', $seleccion_id, '$posicion', '$equipo_juega', '$escudo_url')";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Jugador agregado correctamente']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $nombre = $conn->real_escape_string($input['nombre']);
        $seleccion_id = intval($input['seleccion_id']);
        $posicion = $conn->real_escape_string($input['posicion']);
        $equipo_juega = $conn->real_escape_string($input['equipo_juega']);
        $escudo_url = $conn->real_escape_string($input['escudo_url']);
        
        $sql = "UPDATE convocados SET nombre='$nombre', seleccion_id=$seleccion_id, posicion='$posicion', equipo_juega='$equipo_juega', escudo_url='$escudo_url' WHERE id=$id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Jugador actualizado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM convocados WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Jugador eliminado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
}
?>