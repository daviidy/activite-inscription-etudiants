<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=php_mysql;charset=utf8', 'root', '');
}
catch(Exception $e) 
{
        die('Erreur : '.$e->getMessage());
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Liste des étudiants</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="liste/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="liste/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="liste/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="liste/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="liste/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="liste/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="liste/css/util.css">
	<link rel="stylesheet" type="text/css" href="liste/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Nom</th>
									<th class="cell100 column2">Classe</th>
									<th class="cell100 column3">A propos</th>
									<th class="cell100 column4">Date d'inscription</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
									<?php

									$reponse = $bdd->query('SELECT * FROM etudiants');

									while ($donnees = $reponse->fetch())
									{

									 ?>
								<tr class="row100 body">
									<td class="cell100 column1"> <?php echo $donnees['nom']; ?> </td>
									<td class="cell100 column2"><?php echo $donnees['classe']; ?></td>
									<td class="cell100 column3"><?php echo $donnees['message']; ?></td>
									<td class="cell100 column4"><?php echo $donnees['date_inscription']; ?></td>
								</tr>

								<?php
							}

							$reponse->closeCursor();


								 ?>

							</tbody>
						</table>
					</div>
				</div>


					</div>
				</div>
			</div>



<!--===============================================================================================-->
	<script src="liste/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="liste/vendor/bootstrap/js/popper.js"></script>
	<script src="liste/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="liste/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="liste/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});


	</script>
<!--===============================================================================================-->
	<script src="liste/js/main.js"></script>

</body>
</html>
