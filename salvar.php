<?php

require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

$titulo = limparTexto($_POST["titulo"] ?? "");
$genero = limparTexto($_POST["genero"] ?? "");
$duracao = $_POST["duracao"] ?? "";
$classificacao = limparTexto($_POST["classificacao"] ?? "");
$diretor = limparTexto($_POST["diretor"] ?? "");
$ano_lancamento = $_POST["ano_lancamento"] ?? "";
$status = limparTexto($_POST["status"] ?? "");

$erros = validarFilme(
    $titulo,
    $genero,
    $duracao,
    $classificacao,
    $diretor,
    $ano_lancamento,
    $status
);

if (!empty($erros)) {
    echo "<h2>Foram encontrados alguns erros:</h2>";

    echo "<ul>";

    foreach ($erros as $erro) {
        echo "<li>" . htmlspecialchars($erro) . "</li>";
    }

    echo "</ul>";

    echo '<a href="cadastro.php">Voltar para o cadastro</a>';

    exit;
}

$sql = "INSERT INTO filmes 
        (titulo, genero, duracao, classificacao, diretor, ano_lancamento, status)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt->bind_param(
    "ssissis",
    $titulo,
    $genero,
    $duracao,
    $classificacao,
    $diretor,
    $ano_lancamento,
    $status
);

if ($stmt->execute()) {

    header("Location: listar.php?sucesso=cadastrado");
    exit;

} else {

    echo "Erro ao cadastrar o filme: " . htmlspecialchars($stmt->error);

}

$stmt->close();
$conexao->close();
