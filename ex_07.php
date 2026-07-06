<?php
// Crie uma função chamada calcularDesconto() que aplique faixas de desconto baseadas no valor.

function calcularDesconto(float $valorCompra): array 
{
    $porcentagemDesconto = 0;

    if ($valorCompra > 1000) {
        $porcentagemDesconto = 0.30; // 30%
    } elseif ($valorCompra > 500) {
        $porcentagemDesconto = 0.20; // 20%
    } elseif ($valorCompra > 100) {
        $porcentagemDesconto = 0.10; // 10%
    }

    $valorDesconto = $valorCompra * $porcentagemDesconto;
    $valorFinal = $valorCompra - $valorDesconto;

    return [
        "original" => $valorCompra,
        "desconto_aplicado" => $valorDesconto,
        "final" => $valorFinal,
        "porcentagem" => ($porcentagemDesconto * 100) . "%"
    ];
}

// Exemplo de uso:
$resultadoDesconto = calcularDesconto(650.00);
echo "Valor original: R$ " . number_format($resultadoDesconto["original"], 2, ',', '.') . "<br>";
echo "Desconto (" . $resultadoDesconto["porcentagem"] . "): R$ " . number_format($resultadoDesconto["desconto_aplicado"], 2, ',', '.') . "<br>";
echo "Valor Final: R$ " . number_format($resultadoDesconto["final"], 2, ',', '.') . "<br>";