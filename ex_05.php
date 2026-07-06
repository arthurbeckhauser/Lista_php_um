<?php
// Crie uma função chamada analisarTexto() que receba um texto e retorne a quantidade
// de palavras, caracteres, vogais e consoantes.

function analisarTexto(string $texto): array 
{
    // Conta caracteres reais usando utf-8
    $totalCaracteres = mb_strlen($texto, 'UTF-8');
    
    // Conta palavras eliminando espaços extras
    $totalPalavras = str_word_count(preg_replace('/[^a-zA-Z0-9\s]/', '', $texto), 0);

    // Normaliza o texto para contagem de letras (remover acentos e colocar em minúsculo)
    $textoNormalizado = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
    $textoNormalizado = strtolower($textoNormalizado);

    // Expressões regulares para contar letras específicas
    preg_match_all(/[aeiou]/, $textoNormalizado, $matchVogais);
    preg_match_all(/[bcdfghjklmnpqrstvwxyz]/, $textoNormalizado, $matchConsoantes);

    return [
        "palavras" => $totalPalavras,
        "caracteres" => $totalCaracteres,
        "vogais" => count($matchVogais[0]),
        "consoantes" => count($matchConsoantes[0])
    ];
}

// Exemplo de uso:
$textoEditora = "Desenvolvimento web com PHP é fantástico!";
$analise = analisarTexto($textoEditora);

echo "Texto: \"$textoEditora\" <br><br>";
echo "Palavras: " . $analise["palavras"] . "<br>";
echo "Caracteres: " . $analise["caracteres"] . "<br>";
echo "Vogais: " . $analise["vogais"] . "<br>";
echo "Consoantes: " . $analise["consoantes"] . "<br>";