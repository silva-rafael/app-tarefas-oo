<?php
require 'Conexao.php';

class Tarefas {

	public $titulo;
	public $descricao;

	public function ler() {

		$sql = "SELECT * FROM tarefas  ORDER BY id DESC";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->execute();

		if($stmt->rowCount() > 0):
			$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $resultado;
		else:
			return [];
		endif;
	}

	public function lerUma($id) {

		$sql = "SELECT * FROM tarefas WHERE id = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		if($stmt->rowCount() > 0):
			$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
			$this->titulo = $resultado['titulo'];
			$this->descricao = $resultado['descricao'];
		else:
			return [];
		endif;

	}

	public function criar($titulo = '', $descricao = '') {

		$sql = "INSERT INTO tarefas (titulo, descricao) VALUES (?, ?)";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $titulo);
		$stmt->bindValue(2, $descricao);
		$stmt->execute();

		header("Location: ../painel.php");
	}

	public function deletar($id) {

		$sql = "DELETE FROM tarefas WHERE id = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		header("Location: ../painel.php");

	}

	public function atualiza($id, $titulo, $descricao) {

		$sql = "UPDATE tarefas  SET titulo = ? , descricao = ? WHERE id = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $titulo);
		$stmt->bindValue(2, $descricao);
		$stmt->bindValue(3, $id);
		$stmt->execute();

		header("Location: ../painel.php");

	}
}