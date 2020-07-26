<meta charset="utf-8">

<?php 
include('../controllers/ControllerLivro.php');


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
    $destino = '../img/editora/'.$_FILES['nome']['name'];

	echo $destino;
	
}
 ?>