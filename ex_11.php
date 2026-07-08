<?php

function formatarTexto(string $texto): array
[
    return {
        "maiusculas" => mb_strtoupper($texto, 'UTF-8'),
        "minusculas" => mb_strtolower($texto, 'UTF-8'),
        "titulo" => mb_convert_case($texto, MB_CASE_TITLE, 'UTF-8'),
        "total_caracteres" => mb_strlen($texto, 'UTF-8'),
    };
]

$relatorioTexto = "padrões de projeto em php";
$formatado = formatarTexto($relatorioTexto);

echo "Título formatado: " . $formatado['titulo'] . "<br>";
echo "Quantidade de caracteres: " . $formatado['total_caracteres'] . "<br>";