<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineGibi - Cadastrar Filme</title>

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

    <main class="pagina">

        <div class="titulo-pagina">
            <span class="etiqueta">🎞️ CINEGIBI</span>

            <h1>Cadastrar filme</h1>

            <p>
                Preencha as informações para adicionar um novo filme ao catálogo.
            </p>
        </div>

        <form action="salvar.php" method="POST" class="formulario">

            <div class="campo">
                <label for="titulo">Título do filme</label>

                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="Digite o título do filme"
                    required
                >
            </div>

            <div class="campo">
                <label for="genero">Gênero</label>

                <select id="genero" name="genero" required>

                    <option value="">Selecione o gênero</option>

                    <option value="Ação">Ação</option>
                    <option value="Animação">Animação</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Comédia">Comédia</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasia">Fantasia</option>
                    <option value="Ficção científica">Ficção científica</option>
                    <option value="Romance">Romance</option>
                    <option value="Terror">Terror</option>

                </select>
            </div>

            <div class="linha">

                <div class="campo">
                    <label for="duracao">Duração (minutos)</label>

                    <input
                        type="number"
                        id="duracao"
                        name="duracao"
                        placeholder="Ex.: 120"
                        min="1"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="classificacao">Classificação</label>

                    <select id="classificacao" name="classificacao" required>

                        <option value="">Selecione</option>
                        <option value="Livre">Livre</option>
                        <option value="10 anos">10 anos</option>
                        <option value="12 anos">12 anos</option>
                        <option value="14 anos">14 anos</option>
                        <option value="16 anos">16 anos</option>
                        <option value="18 anos">18 anos</option>

                    </select>
                </div>

            </div>

            <div class="campo">
                <label for="diretor">Diretor</label>

                <input
                    type="text"
                    id="diretor"
                    name="diretor"
                    placeholder="Digite o nome do diretor"
                    required
                >
            </div>

            <div class="linha">

                <div class="campo">
                    <label for="ano_lancamento">Ano de lançamento</label>

                    <input
                        type="number"
                        id="ano_lancamento"
                        name="ano_lancamento"
                        placeholder="Ex.: 2024"
                        min="1900"
                        max="2026"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="status">Status</label>

                    <select id="status" name="status" required>

                        <option value="">Selecione</option>
                        <option value="Em cartaz">Em cartaz</option>
                        <option value="Em breve">Em breve</option>
                        <option value="Fora de cartaz">Fora de cartaz</option>

                    </select>

                </div>

            </div>

            <div class="acoes-formulario">

                <a href="index.php" class="botao voltar">
                    ← Voltar
                </a>

                <button type="submit" class="botao principal">
                    🎬 Cadastrar filme
                </button>

            </div>

        </form>

    </main>

    

</body>

</html>
