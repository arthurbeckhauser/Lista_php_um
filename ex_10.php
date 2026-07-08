<?php
// Crie uma função chamada calcularMedia() que receba um vetor de notas de um aluno.

function calcularMedia(array $notas): array 
{
    if (empty($notas)) {
        return ["erro" => "Nenhuma nota fornecida."];
    }

    $maiorNota = max($notas);
    $menorNota = min($notas);
    $media = array_sum($notas) / count($notas);

    // Regra da situação final
    if ($media >= 7.0) {
        $situacao = "Aprovado";
    } elseif ($media >= 5.0 && $media < 7.0) {
        $situacao = "Recuperação";
    } else {
        $situacao = "Reprovado";
    }

    return [
        "maior" => $maiorNota,
        "menor" => $menorNota,
        "media" => round($media, 2),
        "situacao" => $situacao
    ];
}

// Exemplo de uso:
$notasBoletim = [8.5, 6.0, 7.2, 5.8];
$boletim = calcularMedia($notasBoletim);

echo "Média do Aluno: " . $boletim['media'] . " - Situação: " . $boletim['situacao'] . "<br>";