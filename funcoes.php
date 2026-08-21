<?php

function limparTexto($texto)
{
    return trim($texto);
}

function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarFilme($titulo, $genero, $duracao, $classificacao, $diretor, $ano, $status)
{
    $erros = [];

    if (empty($titulo)) {
        $erros[] = "O título do filme é obrigatório.";
    }

    if (empty($genero)) {
        $erros[] = "O gênero é obrigatório.";
    }

    if (!is_numeric($duracao) || $duracao <= 0) {
        $erros[] = "A duração deve ser um número maior que zero.";
    }

    if (empty($classificacao)) {
        $erros[] = "A classificação é obrigatória.";
    }

    if (empty($diretor)) {
        $erros[] = "O diretor é obrigatório.";
    }

    if (!is_numeric($ano) || $ano < 1900 || $ano > date("Y")) {
        $erros[] = "O ano de lançamento é inválido.";
    }

    $statusPermitidos = [
        "Em cartaz",
        "Em breve",
        "Fora de cartaz"
    ];

    if (!in_array($status, $statusPermitidos)) {
        $erros[] = "O status selecionado é inválido.";
    }

    return $erros;
}
