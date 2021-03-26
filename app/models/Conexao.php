<?php 

class Conexao {

	private static $instance;

	public static function getConn() {

		if(!isset(self::$instance)):
			self::$instance = new \PDO('mysql:host=localhost;dbname=app_tarefas;charset=utf8', 'root', '123456');
		endif;

		return self::$instance;
	}
	
}