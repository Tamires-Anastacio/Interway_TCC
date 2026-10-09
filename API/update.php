
<?php
header("Content-Type: application/json; charset=UTF-8");
require_once "database.php";

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo json_encode(["erro" => "Informe o ID do usuário"]);
    exit;
}

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

$sql = "UPDATE usuarios
        SET nome = :nome, email = :email
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "nome" => $dados["nome"],
    "email" => $dados["email"],
    "id" => $_GET["id"]
]);

$consulta = $pdo->prepare(
    "SELECT id FROM usuarios WHERE id = :id"
);
$consulta->execute(["id" => $_GET["id"]]);

if (!$consulta->fetch()) {
    http_response_code(404);
    echo json_encode(["erro" => "Usuário não encontrado"]);
    exit;
}

echo json_encode([
    "mensagem" => "Usuário atualizado com sucesso"
], JSON_UNESCAPED_UNICODE);
