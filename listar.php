<?php

require_once "conexao.php";

$sql = "SELECT * FROM filmes ORDER BY id DESC";

$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro ao buscar os filmes: " . $conexao->error);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CineGibi - Filmes</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header class="cabecalho">

    <div class="logo">
        🎬 CineGibi
    </div>

    <nav>

        <a href="index.php">
            Início
        </a>

        <a href="listar.php">
            Filmes
        </a>

        <a href="cadastro.php">
            Cadastrar filme
        </a>

    </nav>

</header>


<main class="pagina-lista">

    <div class="topo-lista">

        <div>

            <span class="etiqueta">
                🎞️ CINEGIBI
            </span>

            <h1>
                Filmes cadastrados
            </h1>

            <p>
                Consulte todos os filmes registrados no sistema.
            </p>

        </div>


        <a href="cadastro.php" class="botao principal">
            + Novo filme
        </a>

    </div>


    <?php if (isset($_GET["sucesso"])): ?>

        <?php if ($_GET["sucesso"] === "cadastrado"): ?>

            <div class="mensagem sucesso">
                Filme cadastrado com sucesso!
            </div>

        <?php elseif ($_GET["sucesso"] === "atualizado"): ?>

            <div class="mensagem sucesso">
                Filme atualizado com sucesso!
            </div>

        <?php elseif ($_GET["sucesso"] === "excluido"): ?>

            <div class="mensagem sucesso">
                Filme excluído com sucesso!
            </div>

        <?php endif; ?>

    <?php endif; ?>


    <?php if ($resultado->num_rows > 0): ?>

        <div class="tabela-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Filme</th>

                        <th>Gênero</th>

                        <th>Duração</th>

                        <th>Classificação</th>

                        <th>Diretor</th>

                        <th>Ano</th>

                        <th>Status</th>

                        <th>Ações</th>

                    </tr>

                </thead>


                <tbody>

                    <?php while ($filme = $resultado->fetch_assoc()): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($filme["id"]) ?>
                            </td>

                            <td>
                                <strong>
                                    <?= htmlspecialchars($filme["titulo"]) ?>
                                </strong>
                            </td>

                            <td>
                                <?= htmlspecialchars($filme["genero"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($filme["duracao"]) ?> min
                            </td>

                            <td>
                                <?= htmlspecialchars($filme["classificacao"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($filme["diretor"]) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($filme["ano_lancamento"]) ?>
                            </td>

                            <td>

                                <?php

                                $classeStatus = "";

                                if ($filme["status"] === "Em cartaz") {

                                    $classeStatus = "status-cartaz";

                                } elseif ($filme["status"] === "Em breve") {

                                    $classeStatus = "status-breve";

                                } else {

                                    $classeStatus = "status-fora";

                                }

                                ?>

                                <span class="status <?= $classeStatus ?>">

                                    <?= htmlspecialchars($filme["status"]) ?>

                                </span>

                            </td>

                            <td>

                                <div class="acoes">

                                    <a
                                        href="editar.php?id=<?= $filme["id"] ?>"
                                        class="acao editar"
                                    >
                                        Editar
                                    </a>


                                    <a
                                        href="excluir.php?id=<?= $filme["id"] ?>"
                                        class="acao excluir"
                                        onclick="return confirm('Tem certeza que deseja excluir este filme?');"
                                    >
                                        Excluir
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    <?php else: ?>

        <div class="vazio">

            <div class="icone-vazio">
                🎬
            </div>

            <h2>
                Nenhum filme cadastrado
            </h2>

            <p>
                Cadastre o primeiro filme do CineGibi.
            </p>

            <a href="cadastro.php" class="botao principal">
                Cadastrar primeiro filme
            </a>

        </div>

    <?php endif; ?>

</main>



</body>

</html>

<?php

$conexao->close();

?>
