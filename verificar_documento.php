
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "buidxj45oivgjsnnmtsf-mysql.services.clever-cloud.com";
$username = "u1w3fkyi4x17dn4b";
$password = "RJI6GkAunskWMGlUSNgJ";
$dbname = "buidxj45oivgjsnnmtsf";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Conexión fallida"]));
}

// Verificar si el código QR fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_qr = $_POST['codigo_qr'];

    // Consultar en la base de datos
    $sql = "SELECT * FROM documentos WHERE codigo_qr = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $codigo_qr);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $documento = $result->fetch_assoc();
        echo json_encode(["status" => "success", "data" => $documento]);
    } else {
        echo json_encode(["status" => "error", "message" => "Código no encontrado"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}

$conn->close();
?>
