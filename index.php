<?php include_once 'controllers/validate.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="views/plugins/sweetalert/sweetalert2.min.css">
	<link rel="stylesheet" href="<?=$project_index;?>/views/plugins/datatables/DataTables/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="vendor/fontawesome_5_15_3/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style_stats.css">
	<title> Contador de palavras </title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="jumbotron" style="background-color: #70FFF6;">
					<ul class="nav nav-pills justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link btn btn-outline-dark" href="index.php"> Início </a>
					  </li>
					</ul>

					<?php validate_options(); ?>

					<br><br>

					<a style="left: 300px;" href="https://github.com/markryk" class="MarkRyk" target="_blank"> MarkRyk </a>
				</div>
			<div class="col-md-1"></div>
		</div>
	</div>

	<!--JS p/ Bootstrap (os 3, nessa ordem; esse trecho deve vir antes de quaisquer outros scripts)-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?=$project_index;?>/views/plugins/datatables/DataTables/1.10.20/js/jquery.dataTables.ptBR.min.js"></script>
	<!--<script src='https://kit.fontawesome.com/a076d05399.js'></script>-->
	<script type="text/javascript" src="vendor/fontawesome_5_15_3/js/all.js"></script>
	<script type="text/javascript" src="views/plugins/sweetalert/sweetalert2.min.js"></script>
	<script type="text/javascript">
		//Script para ativar DataTables (ferramenta para organizar os campos e dados da tabela)
      	$(document).ready(function(){
        	$('#data_table').DataTable();
    	});
    </script>
	<!--<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/jquery-maskedinput-1.1.4.pack.js"/></script>-->

	<?php
		validate_success();
		validate_error(); 
	?>
</body>
</html>