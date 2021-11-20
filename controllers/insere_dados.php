<?php
	function insereDados($bandname, $albumname, $musicname){
		
		$manager = new Manager();
		$json_list = unique_words_json_list($_POST['lyricmusic']);
		$manager->insert_common("tb_bands", array("band_name"=>$bandname, "band_created_in"=>date("Y-m-d H:i:s")));

		$band = $manager->select_common("tb_bands", NULL, array("band_name"=>$bandname));
		$band_id = $band[0]['id_band'];
		
		$manager->insert_common("tb_albums", array("album_name"=>$albumname, "album_year"=>$_POST['yearalbum'], "album_band_id"=>$band_id, "album_created_in"=>date("Y-m-d H:i:s")));

		$album = $manager->select_common("tb_albums", NULL, array("album_band_id"=>$band_id, "album_name"=>$albumname));
		$album_id = $album[0]['id_album'];

		$manager->insert_common("tb_songs", array("song_name"=>$_POST['musicname'], "song_total_words"=>$_POST['wordscount'], "song_unique_words"=>$_POST['countuniquewords'], "song_words_list"=>$json_list, "song_album_id"=>$album_id, "song_created_in"=>date("Y-m-d H:i:s")));

		$song = $manager->select_common("tb_songs", NULL, array("song_album_id"=>$album_id, "song_name"=>$musicname));
		$filter = $song[0]['id_song'];
		return $filter;
		//header("location: $project_index?op=founded_song&filter=$filter&success=song_inserted");
		//header("location: $project_index?op=founded_song&success=song_inserted");
	}
?>