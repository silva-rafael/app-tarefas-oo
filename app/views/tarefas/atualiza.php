<?php 
session_start();
require '../../models/Tarefas.php';

$id = $_GET['id'];

if(isset($_POST['enviar'])):
	$id = $_GET['id'];


	if(empty($_POST['titulo'])):
		echo "O titulo é obrigatorio";
	endif;

	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];

	

	$tarefa = new Tarefas;
	$tarefa->atualiza($id, $titulo, $descricao);

endif;

$ler = new Tarefas;
$ler->lerUma($id);


?>


<h1>criar tarefas</h1>

<form action="" method="post">
	Titulo: <input type="text" name="titulo" value="<?php echo ($ler->titulo); ?>"><br>
	Descrição: <input type="text" name="descricao" value="<?php echo ($ler->descricao); ?>"><br>
	<button name="enviar">Enviar</button>
</form>