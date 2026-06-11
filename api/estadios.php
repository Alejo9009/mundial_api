<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        $sql = "SELECT * FROM estadios ORDER BY nombre";
        $result = $conn->query($sql);
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(['success' => true, 'data' => $data]);
        break;
        
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $nombre = $conn->real_escape_string($input['nombre']);
        $ciudad = $conn->real_escape_string($input['ciudad']);
        $capacidad = intval($input['capacidad']);
        
        $sql = "INSERT INTO estadios (nombre, ciudad, capacidad) VALUES ('$nombre', '$ciudad', $capacidad)";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Estadio agregado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM estadios WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Estadio eliminado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
}
?>