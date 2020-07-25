<?php 
include('conexao.php');


	if (isset($_GET['livro'])){

		?>

	<form action="galeria.php" method="post" enctype="multpart/form-data">
		<input type="hidden" name="id_livro" value="<?php echo $_GET['livro']; ?> ">
		Enviar nova foto: <br><br>
		<input type="file" name="foto"><br><br>
		<input type="submit" value="Enviar">
	</form>

<?php 
}
if ($_POST) {
	
	// $destino = '../img/livro'.$_FILES['']
}
 ?>