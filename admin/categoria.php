<?php include('conexao.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de categorias</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Casa do Livro</h1>
    </header>
    <div class="container">
        <div class="formulario">
            <h2>Cadastrar Categoria</h2>
            <form action="categoria.php" method="POST">
              <p> Nome da Categoria:  <input type="text" name="nome"></p>
              <p> Descrição: <textarea name="des"></textarea></p> 
              <p><input type="submit" value="Cadastrar"></p>
            </form>
        </div>
    </div>

    <?php 
    if($_POST){
        $nome = $_POST['nome'];
        $descricao = $_POST['des'];
            CadastrarCategoria($nome,$descricao);
    }

    if (isset($_GET['excluir'])) {
        ExcluirCategoria($_GET['excluir']);
    }

     $categorias = ListarCategoria();
        echo '<table border=1>
                <tr>
                    <td>id</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>#</td>
                <tr>';
        while($c = $categorias->fetch_array()){
            echo '<tr>
                    <td>'.$c['cd_categoria'].'</td>
                    <td>'.$c['nm_categoria'].'</td>
                    <td>'.$c['ds_categoria'].'</td>
                    <td>
                        <a href="?excluir='.$c['cd_categoria'].'">Excluir</a>
                    </td>
                <tr>';
        }
        echo '</table>';



     ?>
</body>
</html>