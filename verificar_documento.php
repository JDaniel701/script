
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "buidxj45oivgjsnnmtsf-mysql.services.clever-cloud.com";
$username = "u1w3fkyi4x17dn4b";
$password = "RJI6GkAunskWMGlUSNgJ";
$dbname = "buidxj45oivgjsnnmtsf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo_qr = $_POST['codigo_qr'];

    $sql = "SELECT * FROM documentos WHERE codigo_qr = '$codigo_qr'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["status" => "success", "data" => $row]);
    } else {
        echo json_encode(["status" => "error", "message" => "Documento no encontrado"]);
    }
}

$conn->close();
?>
