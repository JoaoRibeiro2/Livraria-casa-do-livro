<meta charset="utf-8">

<?php 
include('../controllers/ControllerFotos.php');


	if (isset($_GET['livro'])){

		?>
	
	<form action="galeria.php" method="POST" enctype="multipart/form-data">
		
		Enviar nova foto: <br><br>
		<input type="file" name="foto"><br><br>
		<input type="submit" value="Enviar">
	</form>
	<br>
<?php 


}
if($_POST){
    $destino = '../img/livros/'.$_FILES['foto']['name'];
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
		// echo $destino;
		CadastrarFoto($destino, $_POST['id_livro']);
	 }else{
	 	alert("Erro ao enviar foto");
	 }
}
 ?>