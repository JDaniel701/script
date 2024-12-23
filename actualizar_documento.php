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
    $estado = $_POST['estado'];

    $sql = "UPDATE documentos SET estado = '$estado' WHERE codigo_qr = '$codigo_qr'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Documento actualizado"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

$conn->close();
?>
