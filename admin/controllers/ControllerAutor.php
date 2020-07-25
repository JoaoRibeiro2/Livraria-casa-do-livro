<?php 

include('../connection/conexao.php'); 

function CadastrarAutor($nome, $foto){
    $sqlAutor = 'INSERT INTO tb_autor VALUES(null,"'.$nome.'","'.$foto.'")';
    $resAutor = $GLOBALS['conexao']->query($sqlAutor);
    if($resAutor){
        alert("Autor cadastrado");
    }else{
       alert("Erro ao excluir Editora:\r\n".$GLOBALS['conexao']->error);
    }

}
function ListarAutor(){
    $sqlAutor = 'SELECT * FROM tb_autor';
    $resAutor = $GLOBALS['conexao']->query($sqlAutor);
    return $resAutor;
}

function ExcluirAutor($cd_autor){
    $sqlAutor = 'DELETE FROM tb_autor WHERE cd_autor = '.$cd_autor;
    $res = $GLOBALS['conexao']->query($sqlAutor);
    if ($res) {
        alert("Autor Excluido");
    }else{
        alert("Erro ao Excluir autor: ".$GLOBALS['conexao']->error);
    }
}

 ?>