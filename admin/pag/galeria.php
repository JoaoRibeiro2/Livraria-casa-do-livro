<meta charset="utf-8">

<?php 
include('../controllers/ControllerFotos.php');


	if (isset($_GET['livro'])){

		?>
	
	<form action="galeria.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id_livro" value="<?php echo $_GET['livro']; ?>">
		Enviar nova foto: <br><br>
		<input type="file" name="foto"><br><br>
		<input type="submit" value="Enviar">
	</form>
	<br>
<?php 

}

	if ($_POST) {
	$destino = '../img/livros/'.$_FILES['foto']['name'];
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
		CadastrarFoto($destino, $_POST['id_livro']);
	}else{
		echo "Não foi";
	}

	}
 ?>