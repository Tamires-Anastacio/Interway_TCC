
<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "database.php";

$metodo = $_SERVER["REQUEST_METHOD"];

// GET: listar ou consultar usuários
if ($metodo === "GET") {

    if (isset($_GET["id"])) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $_GET["id"]]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            http_response_code(404);
            echo json_encode(["erro" => "Usuário não encontrado"]);
            exit;
        }

        echo json_encode($usuario, JSON_UNESCAPED_UNICODE);
    } else {
        $sql = "SELECT * FROM usuarios";
        $stmt = $pdo->query($sql);

        echo json_encode(
            $stmt->fetchAll(PDO::FETCH_ASSOC),
            JSON_UNESCAPED_UNICODE
        );
    }

    exit;
}

// Recebe os dados enviados em JSON
$dados = json_decode(file_get_contents("php://input"), true);

// POST: cadastrar usuário
if ($metodo === "POST") {

    if (
        !is_array($dados) ||
        empty($dados["nome"]) ||
        empty($dados["email"])
    ) {
        http_response_code(400);
        echo json_encode([
            "erro" => "Informe nome e email"
        ]);
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

    exit;
}

// PUT: editar usuário
if ($metodo === "PUT") {

    if (
        !isset($_GET["id"]) ||
        !is_array($dados) ||
        empty($dados["nome"]) ||
        empty($dados["email"])
    ) {
        http_response_code(400);
        echo json_encode([
            "erro" => "Informe o id, o nome e o email"
        ]);
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

    if ($stmt->rowCount() === 0) {
        $consulta = $pdo->prepare(
            "SELECT id FROM usuarios WHERE id = :id"
        );
        $consulta->execute(["id" => $_GET["id"]]);

        if (!$consulta->fetch()) {
            http_response_code(404);
            echo json_encode([
                "erro" => "Usuário não encontrado"
            ]);
            exit;
        }
    }

    echo json_encode([
        "mensagem" => "Usuário atualizado com sucesso"
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

// DELETE: excluir usuário
if ($metodo === "DELETE") {

    if (!isset($_GET["id"])) {
        http_response_code(400);
        echo json_encode([
            "erro" => "Informe o id do usuário"
        ]);
        exit;
    }

    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $_GET["id"]]);

    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode([
            "erro" => "Usuário não encontrado"
        ]);
        exit;
    }

    echo json_encode([
        "mensagem" => "Usuário excluído com sucesso"
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

// Método não permitido
header("Allow: GET, POST, PUT, DELETE");
http_response_code(405);

echo json_encode([
    "erro" => "Método não permitido"
], JSON_UNESCAPED_UNICODE);
