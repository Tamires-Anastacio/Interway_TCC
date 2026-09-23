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

$dados = json_decode(file_get_contents("php://input"), true);

if (
    !isset($dados["nome"]) ||
    !isset($dados["email"]) ||
    !isset($dados["senha"])
) {
    http_response_code(400);

    echo json_encode([
        "erro" => "Nome, email e senha são obrigatórios"
    ]);

    exit;
}

$sql = "UPDATE usuarios
        SET nome = :nome,
            email = :email,
            senha = :senha
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":nome" => $dados["nome"],
    ":email" => $dados["email"],
    ":senha" => $dados["senha"],
    ":id" => $id
]);

echo json_encode([
    "mensagem" => "Usuário atualizado com sucesso"
]);