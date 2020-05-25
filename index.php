<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Connection</title>
</head>

<body>
<?php
echo("
<form method='GET' action='accueil.php?email=".$_GET["email"]."&&mot_de_passe=".$_GET["mot_de_passe"]."'>
<h2><legend>Se connecter</legend></H2>
	<h5>
	<label><i>E-mail:</i></label>
	<Input type='email' name='email'>
	<label><i>Mot de passe:</i></label>
	<Input type='password' name='mot_de_passe'>
	<input type='submit' value='Se connecter' name='submit'>
	</form>");	//cet méthode permet de récuper les données mais affiche une erreur car innitialement aucune valeur n'est entrée
?>
</body>

</html>