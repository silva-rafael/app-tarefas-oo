<?php 
session_start();
require './app/models/User.php';




if(isset($_POST['enviar'])):

	$_SESSION['nome'] = $_POST['nome'];
	$nome = $_POST['nome'];
	$senha = md5($_POST['senha']);

	$user = new User;
	$user->login($nome, $senha);
endif;



 ?>

<form action="" method="post">
	Nome: <input type="text" name="nome"><br>
	Senha: <input type="password" name="senha"><br>
	<button name="enviar">Enviar</button>
</form>