<?php
// Crie uma função chamada analisarNumero() que informe se ele é Par/Ímpar, Primo e Perfeito.

function analisarNumero(int $numero): array 
{
    // 1. Par ou Ímpar
    $paridade = ($numero % 2 === 0) ? "Par" : "Ímpar";

    // 2. É Primo? (Divisível apenas por 1 e ele mesmo)
    $ehPrimo = true;
    if ($numero <= 1) {
        $ehPrimo = false;
    } else {
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i === 0) {
                $ehPrimo = false;
                break;
            }
        }
    }

    // 3. É Perfeito? (Soma de seus divisores próprios é igual a ele)
    $somaDivisores = 0;
    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i === 0) {
            $somaDivisores += $i;
        }
    }
    $ehPerfeito = ($somaDivisores === $numero && $numero > 0);

    return [
        "numero" => $numero,
        "paridade" => $paridade,
        "primo" => $ehPrimo ? "Sim" : "Não",
        "perfeito" => $ehPerfeito ? "Sim" : "Não"
    ];
}

// Exemplo de uso (Número 28 é par, não é primo, mas é perfeito):
$analiseNum = analisarNumero(28);
echo "Análise do Número " . $analiseNum['numero'] . ":<br>";
echo "Paridade: " . $analiseNum['paridade'] . "<br>";
echo "Primo: " . $analiseNum['primo'] . "<br>";
echo "Perfeito: " . $analiseNum['perfeito'] . "<br>";