<?php include('../controllers/ControllerEditora.php'); ?>
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
            <h2>Cadastrar Editora</h2>
            <form action="editora.php" method="POST" enctype="multipart/form-data">
              <p> Nome da Editora:  <input type="text" name="nome"></p>
              <p> Logo: <input type="file" name="logo"></p> 
              <p><input type="submit" value="Cadastrar"></p>
            </form>
        </div>
    </div>
    <br>
    <?php
        if($_POST){
            $nome = $_POST['nome'];
            $destino = '../img/editora/'.$_FILES['logo']['name'];
            if(move_uploaded_file($_FILES['logo']['tmp_name'], $destino)){
                CadastrarEditora($nome,$_FILES['logo']['name']);
            }
        }
        if(isset($_GET['excluir'])){
            ExcluirEditora($_GET['excluir']);
        }


        
        $editoras = ListarEditoras();
        echo '<table border=1>
                <tr>
                    <td>id</td>
                    <td>Nome</td>
                    <td>Logo</td>
                    <td>#</td>
                <tr>';
        while($e = $editoras->fetch_array()){
            echo '<tr>
                    <td>'.$e['cd_editora'].'</td>
                    <td>'.$e['nm_editora'].'</td>
                    <td>
                        <img src="../img/editora/'.$e['nm_logo_editora'].'" height="50px">
                    </td>
                    <td>
                        <a href="?excluir='.$e['cd_editora'].'">Excluir</a>
                    </td>
                <tr>';
        }
        echo '</table>';

        ?>

        <br>
     <p><a href="../pag">Voltar</a></p>
</body>
</html>
