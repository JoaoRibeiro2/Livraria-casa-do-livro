<?php
$servidor = "localhost";
$usuario = "root";
$senha = "usbw";
$banco = "livraria";
$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if(!$conexao){
    echo "Erro de conexão ao banco: ".$conexao->error;
}
// ------------------ Editora ------------------
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
// ------------------Autores------------------ 

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



// ------------------Categorias------------------

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
        alert("Autor Excluido");
    }else{
        alert("Autor não excluido: ".$GLOBALS['conexao']->error);
    }
}


// ------------------------------------ Cadastro ------------------------------------



// ------------------------------------ Livros ------------------------------------





function CadastrarLivro($nome, $idioma, $isbn, $ano, $altura, $largura, $profundidade, $peso, $paginas, $exemplares, $valor, $id_editora, $id_autor, $categorias){
    $sql = 'INSERT INTO tb_livro VALUES (null,"'.$nome.'","'.$idioma.'","'.$isbn.'","'.$ano.'",'.$altura.','.$largura.','.$profundidade.','.$peso.','.$paginas.','.$exemplares.','.$valor.','.$id_editora.','.$id_autor.')';

    $res = $GLOBALS['conexao']->query($sql);

    if ($res) {
        $id = $GLOBALS['conexao']->insert_id;
        CadastrarLivroCategoria($id, $categorias);
        // alert("Livro cadastrado");
    }else{
        alert(" Erro ao cadastrar livro: ".$GLOBALS['conexao']->error);
    }

}
function CadastrarLivroCategoria($id_livro, $categorias){
    $sql = 'INSERT INTO tb_livro_categoria VALUES ';
    $total = sizeof($categorias);
    for($i = 0; $i < $total; $i++){
        $sql.= '('.$categorias[$i].','.$id_livro.'),';
    }
    $sql = substr($sql, 0, -1);
    $sql.=';';
    $res = $GLOBALS['conexao']->query($sql);
    echo $sql;
    if ($res) {
        alert("Livro cadastrado");
    }else{
         alert(" Erro ao cadastrar livro nas categorias: ".$GLOBALS['conexao']->error);
    }

}



function alert($msg){
    echo '<script> alert("'.$msg.'"); </script>';
}

?>
