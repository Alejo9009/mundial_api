<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        $sql = "SELECT p.*, 
                local.nombre as equipo_local_nombre, local.escudo_url as local_escudo,
                visitante.nombre as equipo_visitante_nombre, visitante.escudo_url as visitante_escudo,
                e.nombre as estadio_nombre, e.ciudad, e.capacidad
                FROM partidos p
                JOIN participantes local ON p.equipo_local_id = local.id
                JOIN participantes visitante ON p.equipo_visitante_id = visitante.id
                JOIN estadios e ON p.estadio_id = e.id
                ORDER BY p.fecha ASC, p.hora ASC";
        $result = $conn->query($sql);
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(['success' => true, 'data' => $data]);
        break;
        
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO partidos (equipo_local_id, equipo_visitante_id, fecha, hora, estadio_id, fase) 
                VALUES ({$input['equipo_local_id']}, {$input['equipo_visitante_id']}, '{$input['fecha']}', '{$input['hora']}', {$input['estadio_id']}, '{$input['fase']}')";
        
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Partido agregado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM partidos WHERE id = $id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Partido eliminado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
}
?>