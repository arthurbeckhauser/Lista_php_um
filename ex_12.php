<?php
// Crie uma função chamada analisarProdutos() que receba um vetor com nome e preço,
// retorne o mais caro, o mais barato, a média de preço e busque um produto específico.

function analisarProdutos(array $produtos, string $buscaUsuario = ""): array 
{
    if (empty($produtos)) return [];

    $maisCaro = $produtos[0];
    $maisBarato = $produtos[0];
    $somaPrecos = 0;
    $produtoEncontrado = null;

    foreach ($produtos as $prod) {
        $somaPrecos += $prod['preco'];

        if ($prod['preco'] > $maisCaro['preco']) {
            $maisCaro = $prod;
        }
        if ($prod['preco'] < $maisBarato['preco']) {
            $maisBarato = $prod;
        }

        // Busca (ignora maiúsculas e minúsculas)
        if (!empty($buscaUsuario) && strcasecmp($prod['nome'], $buscaUsuario) === 0) {
            $produtoEncontrado = $prod;
        }
    }

    return [
        "mais_caro" => $maisCaro,
        "mais_barato" => $maisBarato,
        "media_precos" => $somaPrecos / count($produtos),
        "busca" => $produtoEncontrado ? "Encontrado: " . $produtoEncontrado['nome'] . " - R$ " . $produtoEncontrado['preco'] : "Produto não encontrado."
    ];
}

// Exemplo de uso:
$catalogo = [
    ["nome" => "Arroz", "preco" => 22.50],
    ["nome" => "Feijão", "preco" => 8.90],
    ["nome" => "Azeite", "preco" => 44.00],
];

$analiseCatalogo = analisarProdutos($catalogo, "Feijão");
echo "Mais Caro: " . $analiseCatalogo['mais_caro']['nome'] . "<br>";
echo "Resultado da busca: " . $analiseCatalogo['busca'] . "<br>";