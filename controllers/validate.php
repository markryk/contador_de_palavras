<?php
	include_once dirname(__DIR__)."/models/config.php";
	include_once $GLOBALS['project_path']."models/class/Connect.class.php";
	include_once $GLOBALS['project_path']."models/class/Manager.class.php";
	
	function validate_options(){
		if (!isset($_GET['op'])) {
			include_once $GLOBALS['project_path']."views/content_index.html";
		} else {

			#Globalizando os dados da sessão
			//global $user;

			switch ($_GET['op']) {
				case 'register':
					include_once $GLOBALS['project_path']."views/register.html";
				break;
				case 'list':
					$manager = new Manager();
					echo "<h1> Músicas </h1>";

					$tables['tb_songs'] = array();
					$tables['tb_bands'] = array();
					$tables['tb_albums'] = array();
					
					$rel['tb_songs.song_album_id'] = "tb_albums.id_album";
					$rel['tb_albums.album_band_id'] = "tb_bands.id_band";
					//$rel['tb_songs.song_band_id'] = "tb_bands.id_band";

					//$table_content = $manager->select_common("tb_songs", NULL, NULL, " ORDER BY band_name");
					$table_content = $manager->select_special($tables, $rel, NULL);

					if ($table_content){
						$table_titles['band_name'] = "Cantor/banda";
						$table_titles['song_name'] = "Música";
						$table_titles['album_name'] = "Álbum";
						$table_titles['album_year'] = "Ano";
						$table_titles['song_total_words'] = "Qtde palavras";
						$table_titles['song_unique_words'] = "Qtde palavras únicas";
					}

					$show = true;
					$delete = true;

					$show_destiny = "?op=show_song";
					$delete_destiny = "controllers/result.php";

					$filter = "id_song";

					include_once $GLOBALS['project_path']."views/list_common.html";

					echo "<a href='?op=register' class='btn btn-dark color'> Inserir música </a> &nbsp; <a href='?op=stats' class='btn btn-dark color'> Estatísticas </a>";
				break;
				case 'founded_song':
					$manager = new Manager();
					echo "<h1> Músicas </h1>";

					$tables['tb_songs'] = array();
					$tables['tb_bands'] = array();
					$tables['tb_albums'] = array();
					
					$rel['tb_songs.song_album_id'] = "tb_albums.id_album";
					$rel['tb_albums.album_band_id'] = "tb_bands.id_band";

					//$table_content = $manager->select_common("tb_songs", NULL, NULL, " ORDER BY band_name");
					$table_content = $manager->select_special($tables, $rel, array("id_song"=>$_GET['filter']));

					if ($table_content){
						$table_titles['band_name'] = "Cantor/banda";
						$table_titles['song_name'] = "Música";
						$table_titles['album_name'] = "Álbum";
						$table_titles['album_year'] = "Ano";
						$table_titles['song_total_words'] = "Qtde palavras";
						$table_titles['song_unique_words'] = "Qtde palavras únicas";
					}

					$show = true;
					$delete = true;

					$show_destiny = "?op=show_song";
					$delete_destiny = "controllers/result.php";

					$filter = "id_song";

					include_once $GLOBALS['project_path']."views/list_common.html";

					echo "<a href='?op=register' class='btn btn-dark color'> Inserir música </a> &nbsp; <a href='?op=stats' class='btn btn-dark color'> Estatísticas </a>";
				break;
				case 'show_song':
					$manager = new Manager();
					$song = $manager->select_common("tb_songs", NULL, array("id_song"=>$_GET['filter']));
					include_once $GLOBALS['project_path']."views/show_song.html";
					//include_once $GLOBALS['project_path']."result.php?op=count";
				break;
				case 'stats':
					include_once $GLOBALS['project_path']."models/class/ConnectPDO.php";
					$manager = new Manager();
					
	                //$pdo = Connect_em_PDO();

	                $bandname = $manager->select_distinct("tb_songs", "DISTINCT", array("band_name"), NULL);					
					$songname = $manager->select_common("tb_songs", NULL, array("song_name"), " ORDER BY total_words DESC LIMIT 4");
					include_once $GLOBALS['project_path']."views/stats.html";
				break;
				/*default:
					include_once $GLOBALS['project_path']."views/content_index.html";
				break;*/
			}
		}
	}

	function load_content_index(){
		include_once $GLOBALS['project_path']."views/content_index.html";
	}

	function validate_success() {
		if (!isset($_GET['success'])) return false;
		switch ($_GET['success']) {
			case "song_inserted":
				$msg = "Dados inseridos com sucesso";
				$submsg = "";
				$class = "success";
				include_once 'alert.html';
			break;
		}
	}

	function validate_error() {
		if (!isset($_GET['error'])) return false;
		switch ($_GET['error']) {
			case "song_already_registered":
				$msg = "Música já cadastrada";
				$submsg = "";
				$class = "error";
				include_once 'alert.html';
			break;
		}
	}	
?>