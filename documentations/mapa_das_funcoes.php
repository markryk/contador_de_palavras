<?php
    Estrutura geral: function(parâmetro): arquivo.ext

    validate.php
        validate_options();
            op(empty) >> content_index.html
            op(register) >> register.html
            op(list) >> list_common.phtml
            op(founded_song) >> list_common.phtml
            op(show_song) >> show_song.html
            op(stats) >> stats.html

        load_content_index(): content_index.html

        validate_success():
            success(song_inserted) >> alert.html

        validate_error():
            error(song_already_registered) >> alert.html

    result.php
        unique_words_json_list();
        load_function();

        action(count)
            complete_song();
            unique_words_in_song();
            unique_words_list();
            show_music_order();
            show_word_order();
        >> result.html

        action(insert) >> op(founded_song) >> list_common.html

        action(delete) >> op(list) >> list_common.html
?>