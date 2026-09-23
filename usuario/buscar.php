<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../config/database.php";

if (!isset($_GET["id"])) {
    http_response_code(400);

    echo json_encode([
        "erro" => "ID do usuário não informado"
    ]);

    exit;
}

$id = $_GET["id"];

$sql = "SELECT id, nome, email
        FROM usuarios
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":id" => $id
]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    http_response_code(404);

    echo json_encode([
        "erro" => "Usuário não encontrado"
    ]);

    exit;
}

echo json_encode($usuario);
