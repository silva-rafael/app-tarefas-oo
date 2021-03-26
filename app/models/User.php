<?php 
require 'Conexao.php';

class User {

	public function login($nome, $senha) {

		$sql = "SELECT * FROM users WHERE nome = ? AND senha = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $senha);
		$stmt->execute();

		if($stmt->rowCount() > 0):
			header("Location:app/views/painel.php");
		else:
			echo "dados invalidos";
		endif;

	}
}

