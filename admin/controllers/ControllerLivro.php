<?php 

include('../connection/conexao.php');

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

function ListarLivros(){
    $sql = 'SELECT * FROM tb_livro';
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}

function ListarEditoras(){
    $sql = 'SELECT * FROM tb_editora';
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}

function ListarCategoria(){
    $sql = 'SELECT * FROM tb_categoria';
    $res = $GLOBALS['conexao']->query($sql);
    return $res;
}

function ListarAutor(){
    $sqlAutor = 'SELECT * FROM tb_autor';
    $resAutor = $GLOBALS['conexao']->query($sqlAutor);
    return $resAutor;
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
    if ($res) {
        alert("Livro cadastrado");
    }else{
         alert(" Erro ao cadastrar livro nas categorias: ".$GLOBALS['conexao']->error);
    }

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