<?php
// Crie as funções criptografarMensagem() e descriptografarMensagem() usando a Cifra de César.

function criptografarMensagem(string $texto, int $chave = 3): string 
{
    $resultado = "";
    $tamanho = strlen($texto);

    for ($i = 0; $i < $tamanho; $i++) {
        $char = $texto[$i];

        // Trata letras maiúsculas
        if (ctype_upper($char)) {
            $resultado .= chr((ord($char) + $chave - 65) % 26 + 65);
        }
        // Trata letras minúsculas
        elseif (ctype_lower($char)) {
            $resultado .= chr((ord($char) + $chave - 97) % 26 + 97);
        }
        // Mantém espaços e símbolos intactos
        else {
            $resultado .= $char;
        }
    }
    return $resultado;
}

function descriptografarMensagem(string $textoCripto, int $chave = 3): string 
{
    // Desfazer a cifra consiste em deslocar negativamente pela mesma chave
    return criptografarMensagem($textoCripto, 26 - ($chave % 26));
}

// Exemplo de uso:
$mensagemOriginal = "Seguranca em PHP";
$criptografada = criptografarMensagem($mensagemOriginal, 4);
$descriptografada = descriptografarMensagem($criptografada, 4);

echo "Original: $mensagemOriginal <br>";
echo "Cripto: $criptografada <br>";
echo "Decifrada: $descriptografada <br>";