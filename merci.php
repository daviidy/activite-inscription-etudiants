<?php

if (isset($_POST['nom'])) {



try
{
	// On se connecte à MySQL
	$pdoConnect = new PDO('mysql:host=localhost;dbname=php_mysql;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

$nom = $_POST['nom'];
$classe = $_POST['classe'];
$message = $_POST['message'];
$date = $_POST['date_inscription'];

$pdoQuery = "INSERT INTO etudiants(nom, classe, message, date_inscription) VALUES (?, ?, ?, ?)";

$pdoResult = $pdoConnect->prepare($pdoQuery);

$pdoExec = $pdoResult->execute(array($nom, $classe, $message, $date));

 ?>

<html lang="en" class="">

<head>
  <script src="//static.codepen.io/assets/editor/live/console_runner-ce3034e6bde3912cc25f83cccb7caa2b0f976196f2f2d52303a462c826d54a73.js"></script>
  <script src="//static.codepen.io/assets/editor/live/css_live_reload_init-890dc39bb89183d4642d58b1ae5376a0193342f9aed88ea04330dc14c8d52f55.js"></script>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex">
  <link rel="shortcut icon" type="image/x-icon" href="//static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico">
  <link rel="mask-icon" type="" href="//static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111">
  <link rel="canonical" href="https://codepen.io/JacobLett/pen/vyegPV">
  <script src="https://bootstrapcreative.com/wp-bc/wp-content/themes/wp-bootstrap/codepen/bootstrapcreative.js?v=1"></script>
  <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
  <style class="cp-pen-styles"></style>
  <link rel="stylesheet" type="text/css" href="chrome-extension://immhpnclomdloikkpcefncmfgjbkojmh/css/emoji.css">
</head>

<body>
  <div class="jumbotron text-xs-center">

    <?php

    if($pdoExec)
        {

          echo "<h1 class='display-3'>Merci ! Etudiant(e) bien ajouté(e).</h1>";

        }

        else {
          echo "<h1 class='display-3'>Désolé !.</h1>";
        }

      }

			else {
				echo "<h1>isset vide</h1>";
			}


     ?>


    <p class="lead"><strong>Vous avez le choix.</strong> Vous pouvez soit voir la liste des étudiants ou en créer d'autres</p>
    <hr>
    <p>
     <a href="liste.php">Voir la liste</a>
    </p>
    <p class="lead">
      <a class="btn btn-primary btn-sm" href="index.php" role="button">Ajouter un étudiant</a>
    </p>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>

</body>

</html>
