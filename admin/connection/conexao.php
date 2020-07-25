<?php
$servidor = "localhost";
$usuario = "root";
$senha = "usbw";
$banco = "livraria";
$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if(!$conexao){
    echo "Erro de conexão ao banco: ".$conexao->error;
}


?>
