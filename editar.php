<?php

require_once "conexao.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: listar.php");
    exit;
}

$id = (int) $_GET["id"];

$sql = "SELECT * FROM filmes WHERE id = ?";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    header("Location: listar.php");
    exit;
}

$filme = $resultado->fetch_assoc();

$stmt->close();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CineGibi - Editar Filme</title>

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


<main class="pagina">

    <div class="titulo-pagina">

        <span class="etiqueta">
            🎞️ CINEGIBI
        </span>

        <h1>
            Editar filme
        </h1>

        <p>
            Altere as informações do filme selecionado.
        </p>

    </div>


    <form action="atualizar.php" method="POST" class="formulario">

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($filme["id"]) ?>"
        >


        <div class="campo">

            <label for="titulo">
                Título do filme
            </label>

            <input
                type="text"
                id="titulo"
                name="titulo"
                value="<?= htmlspecialchars($filme["titulo"]) ?>"
                required
            >

        </div>


        <div class="campo">

            <label for="genero">
                Gênero
            </label>

            <select
                id="genero"
                name="genero"
                required
            >

                <option value="">
                    Selecione o gênero
                </option>

                <option value="Ação"
                    <?= $filme["genero"] === "Ação" ? "selected" : "" ?>>
                    Ação
                </option>

                <option value="Animação"
                    <?= $filme["genero"] === "Animação" ? "selected" : "" ?>>
                    Animação
                </option>

                <option value="Aventura"
                    <?= $filme["genero"] === "Aventura" ? "selected" : "" ?>>
                    Aventura
                </option>

                <option value="Comédia"
                    <?= $filme["genero"] === "Comédia" ? "selected" : "" ?>>
                    Comédia
                </option>

                <option value="Drama"
                    <?= $filme["genero"] === "Drama" ? "selected" : "" ?>>
                    Drama
                </option>

                <option value="Fantasia"
                    <?= $filme["genero"] === "Fantasia" ? "selected" : "" ?>>
                    Fantasia
                </option>

                <option value="Ficção científica"
                    <?= $filme["genero"] === "Ficção científica" ? "selected" : "" ?>>
                    Ficção científica
                </option>

                <option value="Romance"
                    <?= $filme["genero"] === "Romance" ? "selected" : "" ?>>
                    Romance
                </option>

                <option value="Terror"
                    <?= $filme["genero"] === "Terror" ? "selected" : "" ?>>
                    Terror
                </option>

            </select>

        </div>


        <div class="linha">

            <div class="campo">

                <label for="duracao">
                    Duração (minutos)
                </label>

                <input
                    type="number"
                    id="duracao"
                    name="duracao"
                    value="<?= htmlspecialchars($filme["duracao"]) ?>"
                    min="1"
                    required
                >

            </div>


            <div class="campo">

                <label for="classificacao">
                    Classificação
                </label>

                <select
                    id="classificacao"
                    name="classificacao"
                    required
                >

                    <option value="">
                        Selecione
                    </option>

                    <option value="Livre"
                        <?= $filme["classificacao"] === "Livre" ? "selected" : "" ?>>
                        Livre
                    </option>

                    <option value="10 anos"
                        <?= $filme["classificacao"] === "10 anos" ? "selected" : "" ?>>
                        10 anos
                    </option>

                    <option value="12 anos"
                        <?= $filme["classificacao"] === "12 anos" ? "selected" : "" ?>>
                        12 anos
                    </option>

                    <option value="14 anos"
                        <?= $filme["classificacao"] === "14 anos" ? "selected" : "" ?>>
                        14 anos
                    </option>

                    <option value="16 anos"
                        <?= $filme["classificacao"] === "16 anos" ? "selected" : "" ?>>
                        16 anos
                    </option>

                    <option value="18 anos"
                        <?= $filme["classificacao"] === "18 anos" ? "selected" : "" ?>>
                        18 anos
                    </option>

                </select>

            </div>

        </div>


        <div class="campo">

            <label for="diretor">
                Diretor
            </label>

            <input
                type="text"
                id="diretor"
                name="diretor"
                value="<?= htmlspecialchars($filme["diretor"]) ?>"
                required
            >

        </div>


        <div class="linha">

            <div class="campo">

                <label for="ano_lancamento">
                    Ano de lançamento
                </label>

                <input
                    type="number"
                    id="ano_lancamento"
                    name="ano_lancamento"
                    value="<?= htmlspecialchars($filme["ano_lancamento"]) ?>"
                    min="1900"
                    max="2026"
                    required
                >

            </div>


            <div class="campo">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    required
                >

                    <option value="">
                        Selecione
                    </option>

                    <option value="Em cartaz"
                        <?= $filme["status"] === "Em cartaz" ? "selected" : "" ?>>
                        Em cartaz
                    </option>

                    <option value="Em breve"
                        <?= $filme["status"] === "Em breve" ? "selected" : "" ?>>
                        Em breve
                    </option>

                    <option value="Fora de cartaz"
                        <?= $filme["status"] === "Fora de cartaz" ? "selected" : "" ?>>
                        Fora de cartaz
                    </option>

                </select>

            </div>

        </div>


        <div class="acoes-formulario">

            <a
                href="listar.php"
                class="botao voltar"
            >
                ← Voltar
            </a>


            <button
                type="submit"
                class="botao principal"
            >
                 Salvar alterações
            </button>

        </div>

    </form>

</main>




</body>

</html>
