<?php 

include('../connection/conexao.php');

function CadastrarFoto($foto,$id_livro){
	$sql = 'INSERT INTO tb_foto VALUES (null,"'.$foto.'",'.$id_livro.')';
	$res = $GLOBALS['conexao']->query($sql);
	if ($res) {
		alert("Foto cadastrada");
	}else
	{
		alert("Erro, foto não cadastrada");
	}
}

 ?>