<?php
	//ini_set("display_errors", 1);
	class Connect {
		#Atributo estático da instância
		public static $instance;

		#Construtor vazio
		public function __construct(){

		}

		#Método de conexão com o banco
		public static function get_instance(){
			if (!isset(self::$instance)) {
				self::$instance = new PDO('mysql:host=localhost; dbname=crud_teste;' ,'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}
			return self::$instance;
		}
	}
?>