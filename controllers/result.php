<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title> Contador de palavras </title>
	<meta charset="utf-8">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="jumbotron" style="background-color: #70FFF6;">
					<ul class="nav nav-pills justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link btn btn-outline-dark" href="../index.php"> Início </a>
					  </li>
					</ul>
					<h1 class="display-4"> Contador de palavras </h1>
					<?php
						include_once "validate.php";
						if (isset($_POST['band_name']) && isset($_POST['music_name']) && isset($_POST['lyric_music'])):
							
							echo "<p><strong> Banda: </strong>".$_POST['band_name']."</p>";
							echo "<p><strong> Nome da música: </strong>".$_POST['music_name']."</p>";
							echo "<p><strong> Álbum: </strong>".$_POST['album_name']."</p>";
							echo "<p><strong> Ano: </strong>".$_POST['year_album']."</p>";
					?>

						<div class="row">
							<div class="col">
								<a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1" class="btn btn_color shadow-sm with-chevron">
						          <p class="text_qtde"> Música completa <i class="fa fa-angle-down"></i></p>
						        </a>
							</div>
							<div class="col">
								<?php echo "<p class='text_qtde'> Qtde de palavras no total: ".str_word_count($_POST['lyric_music'])."</p>"; ?>
							</div>
						</div>
					    
						<div id="collapseExample1" class="collapse">
						   	<div class="card">
						   		<div class="card-body card-body-no-border">
						       		<?php complete_song($_POST['lyric_music']);	?>
						        </div>
						    </div>
						</div>

						<br><br>

						<div class="row">
							<div class="col">
								<a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="true" aria-controls="collapseExample2" class="btn btn_color shadow-sm with-chevron">
						          <p class="text_qtde"> Palavras únicas da música <i class="fa fa-angle-down"></i></p>
						        </a>
							</div>
							<div class="col">
								<p class='text_qtde'> Qtde de palavras únicas: 
									<?php echo count_words($_POST['lyric_music']); ?>
								</p>
							</div>
						</div>
					    
						<div id="collapseExample2" class="collapse">
						   	<div class="card">
						   		<div class="card-body card-body-no-border">
						       		<?php unique_words_in_song($_POST['lyric_music']); ?>
						        </div>
						    </div>
						</div>

					<?php endif; ?>

					<br><br>
					<p><strong> Ranking da frequência </strong></p>
					<div class="container">
						<div class="row">
							<div class="col">
						        <!-- Collapse Panel 3--><a data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="true" aria-controls="collapseExample3" class="btn btn_color shadow-sm with-chevron">
						          <p class="text"> Na ordem da música <i class="fa fa-angle-down"></i></p>
						        </a>
						        <div id="collapseExample3" class="collapse">
						        	<div class="card">
						        		<div class="card-body">
						              		<?php
												show_music_order($_POST['lyric_music']);
											?>
						            	</div>
						          	</div>
						        </div>
							</div>
							<div class="col">
								<!-- Collapse Panel 4--><a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="true" aria-controls="collapseExample4" class="btn btn_color shadow-sm with-chevron">
							          <p class="text"> Ordem alfabética <i class="fa fa-angle-down"></i></p>
							    </a>
							    <div id="collapseExample4" class="collapse">
							      	<div class="card">
							       		<div class="card-body">
							           		<?php
												show_word_order($_POST['lyric_music']);
											?>
							           	</div>
							         </div>
							    </div>
							</div>
							<div class="col">
								<!-- Collapse Panel 5--><a data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="true" aria-controls="collapseExample5" class="btn btn_color shadow-sm with-chevron">
							          <p class="text"> Qtde de palavras <i class="fa fa-angle-down"></i></p>
							    </a>
							    <div id="collapseExample5" class="collapse">
							      	<div class="card">
							       		<div class="card-body">
							           		<?php
												show_qtde_order($_POST['lyric_music']);
											?>
							           	</div>
							         </div>
							    </div>
							</div>
						</div>
					</div>
					<br><br>
					<a href="?op=insert"><button class="btn btn-outline-dark btn-lg"> Salvar no banco </button></a>
					<a href="../index.php"><button class="btn btn-dark btn-lg color"> Voltar </button></a>
					<a style="left: 300px;" href="https://github.com/markryk" class="MarkRyk" target="_blank"> MarkRyk </a>
				</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<!-- JS p/ Bootstrap (os 3, nessa ordem; esse trecho deve vir antes de quaisquer outros scripts)-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery-maskedinput-1.1.4.pack.js"/></script>
</body>
</html>