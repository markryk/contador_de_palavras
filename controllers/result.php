<?php
	include_once dirname(__DIR__) ."/models/config.php";
	include_once $project_path."/models/class/Connect.class.php";
	include_once $project_path."/models/class/Manager.class.php";
	include_once $project_path."/controllers/insere_dados.php";

	date_default_timezone_set("America/Fortaleza");

	/*function show_qtde_order($lyricmusic){
		$array_result = unique_words_list($lyricmusic);
		arsort($array_result);
		foreach ($array_result as $arr => $soma){
			echo $arr." -> ".$soma."<br>";
		}
	}*/

	function unique_words_json_list($lyricmusic){
		//Essa função conta a frequência de cada palavra única no texto maior
		$arr = load_function($lyricmusic);
		$arr_unq = array_unique($arr);
		$array_result = array();
		foreach ($arr_unq as $u){ //o q está sendo procurado
			$soma = 0;
			$soma_total = 0;
			$array_cont = array();
			
			foreach ($arr as $a){ //a palavra que está sendo comparada com o q está sendo procurado
				if ($u == $a) {
					if ($u != NULL) $soma += substr_count($u, $a);
				}
				$soma_total += $soma;
			}
			//echo $u." -> ".$soma;

			$array_cont = array($u => $soma);
			$array_result += $array_cont;
			//echo "<br>";

			//$soma_total += $soma;

			//echo "<br>";
			
			/*echo "<br>";
			var_dump($array_result);*/
			//echo json_encode($array_result); //Ocultando json do array
			
		}
		//return $array_result;
		//$array_result = arsort($array_result);
		return json_encode($array_result); //Ocultando json do array
	}

	function load_function($lyricmusic){
		//Essa função pega o texto e remove o que não é palavra
		$arr = $lyricmusic;
		$arr = trim($arr);
		$arr = strtolower($arr);
		$arr = preg_replace('/[\r\n\W]/',' ',$arr); //Com um pequeno bug, mas essa linha funciona
		//$arr = preg_replace("~[\r\n]~", '',$arr); //
		//var_dump($arr);
		//echo "<br>";
		$arr = explode(" ", $arr);

		return $arr;
	}

	switch($_POST['action']){
		case "count": //Aqui será pontuado o cliente
			unset($_POST['action']);
			//$manager = new Manager();
			//load_function($_POST['lyric_music']);

			function complete_song($lyricmusic, $show_text){
				//Essa função pega o texto (formatado pela função load_function) e coloca em um array
				$arr = load_function($lyricmusic);
				$count = 0;
				foreach ($arr as $a) {
					if ($a != '') {
						if ($show_text) echo $a.", ";
						$count++; //conta cada palavra
					}
				}
				if ($show_text) echo "<br><br><p><strong> Total: </strong>".$count." </p>";
				else return $count;
			}

			function unique_words_in_song($lyricmusic, $show_text){
				//Essa função pega o texto (formatado pela função load_function) e exibe somente as palavras que não se repetem, em um array
				$arr = load_function($lyricmusic);
				$arr_unq = array_unique($arr);
				$count = 0;
				foreach ($arr_unq as $u) {
					if ($u != '') {
						if ($show_text) echo $u.", "; //
						$count++; //conta cada palavra
					}
				}
				if ($show_text) echo "<br><br><p><strong> Total: </strong>".$count." </p>";
				else return $count;
			}

			function unique_words_list($lyricmusic){
				//Essa função conta a frequência de cada palavra única no texto maior
				$arr = load_function($lyricmusic);
				$arr_unq = array_unique($arr);
				$array_result = array();
				foreach ($arr_unq as $u){ //o q está sendo procurado
					$soma = 0;
					$soma_total = 0;
					$array_cont = array();
					
					foreach ($arr as $a){ //a palavra que está sendo comparada com o q está sendo procurado
						if ($u == $a) {
							if ($u != NULL) $soma += substr_count($u, $a);
						}
						$soma_total += $soma;
					}
					//echo $u." -> ".$soma;

					$array_cont = array($u => $soma);
					$array_result += $array_cont;
					//echo "<br>";

					//$soma_total += $soma;

					//echo "<br>";
					//echo json_encode($array_result); //Ocultando json do array
					/*echo "<br>";
					var_dump($array_result);*/
					
				}
				return $array_result;
			}

			/*function count_words($lyricmusic){
				$arr = load_function($lyricmusic);
				$arr_unq = array_unique($arr);
				$array_result = array();
				
				foreach ($arr_unq as $u){ //o q está sendo procurado
					$soma_total = 0;
					$soma = 0;			
					$array_cont = array();
					$count = 0;
					foreach ($arr as $a){ //a palavra que está sendo comparada com o q está sendo procurado
						if ($u == $a && $u != '') {
							if ($u != NULL && $u != ''){
								$soma += substr_count($u, $a);
								$soma_total += $soma;
							}
						}						
					}
					//echo $u." -> ".$soma;

					$array_cont = array($u => $soma);
					$array_result += $array_cont;
				}
				return count($array_result);
			}*/

			function show_music_order($lyricmusic){
				//Essa função mostra a frequência das palavras pela ordem em q aparecem na música
				$array_result = unique_words_list($lyricmusic);
				foreach ($array_result as $arr => $soma){
					echo $arr." -> ".$soma."<br>";
				}
			}

			function show_word_order($lyricmusic){
				//Essa função mostra a frequência das palavras pela ordem alfabética
				$array_result = unique_words_list($lyricmusic);
				ksort($array_result);
				foreach ($array_result as $arr => $soma){
					echo $arr." -> ".$soma."<br>";
				}
			}

			function show_qtde_order($lyricmusic){
				//Essa função mostra a frequência das palavras pela ordem (decrescente) da frequencia
				$array_result = unique_words_list($lyricmusic);
				arsort($array_result);
				foreach ($array_result as $arr => $soma){
					echo $arr." -> ".$soma."<br>";
				}
			}
			include_once $GLOBALS['project_path']."views/result.html";
		break;

		case "insert":
			$manager = new Manager();
			$nome_da_banda = $_POST['bandname'];
			$nome_do_album = $_POST['albumname'];
			$nome_da_musica = $_POST['musicname'];
			//echo $nome_do_album;

			$band = $manager->select_common("tb_bands", NULL, array("band_name"=>$nome_da_banda));

			if ($band){
				//var_dump($band);
				$band_id = $band[0]['id_band'];
				$album = $manager->select_common("tb_albums", NULL, array("album_band_id"=>$band_id, "album_name"=>$nome_do_album));
				if ($album){
					//var_dump($album);
					$album_id = $album[0]['id_album'];
					$song = $manager->select_common("tb_songs", NULL, array("song_album_id"=>$album_id, "song_name"=>$nome_da_musica));
					if ($song){
						//var_dump($song);
						$filtr = $song[0]['id_song'];
						header("location: $project_index?op=founded_song&filter=$filtr&error=song_already_registered");
					} else {
						$filtr = insereMusica($band_id, $album_id, $nome_da_musica);

						header("location: $project_index?op=founded_song&filter=$filtr&success=song_inserted");
					}
				} else {
					$filtr = insereAlbumMusica($band_id, $nome_do_album, $nome_da_musica);

					header("location: $project_index?op=founded_song&filter=$filtr&success=song_inserted");
				}
			} else {
				$filtr = insereBandaAlbumMusica($nome_da_banda, $nome_do_album, $nome_da_musica);

				header("location: $project_index?op=founded_song&filter=$filtr&success=song_inserted");
			}
		break;

		case 'delete':
			unset($_POST['action']);
			$manager = new Manager();
			$manager->delete_common("tb_songs", array("id_song"=>$_POST['filter']), NULL);
			header("location: $project_index".$user->profile_page."?op=list&success=song_deleted");
		break;
	}
?>