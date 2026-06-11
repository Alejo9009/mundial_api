<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if(isset($_GET['grupo'])) {
            $grupo = $conn->real_escape_string($_GET['grupo']);
            $sql = "SELECT g.*, p.nombre, p.escudo_url FROM grupos g JOIN participantes p ON g.seleccion_id = p.id WHERE g.grupo_nombre = '$grupo' ORDER BY g.puntos DESC";
            $result = $conn->query($sql);
            $data = [];
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode(['success' => true, 'data' => $data]);
        } else {
            $sql = "SELECT g.*, p.nombre, p.escudo_url FROM grupos g JOIN participantes p ON g.seleccion_id = p.id ORDER BY g.grupo_nombre, g.puntos DESC";
            $result = $conn->query($sql);
            $grupos = [];
            while($row = $result->fetch_assoc()) {
                $grupos[$row['grupo_nombre']][] = $row;
            }
            echo json_encode(['success' => true, 'data' => $grupos]);
        }
        break;
        
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $grupo_nombre = $conn->real_escape_string($input['grupo_nombre']);
        $seleccion_id = intval($input['seleccion_id']);
        $puntos = intval($input['puntos']);
        
        $sql = "INSERT INTO grupos (grupo_nombre, seleccion_id, puntos) VALUES ('$grupo_nombre', $seleccion_id, $puntos)";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Equipo agregado al grupo']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $puntos = intval($input['puntos']);
        
        $sql = "UPDATE grupos SET puntos = $puntos WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Puntos actualizados']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM grupos WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Equipo removido del grupo']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
}
?>