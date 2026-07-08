<?php
// Crie uma função chamada estatisticasNumericas() que receba um vetor de números e retorne:
// Soma, Média, Maior valor, Menor valor, Mediana, Qtde pares e Qtde ímpares.

function estatisticasNumericas(array $numeros): array 
{
    if (empty($numeros)) return [];

    $soma = array_sum($numeros);
    $quantidade = count($numeros);
    $media = $soma / $quantidade;
    $maior = max($numeros);
    $menor = min($numeros);

    // Cálculo da Mediana
    $copiaNumeros = $numeros;
    sort($copiaNumeros);
    $meio = floor($quantidade / 2);
    
    if ($quantidade % 2 !== 0) {
        $mediana = $copiaNumeros[$meio];
    } else {
        $mediana = ($copiaNumeros[$meio - 1] + $copiaNumeros[$meio]) / 2;
    }

    // Contagem de Pares e Ímpares
    $pares = 0;
    $impares = 0;
    foreach ($numeros as $num) {
        if ($num % 2 === 0) {
            $pares++;
        } else {
            $impares++;
        }
    }

    return [
        "soma" => $soma,
        "media" => round($media, 2),
        "maior" => $maior,
        "menor" => $menor,
        "mediana" => $mediana,
        "pares" => $pares,
        "impares" => $impares
    ];
}

// Exemplo de uso:
$dadosEstatísticos = [10, 5, 8, 3, 22, 14, 7];
$estatisticas = estatisticasNumericas($dadosEstatísticos);

echo "Mediana: " . $estatisticas['mediana'] . " | Pares: " . $estatisticas['pares'] . "<br>";