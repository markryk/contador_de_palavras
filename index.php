<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title> Contador de palavras </title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="jumbotron" style="background-color: #70FFF6;">
					<ul class="nav nav-pills justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link btn btn-outline-dark" href="index.php"> Início </a>
					  </li>
					</ul>
					<h1 class="display-4"> Contador de palavras </h1>
					<hr class="my-4">
					<p class="lead"> Entre com os dados correspondentes e coloque a música; iremos contar as palavras </p>
					<form action="result.php" method="POST">
						<label for="bandname"> Banda/Cantor </label>
						<input class="form-control" type="text" name="band_name" id="bandname" required>
						<br>
						<label for="musicname"> Nome da música </label>
						<input class="form-control" type="text" name="music_name" id="musicname" required>
						<br>
						<label for="lyricmusic"> Letra </label>
						<textarea class="form-control" name="lyric_music" id="lyricmusic"></textarea>
						<br>
						<button class="btn btn-dark btn-lg color"> Consultar </button>	
					</form>
					<br><br>
				
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