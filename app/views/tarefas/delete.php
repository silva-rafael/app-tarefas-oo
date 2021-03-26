<?php 
session_start();
require '../../models/Tarefas.php';

if(isset($_GET['id'])):

	$id = $_GET['id'];

	$apagar = new Tarefas;
	$apagar->deletar($id);
	
endif;
