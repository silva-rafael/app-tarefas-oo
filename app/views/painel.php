<?php 
session_start();
require_once '../models/Tarefas.php';

if(!isset($_SESSION['nome'])):
	header("Location: ../../index.php");
endif;

echo "Seja bem vindo ".$_SESSION['nome'];

$tarefa = new Tarefas;
$tarefa->ler();

?>
 | <a href="tarefas/criar.php">Criar Tarefa</a> | <a href="logout.php">Sair</a><hr>

<?php foreach ($tarefa->ler() as $t): ?>
	<h3><?php echo $t['titulo']; ?></h3>
	<p> <?php echo $t['descricao']; ?> </p>
	<a href="tarefas/delete.php?id=<?php echo $t['id']; ?>">Deletar</a> | <a href="tarefas/atualiza.php?id=<?php echo $t['id']; ?>">Atualizar</a><hr>

<?php endforeach; ?>