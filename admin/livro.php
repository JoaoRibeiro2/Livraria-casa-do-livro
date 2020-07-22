<?php include('conexao.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerenciador de Editoras</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <header>
            <h1>Casa do Livro</h1>
        </header>
        <div class="container">
            <div class="formulario">
                <h2>Cadastrar Livro</h2>
                <form action="livro.php" method="POST" enctype="multipart/form-data">
                  <p> Nome do Livro:  <input type="text" name="nome"></p>
                  <p> Idioma:  <select name="idioma">
                                    <option value="portugues">Português</option>
                                    <option value="ingles">Inglês</option>
                                    <option value="frances">Francês</option>
                                    <option value="espanhol">Espanhol</option>

                                </select>
                  </p>
                  <p> Isbn:  <input type="text" name="isbn"></p>
                  <p> Ano:  <input type="number" name="ano"></p>
                  <p> Altura:  <input type="number" name="altura"></p>
                  <p> Largura:  <input type="number" name="largura"></p>
                  <p> Profundidade:  <input type="number" name="profundidade"></p>
                  <p> Peso:  <input type="number" name="peso"></p>
                  <p> Paginas:  <input type="number" name="paginas"></p>
                  <p> Exemplares:  <input type="number" name="exemplares"></p>
                  <p> Valor R$:  <input type="number" name="valor"></p>
                  <p> Editora:  <select name="editora">
                                    <?php $editoras = ListarEditoras();
                                    while ($e = $editoras->fetch_array()) {
                                        echo '<option value="'.$e['cd_editora'].'">'.$e['nm_editora'].'</option>';
                                    }
                                 ?>
                                </select>
                  </p>
                  <p> Autor:  <select name="autor">
                                <?php $autores = ListarAutor();
                                while ($a = $autores->fetch_array()) {
                                    echo '<option value="'.$a['cd_autor'].'">'.$a['nm_autor'].'</option>';
                                }

                                 ?>
                            </select></p>
                <p> Categoria: <br> <?php 

                    $categorias = ListarCategoria();
                    while ($c = $categorias->fetch_array()) {
                        echo '<input type="checkbox" name="categorias[]" value="'.$c['cd_categoria'].'">'.$c['nm_categoria'];
                    }

                 ?></p>
                 <p><input type="submit" value="Enviar"></p>
             </form>
            </div>
        </div>

    </body>
</html>
<?php 


if ($_POST) {
    CadastrarLivro($_POST['nome'], $_POST['idioma'], $_POST['isbn'], $_POST['ano'], $_POST['altura'], $_POST['largura'], $_POST['profundidade'], $_POST['peso'], $_POST['paginas'], $_POST['exemplares'], $_POST['valor'], $_POST['editora'], $_POST['autor'], $_POST['categorias']);
    // CadastrarLivroCategoria(3, $_POST['categorias']);
    // echo var_dump($_POST['categorias']);

}



 ?>