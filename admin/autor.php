<?php include ('conexao.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Gerenciador de Editoras</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style type="text/css">
        .autores{
            margin: 50px;
        }
    </style>
</head>
<body>
	<header>
        <h1>Casa do Livro</h1>
    </header>
    <div class="container">
        <div class="formulario">
            <h2>Cadastrar Autor</h2>
            <form action="autor.php" method="POST" enctype="multipart/form-data">
              <p> Nome do Autor:  <input type="text" name="nome"></p>
              <p> Logo:           <input type="file" name="foto"></p> 
              <p><input type="submit" value="Cadastrar"></p>
            </form>
        </div>
    </div>
    <?php 

    if ($_POST) {
        $name = $_POST['nome'];
        $destino = '../img/autor/'.$_FILES['foto']['name'];
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $destino)){
                CadastrarAutor($name, $_FILES['foto']['name']);
            }
        }
         if(isset($_GET['excluir'])){
            ExcluirAutor($_GET['excluir']);
        }


        
        $autores = ListarAutor();
        echo '<table border=1>
                <tr>
                    <td>id</td>
                    <td>Nome</td>
                    <td>Logo</td>
                    <td>#</td>
                <tr>';
        while($a = $autores->fetch_array()){
            echo '<tr>
                    <td>'.$a['cd_autor'].'</td>
                    <td>'.$a['nm_autor'].'</td>
                    <td>
                        <img src="../img/autor/'.$a['nm_foto_autor'].'" height="50px">
                    </td>
                    <td>
                        <a href="?excluir='.$a['cd_autor'].'">Excluir</a>
                    </td>
                <tr>';
        }
        echo '</table>';
    ?>
</body>
</html>