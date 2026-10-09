
<?php
header("Content-Type: application/json; charset=UTF-8");
require_once "database.php";

$dados = json_decode(file_get_contents("php://input"), true);

if (
    !is_array($dados) ||
    empty($dados["nome"]) ||
    empty($dados["email"])
) {
    http_response_code(400);
    echo json_encode(["erro" => "Informe nome e email"]);
    exit;
}

$sql = "INSERT INTO usuarios (nome, email)
        VALUES (:nome, :email)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "nome" => $dados["nome"],
    "email" => $dados["email"]
]);

http_response_code(201);
echo json_encode([
    "mensagem" => "Usuário cadastrado com sucesso",
    "id" => $pdo->lastInsertId()
], JSON_UNESCAPED_UNICODE);
