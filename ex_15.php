<?php
// Biblioteca com 10 funções utilitárias

function calcularIMC(float $peso, float $altura): float {
    return $peso / ($altura ** 2);
}

function validarEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function bibliotecaGerarSenha(int $tamanho = 8): string {
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $tamanho);
}

function contarVogais(string $texto): int {
    preg_match_all(/[aeiouAEIOU]/, $texto, $matches);
    return count($matches[0]);
}

function inverterStringSimples(string $texto): string {
    return strrev($texto);
}

function calcularIdade(string $dataNascimento): int {
    $nascimento = new DateTime($dataNascimento);
    $hoje = new DateTime();
    return $hoje->diff($nascimento)->y;
}

function converterMoeda(float $valor, float $taxaCambio): float {
    return $valor * $taxaCambio;
}

function formatarTelefone(string $numeros): string {
    $limpo = preg_replace('/\D/', '', $numeros);
    return "(" . substr($limpo, 0, 2) . ") " . substr($limpo, 2, 5) . "-" . substr($limpo, 7);
}

function gerarSaudacao(): string {
    $hora = (int)date('G');
    if ($hora >= 5 && $hora < 12) return "Bom dia!";
    if ($hora >= 12 && $hora < 18) return "Boa tarde!";
    return "Boa noite!";
}

function validarSenhaForte(string $senha): bool {
    // Mínimo 8 caracteres, pelo menos uma maiúscula, uma minúscula e um número
    return strlen($senha) >= 8 && preg_match(/[A-Z]/, $senha) && preg_match(/[a-z]/, $senha) && preg_match(/[0-9]/, $senha);
}