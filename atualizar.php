<?php

require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: listar.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

$titulo = limparTexto($_POST["titulo"] ?? "");
$genero = limparTexto($_POST["genero"] ?? "");
$duracao = $_POST["duracao"] ?? "";
$classificacao = limparTexto($_POST["classificacao"] ?? "");
$diretor = limparTexto($_POST["diretor"] ?? "");
$ano_lancamento = $_POST["ano_lancamento"] ?? "";
$status = limparTexto($_POST["status"] ?? "");




if (!$id) {
    header("Location: listar.php");
    exit;
}



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

    echo '<a href="editar.php?id=' . $id . '">Voltar para edição</a>';

    exit;
}



$sql = "UPDATE filmes SET
            titulo = ?,
            genero = ?,
            duracao = ?,
            classificacao = ?,
            diretor = ?,
            ano_lancamento = ?,
            status = ?
        WHERE id = ?";


$stmt = $conexao->prepare($sql);


if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}




$stmt->bind_param(
    "ssissisi",
    $titulo,
    $genero,
    $duracao,
    $classificacao,
    $diretor,
    $ano_lancamento,
    $status,
    $id
);



if ($stmt->execute()) {

    header("Location: listar.php?sucesso=atualizado");
    exit;

} else {

    echo "Erro ao atualizar o filme: "
        . htmlspecialchars($stmt->error);
}


$stmt->close();

$conexao->close();
