<?php

// 1. Função para calcular os subtotais de cada produto
function calcularSubtotais(array $produtos): array 
{
    foreach ($produtos as $chave => $produto) {
        $produtos[$chave]['subtotal'] = $produto['quantidade'] * $produto['valor_unitario'];
    }
    return $produtos;
}

// 2. Função para calcular o desconto com base no valor total bruto
function calcularDescontoEcom(float $totalBruto): float 
{
    if ($totalBruto > 1000) {
        return $totalBruto * 0.15; // 15%
    } elseif ($totalBruto > 500) {
        return $totalBruto * 0.10; // 10%
    }
    return 0.0;
}

// 3. Função para calcular o frete com base no valor líquido (pós-desconto)
function calcularFrete(float $totalComDesconto): float 
{
    if ($totalComDesconto <= 300) {
        return 35.00;
    } elseif ($totalComDesconto <= 800) {
        return 20.00;
    }
    return 0.00; // Frete grátis
}

// 4. Função para extrair métricas de produtos (Mais caro e Maior Subtotal)
function extrairMetricasProdutos(array $produtosComSubtotal): array 
{
    $maisCaro = $produtosComSubtotal[0];
    $maiorSubtotal = $produtosComSubtotal[0];
    $totalItens = 0;

    foreach ($produtosComSubtotal as $prod) {
        $totalItens += $prod['quantidade'];

        if ($prod['valor_unitario'] > $maisCaro['valor_unitario']) {
            $maisCaro = $prod;
        }
        if ($prod['subtotal'] > $maiorSubtotal['subtotal']) {
            $maiorSubtotal = $prod;
        }
    }

    return [
        "total_itens" => $totalItens,
        "mais_caro" => $maisCaro['nome'],
        "maior_subtotal" => $maiorSubtotal['nome']
    ];
}

// 5. Função Principal: Processa tudo e agrupa os retornos estruturados
function processarPedido(array $produtos): array 
{
    if (empty($produtos)) return [];

    // Executa as etapas utilizando as funções auxiliares
    $produtosProcessados = calcularSubtotais($produtos);
    
    $totalBruto = array_sum(array_column($produtosProcessados, 'subtotal'));
    $desconto = calcularDescontoEcom($totalBruto);
    $totalComDesconto = $totalBruto - $desconto;
    
    $frete = calcularFrete($totalComDesconto);
    $valorFinal = $totalComDesconto + $frete;

    $metricas = extrairMetricasProdutos($produtosProcessados);

    // Retorna o relatório estruturado completo
    return [
        "produtos" => $produtosProcessados,
        "qtd_produtos_diferentes" => count($produtos),
        "qtd_total_itens" => $metricas['total_itens'],
        "produto_mais_caro_unitario" => $metricas['mais_caro'],
        "produto_maior_subtotal" => $metricas['maior_subtotal'],
        "valor_desconto" => $desconto,
        "valor_frete" => $frete,
        "valor_final" => $valorFinal
    ];
}

// --- CONSUMO DO DESAFIO (Simulando o index.php) ---

$carrinhoDeCompras = [
    ["nome" => "Notebook Gamer", "quantidade" => 1, "valor_unitario" => 4500.00],
    ["nome" => "Mouse Sem Fio", "quantidade" => 3, "valor_unitario" => 120.00],
    ["nome" => "Teclado Mecânico", "quantidade" => 2, "valor_unitario" => 350.00]
];

$relatorioFinal = processarPedido($carrinhoDeCompras);

// Exibição Organizada do Relatório
echo "<h3>Relatório de Processamento do Pedido</h3>";
echo "Produtos Diferentes: " . $relatorioFinal['qtd_produtos_diferentes'] . "<br>";
echo "Total de Ítens Comprados: " . $relatorioFinal['qtd_total_itens'] . "<br>";
echo "Produto Mais Caro: " . $relatorioFinal['produto_mais_caro_unitario'] . "<br>";
echo "Maior faturamento por item: " . $relatorioFinal['produto_maior_subtotal'] . "<br>";
echo "--------------------------------------------------<br>";
echo "Desconto Aplicado: R$ " . number_format($relatorioFinal['valor_desconto'], 2, ',', '.') . "<br>";
echo "Valor do Frete: R$ " . number_format($relatorioFinal['valor_frete'], 2, ',', '.') . "<br>";
echo "<strong>Valor Final do Pedido: R$ " . number_format($relatorioFinal['valor_final'], 2, ',', '.') . "</strong><br>";