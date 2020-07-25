<?php 
include('../connection/conexao.php');

function CadastrarCategoria($nome, $descricao){
    $sqlCategoria = 'INSERT INTO tb_categoria VALUES (null,"'.$nome.'","'.$descricao.'")';
    $resCategoria = $GLOBALS['conexao']->query($sqlCategoria);
    return $resCategoria;
   if($resCategoria){
        alert("Categoria cadastrada com sucesso");
    }else{
        alert("Erro ao cadastrar autor: \r\n".$GLOBALS['conexao']->error);
    }
}

function ListarCategoria(){
    $sql = 'SELECT * FROM tb_categoria';
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}

function  ExcluirCategoria($cd_categoria){
    $sql = 'DELETE FROM tb_categoria WHERE cd_categoria ='.$cd_categoria;
    $res = $GLOBALS['conexao']->query($sql);
    if ($res) {
        alert("Categoria Excluida");
    }else{
        alert("Categoria não excluida: ".$GLOBALS['conexao']->error);
    }
}


 ?>