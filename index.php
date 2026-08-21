<?php
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineGibi - Início</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="cabecalho">
        <div class="logo">
            🎬 CineGibi
        </div>

        <nav>
            <a href="index.php">Início</a>
            <a href="listar.php">Filmes</a>
            <a href="cadastro.php">Cadastrar filme</a>
        </nav>
    </header>

    <main class="inicio">

        <section class="hero">

            <div class="hero-texto">

                <span class="etiqueta">🎞️ SISTEMA DE CINEMA</span>

                <h1>
                    Bem-vindo ao<br>
                    <strong>CineGibi!</strong>
                </h1>

                <p>
                    Gerencie os filmes do cinema de forma
                    simples, rápida e organizada.
                </p>

                <div class="botoes">
                    <a href="listar.php" class="botao principal">
                        Ver filmes
                    </a>

                    <a href="cadastro.php" class="botao secundario">
                        Cadastrar filme
                    </a>
                </div>

            </div>

            <div class="hero-card">

                <div class="icone-filme">
                    🎬
                </div>

                <h2>Seu cinema organizado</h2>

                <p>
                    Cadastre, consulte, edite e exclua
                    filmes do seu catálogo.
                </p>

            </div>

        </section>

        <section class="recursos">

            <h2>O que você pode fazer?</h2>

            <div class="cards">

                <div class="card">
                    <span>🎬</span>
                    <h3>Cadastrar</h3>
                    <p>
                        Adicione novos filmes ao catálogo.
                    </p>
                </div>

                <div class="card">
                    <span>📋</span>
                    <h3>Consultar</h3>
                    <p>
                        Visualize todos os filmes cadastrados.
                    </p>
                </div>

                <div class="card">
                    <span>✏️</span>
                    <h3>Editar</h3>
                    <p>
                        Atualize as informações dos filmes.
                    </p>
                </div>

                <div class="card">
                    <span>🗑️</span>
                    <h3>Excluir</h3>
                    <p>
                        Remova filmes que não fazem mais parte do catálogo.
                    </p>
                </div>

            </div>

        </section>

    </main>

  

</body>
</html>
