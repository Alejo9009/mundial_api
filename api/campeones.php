<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT c.*, p.nombre as seleccion_nombre FROM campeones c JOIN participantes p ON c.seleccion_id = p.id WHERE c.id = $id";
            $result = $conn->query($sql);
            echo json_encode(['success' => true, 'data' => $result->fetch_assoc()]);
        } else {
            $sql = "SELECT c.*, p.nombre as seleccion_nombre FROM campeones c JOIN participantes p ON c.seleccion_id = p.id ORDER BY c.anio DESC";
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
        $anio = intval($input['anio']);
        $seleccion_id = intval($input['seleccion_id']);
        $escudo_url = $conn->real_escape_string($input['escudo_url']);
        
        $sql = "INSERT INTO campeones (anio, seleccion_id, escudo_url) VALUES ($anio, $seleccion_id, '$escudo_url')";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Campeón registrado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $anio = intval($input['anio']);
        $seleccion_id = intval($input['seleccion_id']);
        $escudo_url = $conn->real_escape_string($input['escudo_url']);
        
        $sql = "UPDATE campeones SET anio=$anio, seleccion_id=$seleccion_id, escudo_url='$escudo_url' WHERE id=$id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Campeón actualizado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM campeones WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Campeón eliminado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
}
?>