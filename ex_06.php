<?php
// Crie uma função chamada converterTemperatura() que receba um valor, a escala
// de origem e a escala de destino (Celsius, Fahrenheit e Kelvin).

function converterTemperatura(float $valor, string $origem, string $destino): float|string 
{
    $origem = strtoupper($origem);
    $destino = strtoupper($destino);

    if ($origem === $destino) {
        return $valor;
    }

    // Primeiro passo: Converter qualquer origem para Celsius
    switch ($origem) {
        case 'C': $celsius = $valor; break;
        case 'F': $celsius = ($valor - 32) * 5 / 9; break;
        case 'K': $celsius = $valor - 273.15; break;
        default: return "Escala de origem inválida.";
    }

    // Segundo passo: Converter de Celsius para o destino final
    switch ($destino) {
        case 'C': return $celsius;
        case 'F': return ($celsius * 9 / 5) + 32;
        case 'K': return $celsius + 273.15;
        default: return "Escala de destino inválida.";
    }
}

// Exemplo de uso:
$tempF = converterTemperatura(100, 'C', 'F');
$tempK = converterTemperatura(25, 'C', 'K');

echo "100°C em Fahrenheit: " . round($tempF, 2) . "°F <br>";
echo "25°C em Kelvin: " . round($tempK, 2) . "K <br>";