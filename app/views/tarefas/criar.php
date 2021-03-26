<?php 
session_start();
require '../../models/Tarefas.php';

if(isset($_POST['enviar'])):
	if(empty($_POST['titulo'])):
		echo "O titulo é obrigatorio";
	endif;

	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];

	

	$tarefa = new Tarefas;
	$tarefa->criar($titulo, $descricao);

endif;


?>


<h1>criar tarefas</h1>

<form action="" method="post">
	Titulo: <input type="text" name="titulo"><br>
	Descrição: <input type="text" name="descricao"><br>
	<button name="enviar">Enviar</button>
</form>