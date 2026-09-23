<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../config/database.php";

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

$sql = "INSERT INTO usuarios (nome, email, senha)
        VALUES (:nome, :email, :senha)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":nome" => $dados["nome"],
    ":email" => $dados["email"],
    ":senha" => $dados["senha"]
]);

echo json_encode([
    "mensagem" => "Usuário criado com sucesso",
    "id" => $pdo->lastInsertId()
]);