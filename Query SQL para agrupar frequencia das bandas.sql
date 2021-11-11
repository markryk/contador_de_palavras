SELECT DISTINCT tb_songs.band_name, counter.count FROM tb_songs LEFT JOIN (SELECT tb_songs.band_name, COUNT(tb_songs.band_name) AS count FROM tb_songs GROUP BY tb_songs.band_name) counter ON counter.band_name = tb_songs.band_name ORDER BY counter.count DESC LIMIT 4 