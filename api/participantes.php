<?php
require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id     = (int) $_GET['id'];
            $sql    = "SELECT * FROM participantes WHERE id = $id";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                echo json_encode(['success' => true, 'data' => $result->fetch_assoc()]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No encontrado']);
            }
        } else {
            $sql    = "SELECT * FROM participantes ORDER BY nombre";
            $result = $conn->query($sql);
            $data   = [];
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            echo json_encode(['success' => true, 'data' => $data]);
        }
        break;

    case 'POST':
        $input        = json_decode(file_get_contents('php://input'), true);
        $nombre       = $conn->real_escape_string($input['nombre']       ?? '');
        $confederacion = $conn->real_escape_string($input['confederacion'] ?? '');
        $escudo_url   = $conn->real_escape_string($input['escudo_url']   ?? '');

        $sql = "INSERT INTO participantes (nombre, confederacion, escudo_url)
                VALUES ('$nombre', '$confederacion', '$escudo_url')";

        if ($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Participante agregado', 'id' => $conn->insert_id]);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;

    case 'PUT':
        $input         = json_decode(file_get_contents('php://input'), true);
        $id            = (int) ($input['id'] ?? 0);
        $nombre        = $conn->real_escape_string($input['nombre']        ?? '');
        $confederacion = $conn->real_escape_string($input['confederacion'] ?? '');
        $escudo_url    = $conn->real_escape_string($input['escudo_url']    ?? '');

        $sql = "UPDATE participantes
                SET nombre='$nombre', confederacion='$confederacion', escudo_url='$escudo_url'
                WHERE id=$id";

        if ($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Participante actualizado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;

    case 'DELETE':
        $id  = (int) ($_GET['id'] ?? 0);
        $sql = "DELETE FROM participantes WHERE id = $id";

        if ($conn->query($sql)) {
            echo json_encode(['success' => true, 'message' => 'Participante eliminado']);
        } else {
            echo json_encode(['success' => false, 'message' => $conn->error]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Método no permitido']);
        break;
}
?>