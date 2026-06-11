<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        if(isset($_GET['fecha'])) {
            $fecha = $conn->real_escape_string($_GET['fecha']);
            $sql = "SELECT p.*, 
                    local.nombre as local_nombre, local.escudo_url as local_escudo,
                    visitante.nombre as visitante_nombre, visitante.escudo_url as visitante_escudo,
                    e.nombre as estadio_nombre, e.ciudad, e.capacidad
                    FROM partidos p 
                    JOIN participantes local ON p.equipo_local_id = local.id
                    JOIN participantes visitante ON p.equipo_visitante_id = visitante.id
                    JOIN estadios e ON p.estadio_id = e.id
                    WHERE p.fecha = '$fecha'
                    ORDER BY p.hora";
        } else {
            $sql = "SELECT p.*, 
                    local.nombre as local_nombre, local.escudo_url as local_escudo,
                    visitante.nombre as visitante_nombre, visitante.escudo_url as visitante_escudo,
                    e.nombre as estadio_nombre, e.ciudad, e.capacidad
                    FROM partidos p 
                    JOIN participantes local ON p.equipo_local_id = local.id
                    JOIN participantes visitante ON p.equipo_visitante_id = visitante.id
                    JOIN estadios e ON p.estadio_id = e.id
                    ORDER BY p.fecha, p.hora";
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
        $equipo_local_id = intval($input['equipo_local_id']);
        $equipo_visitante_id = intval($input['equipo_visitante_id']);
        $fecha = $conn->real_escape_string($input['fecha']);
        $hora = $conn->real_escape_string($input['hora']);
        $estadio_id = intval($input['estadio_id']);
        $fase = $conn->real_escape_string($input['fase']);
        
        $sql = "INSERT INTO partidos (equipo_local_id, equipo_visitante_id, fecha, hora, estadio_id, fase) 
                VALUES ($equipo_local_id, $equipo_visitante_id, '$fecha', '$hora', $estadio_id, '$fase')";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Partido programado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;
        
    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $fecha = $conn->real_escape_string($input['fecha']);
        $hora = $conn->real_escape_string($input['hora']);
        
        $sql = "UPDATE partidos SET fecha='$fecha', hora='$hora' WHERE id=$id";
        if($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Fecha/hora actualizada']);
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