<?php
	include_once dirname(__DIR__) ."/models/config.php";
	include_once $project_path."/models/class/Connect.class.php";
	include_once $project_path."/models/class/Manager.class.php";

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
		echo json_encode($array_result); //Ocultando json do array
	}

	function load_function($lyricmusic){
		//Essa função pega o texto e remove o que não é palavra
		$arr = $lyricmusic;
		$arr = trim($arr);
		$arr = strtolower($arr);
		$arr = preg_replace('/[\r\n]/',' ',$arr); //Com um pequeno bug, mas essa linha funciona
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
			load_function($_POST['lyric_music']);

			function complete_song($lyricmusic){
				//Essa função pega o texto (formatado pela função anterior) e coloca em um array
				$arr = load_function($lyricmusic);
				$count = 0;
				foreach ($arr as $a) {
					if ($a != '') {
						echo $a.", ";
						$count++;
					}
				}
				echo "<br><br>";
				echo "<p><strong> Total: </strong>".$count." </p>";
			}

			function unique_words_in_song($lyricmusic){
				//Essa função pega o texto (formatado pela função anterior) e coloca somente as palavras que não se repetem em um array
				$arr = load_function($lyricmusic);
				$arr_unq = array_unique($arr);
				$count = 0;
				foreach ($arr_unq as $u) {
					if ($u != '') {
						echo $u.", ";
						$count++;
					}
				}
				echo "<br><br>";
				echo "<p><strong> Total: </strong>".$count." </p>";
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

			function count_words($lyricmusic){
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
			}

			function show_music_order($lyricmusic){
				$array_result = unique_words_list($lyricmusic);
				foreach ($array_result as $arr => $soma){
					echo $arr." -> ".$soma."<br>";
				}
			}

			function show_word_order($lyricmusic){
				$array_result = unique_words_list($lyricmusic);
				ksort($array_result);
				foreach ($array_result as $arr => $soma){
					echo $arr." -> ".$soma."<br>";
				}
			}

			function show_qtde_order($lyricmusic){
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
			if ($manager->insert_common("tb_songs", array("band_name"=>$_POST['bandname'], "music_name"=>$_POST['musicname'], "album_name"=>$_POST['albumname'], "year_album"=>$_POST['yearalbum'], "total_words"=>$_POST['wordscount'], "total_unique_words"=>$_POST['countuniquewords'], "json_words_list"=>unique_words_json_list($_POST['lyricmusic'])))) echo "Dados inseridos com sucesso";
			/*echo $_POST['bandname']."<br>";
			echo $_POST['musicname']."<br>";
			echo $_POST['albumname']."<br>";
			echo $_POST['yearalbum']."<br>";
			echo $_POST['wordscount']."<br>";
			echo $_POST['countuniquewords']."<br>";
			echo unique_words_json_list($_POST['lyricmusic'])."<br>";*/
		break;
	}
?>