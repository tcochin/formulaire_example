<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
</head>

<body>
<?php
$hote = 'localhost'; // Serveur de votre base de données
$nomutilisateur = 'tcochin'; // Login pour se connecter à la base de données
$mdp = 'OGBPqXqppKhn'; // Mot de passe associé
 
$base = 'utilisateur'; // Le nom de votre base de données
$sql = "SELECT * FROM utilisateurs";	
 
$link=mysqli_connect($hote, $nomutilisateur, $mdp,$nomutilisateur) or die("Connexion échoué");	

$my_email = isset($_GET['email'])? $_GET['email'] : "";
$my_pwd = isset($_GET['mot_de_passe'])? $_GET['mot_de_passe'] : "";
$sql="SELECT * FROM connection WHERE email = '".$my_email."' and mdp='".$my_pwd."'";
$requete_message="SELECT * FROM message";	
$result=mysqli_query($link,$sql);


if (mysqli_num_rows($result)==0)
{
echo( "Vous n’êtes pas inscrit ou ce n’est pas le bon mot de passe");
}
else		//l'utilisateur peut entrer un message
{
	echo( "Bonjour ");
	$requete_pseudo="SELECT * FROM connection WHERE email = '".$my_email."' and mdp='".$my_pwd."'";
	$Pseudo=mysqli_query($link,$requete_pseudo);
	while($row = mysqli_fetch_assoc($Pseudo)){
		foreach($row as $key=>$val){
						if($key=='pseudo'){			//affiche le pseudo de l'utilisateur
						echo($val);}
						}				
	}
	echo( "<br>");
	echo( "Destinataire du message");					//liste déroulante pour selection destinataire
	echo("<select name='destinataire'>
					<option value='@tous'>@tous</option>");
			
					$requete_destinataire = "SELECT * FROM connection WHERE email != '".$my_email."'";
												

					if($result_destinataire = mysqli_query($link,$requete_destinataire)){
						if(mysqli_num_rows($result_destinataire)>0){
							while($row_destinataire = mysqli_fetch_array($result_destinataire)){
								if($_GET['submit'] == 'Envoyer le message' AND $row_destinataire['pseudo'] == $_GET['destinataire']){
									echo "<option selected value='".$row_destinataire['pseudo']."'>".$row_destinataire['pseudo']."</option>";
								}
								else{
									echo "<option value='".$row_destinataire['pseudo']."'>".$row_destinataire['pseudo']."</option>";
								}
							}
						}
					}	
				
	echo("</select>");
	echo( "<br>");			
													//zone de texte avec 
	echo("<form method='GET' 
	action=/accueil.php?email='.$my_email.'&mot_de_passe='.$my_pwd.'>			
<h3><legend>Saisir votre message ici</legend></H3>
	<h5>
	<textarea name='contenu_message' rows='10' cols='50'></textarea>
	<br>
	<input type='submit' value='Envoyer' name='envoie_message'>
	</form>");

if($result = mysqli_query($link, $requete_message)){
			if(mysqli_num_rows($result) > 0){
				$id_message=mysqli_num_rows($result)+1;		//détermine l'id du nouvel utilisateur
			};
		};
													//enregister le msg dans la base de données
if(isset($_GET["envoie_message"])){
$insert="INSERT INTO message VALUES ('".$id_message."', '".$_GET["destinataire"]."', NOW() , '".$_GET["contenu_message"]."')";
$result_insert=mysqli_query($link, $insert);
echo("<br>");
echo("le message a bien était enregistré");
}													
													
	
							//partie affiche des messages
echo("<br>");
				


if($result = mysqli_query($link, $requete_message)){				//à gérer l'affichage des résultats
			if(mysqli_num_rows($result) > 0){
					 while($row = mysqli_fetch_assoc($result)){
						if ($_GET["email"]==$row["id_utlisateur"]){
							foreach($row as $key=>$val){		
							echo($val); 
							};
						
						};

					};	
				}
			}
}
?>
</body>

</html>