<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../config/database.php";

$sql = "SELECT id, nome, email FROM usuarios";

$stmt = $pdo->query($sql);

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($usuarios);