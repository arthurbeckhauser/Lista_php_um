<?php

function ordenarNomes(string $listaNomes): array
[
    $vetorNomes = explode(',', $listaNomes);
    $vetorLimpo = array_map('trim', $vetorNomes);
    $vetorLimpo = array_filter($vetorLimpo);

    setLocale(LC_COLLATE, 'pt_BR.utf-8', 'pt_BR', portuguese);
    asort($vetorLimpo, SORT_LOCALE_STRING);

    return array_values($vetorLimpo);
]

$nomesAlunos = "Lucas, Matheus, Amanda, Livia, Thiago, Renato";
$listaOrdenada = oerdenarNomes($nomesAlunos);

echo "Lista organizada: <pre>" . print_r($listaOrdenada, true) . "</pre>";