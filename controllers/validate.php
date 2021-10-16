<?php
	function load_function($lyricmusic){
		$arr = $_POST['lyric_music'];
		$arr = trim($arr);
		$arr = strtolower($arr);
		$arr = preg_replace('/[\r\n]/',' ',$arr); //Com um pequeno bug, mas essa linha funciona
		//$arr = preg_replace("~[\r\n]~", '',$arr); //
		//var_dump($arr);
		echo "<br>";
		$arr = explode(" ", $arr);

		return $arr;
	}

	function complete_song($lyricmusic){
		$arr = load_function($lyricmusic);
		foreach ($arr as $a) {
			echo $a.", ";
		}
	}

	function unique_words_in_song($lyricmusic){
		$arr = load_function($lyricmusic);
		$arr_unq = array_unique($arr);
		foreach ($arr_unq as $u) echo $u.", ";

		echo "<br><br>";
		echo "<p><strong> Qtde: </strong>".count($arr_unq)." palavras únicas</p>";
	}

	function count_words($lyricmusic){
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

			/*echo "<br>";
			echo json_encode($array_result);*/ //Ocultando json do array
			/*echo "<br>";
			var_dump($array_result);*/
			
		}
		return $array_result;
	}

	function show_music_order($lyricmusic){
		$array_result = count_words($lyricmusic);
		foreach ($array_result as $arr => $soma){
			echo $arr." -> ".$soma."<br>";
		}
	}

	function show_word_order($lyricmusic){
		$array_result = count_words($lyricmusic);
		ksort($array_result);
		foreach ($array_result as $arr => $soma){
			echo $arr." -> ".$soma."<br>";
		}
	}

	function show_qtde_order($lyricmusic){
		$array_result = count_words($lyricmusic);
		arsort($array_result);
		foreach ($array_result as $arr => $soma){
			echo $arr." -> ".$soma."<br>";
		}
	}
?>