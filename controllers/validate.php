<?php
	include_once dirname(__DIR__)."/models/config.php";
	include_once $GLOBALS['project_path']."models/class/Connect.class.php";
	include_once $GLOBALS['project_path']."models/class/Manager.class.php";
	function validate_options(){
		if (!isset($_GET['op'])) {
			include_once $GLOBALS['project_path']."views/content_index.html";
		}

		//#Incluindo os arquivos necessários
		//include_once $GLOBALS['project_path']."models/class/Connect.class.php";
		//include_once $GLOBALS['project_path']."models/class/Manager.class.php";
		//include_once $GLOBALS['project_path']."controllers/client.php";

		#Globalizando os dados da sessão
		//global $user;

		switch ($_GET['op']) {
			case 'register':
				include_once $GLOBALS['project_path']."views/register.html";
			break;
			/*default:
				include_once $GLOBALS['project_path']."views/content_index.html";
			break;*/
		}
	}

	function load_content_index(){
		include_once $GLOBALS['project_path']."views/content_index.html";
	}

	
?>