<?php
// Crie uma função chamada gerarSenha() que receba a quantidade de caracteres desejada 
// e retorne uma senha aleatória contendo maiúsculas, minúsculas, números e especiais.

function gerarSenha(int $tamanho = 12): string 
{
    if ($tamanho < 4) {
        $tamanho = 4; // Garante tamanho mínimo para conter um de cada tipo
    }

    $maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $minusculas = 'abcdefghijklmnopqrstuvwxyz';
    $numeros = '0123456789';
    $especiais = '!@#$%^&*()-_=+[{]};:,.<>?';

    // Garante que a senha possua pelo menos um caractere de cada grupo
    $senha = [
        $maiusculas[rand(0, strlen($maiusculas) - 1)],
        $minusculas[rand(0, strlen($minusculas) - 1)],
        $numeros[rand(0, strlen($numeros) - 1)],
        $especiais[rand(0, strlen($especiais) - 1)]
    ];

    // Preenche o restante do tamanho solicitado
    $todosCaracteres = $maiusculas . $minusculas . $numeros . $especiais;
    $totalCaracteres = strlen($todosCaracteres);

    for ($i = count($senha); $i < $tamanho; $i++) {
        $senha[] = $todosCaracteres[rand(0, $totalCaracteres - 1)];
    }

    // Embaralha o array gerado para não deixar os obrigatórios no início
    shuffle($senha);

    return implode('', $senha);
}

// Exemplo de uso:
echo "Senha temporária gerada: " . gerarSenha(16) . "<br>";