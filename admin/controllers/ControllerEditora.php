<?php 

 include('../connection/conexao.php');

function CadastrarEditora($nome, $logo){
    $sql = 'INSERT INTO tb_editora VALUES(null,"'.$nome.'","'.$logo.'")';
    $res =  $GLOBALS['conexao']->query($sql);
    if($res){
        alert("Editora cadastrada");
    }else{
        alert("Erro ao cadastrar editora: \r\n".$GLOBALS['conexao']->error);
    }
}

function ListarEditoras(){
    $sql = 'SELECT * FROM tb_editora';
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}

function ExcluirEditora($cd_editora){
    $sql = 'DELETE FROM tb_editora WHERE cd_editora = '.$cd_editora;
    $res = $GLOBALS['conexao']->query($sql);
    if($res){
        alert("Editora Excluida");
    }else{
        alert("Erro ao excluir Editora:\r\n".$GLOBALS['conexao']->error);
    }
}
 ?>