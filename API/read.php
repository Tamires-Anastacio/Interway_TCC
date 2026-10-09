
<?php
header("Content-Type: application/json; charset=UTF-8");
require_once "database.php";

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
    $stmt = $pdo->query("SELECT * FROM usuarios");

    echo json_encode(
        $stmt->fetchAll(PDO::FETCH_ASSOC),
        JSON_UNESCAPED_UNICODE
    );
}
