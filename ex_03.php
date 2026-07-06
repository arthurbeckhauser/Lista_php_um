<?php
// Crie uma função chamada mascararCpf() que receba um CPF e substitua todos os 
// caracteres por *, mantendo visíveis apenas os quatro últimos dígitos.

function mascararCpf(string $cpf): string 
{
    // Remove qualquer caractere que não seja número para padronizar
    $apenasNumeros = preg_replace('/\D/', '', $cpf);
    $tamanho = strlen($apenasNumeros);
    
    if ($tamanho < 4) {
        return "****";
    }
    
    // Mantém apenas os 4 últimos dígitos e mascara o restante
    $ultimosQuatro = substr($apenasNumeros, -4);
    $mascara = str_repeat('*', $tamanho - 4);
    
    // Opcional: Formata com máscara visual básica (ex: *******-1234)
    return $mascara . "-" . $ultimosQuatro;
}

// Exemplo de uso:
$cpfOriginal = "123.456.789-00";
echo "CPF Original: $cpfOriginal <br>";
echo "CPF Mascarado: " . mascararCpf($cpfOriginal) . "<br>";