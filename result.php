<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
					    <a class="nav-link btn btn-outline-dark" href="index.php"> Início </a>
					  </li>
					</ul>
					<h1 class="display-4"> Contador de palavras </h1>
					<?php
						if (isset($_POST['band_name']) && isset($_POST['music_name']) && isset($_POST['lyric_music'])){
							$arr = $_POST['lyric_music'];
							$arr = trim($arr);
							$arr = strtolower($arr);
							$arr = preg_replace('/[^\p{L}\s]/u','',$arr);
							$arr = preg_replace('/[\r\n]/u',' ',$arr); //Essa liha foi colocada depois
							//$arr = preg_replace("~[\r\n]~", '',$arr);
							$arr = explode(" ", $arr);

							echo "<p><strong> Música completa </strong></p>";
							foreach ($arr as $a) {
								echo $a.", ";
							}
							echo "<br><br>";
							echo "<p><strong> Qtde: </strong>".str_word_count($_POST['lyric_music'])." palavras no total</p>";

							echo "<br><br>";

							echo "<p><strong> Música completa sem repetição de palavras </strong></p>";
							$arr_unq = array_unique($arr);
							foreach ($arr_unq as $u) echo $u.", ";
							echo "<br><br>";
							echo "<p><strong> Qtde: </strong>".count($arr_unq)." palavras únicas</p>";
							//echo "<br>";

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
								
							}
							/*echo "<br>";
							echo json_encode($array_result);*/ //Ocultando json do array
							/*echo "<br>";
							var_dump($array_result);*/
							echo "<br>";
							echo "Soma total: ".$soma_total;						
							echo "<br><br>";
													
						}
					?>
					<div class="container">
						<div class="row">
							<div class="col">
								<p class="text"> Palavras na ordem da música </p>
								<?php
									foreach ($array_result as $arr => $soma){
										echo $arr." -> ".$soma."<br>";
									}
								?>
							</div>
							<div class="col">
								<p class="text"> Ordenado pelas palavras </p>
								<?php
									ksort($array_result);
									foreach ($array_result as $arr => $soma){
										echo $arr." -> ".$soma."<br>";
									}
								?>
							</div>
							<div class="col">
								<p> Ordenado pela quantidade de palavras </p>
								<?php
									arsort($array_result);
									foreach ($array_result as $arr => $soma){
										echo $arr." -> ".$soma."<br>";
									}
								?>
							</div>
						</div>
					</div>
					<br>
					<a href="index.php"><button class="btn btn-dark btn-lg color"> Voltar </button></a>
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