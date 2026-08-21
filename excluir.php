<?php

require_once "conexao.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: listar.php");
    exit;
}

$id = (int) $_GET["id"];

$sql = "DELETE FROM filmes WHERE id = ?";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: listar.php?sucesso=excluido");
    exit;
}

echo "Erro ao excluir o filme: " . htmlspecialchars($stmt->error);

$stmt->close();
$conexao->close();
