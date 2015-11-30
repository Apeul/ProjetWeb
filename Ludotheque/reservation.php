<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="ludotheque.css" media="screen" />
    <meta charset = "utf-8">
    <title> -- Ludothèque -- </title>
  </head>

  <body>
    <div id="bandeau">
      <div id= "logo">
        <a href="ludotheque.php"> 
          <img src="logo.png" alt="Logo" />
        </a>
      </div>
     	<div id="titre"> JEUX </div>
     	<div id="barre">
        <ul class="menu">
          <li class="menu-item"><a href="ludotheque.php">Accueil</a></li>
          <li class="menu-item">
            <a href="ludotheque.php">Nos Jeux</a>
            <ul class="menu sous-menu">
              <li class="sous-menu-item"><a href="agetri.php">Trier par age</a></li>
              <li class="sous-menu-item"><a href="genretri.php">Trier par genre</a></li>
            </ul>
          </li>
          <li class="menu-item"><a href="contact.php">Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id="contenu">
      	Voici vos jeux acheté : <br />
      	<?php
      		$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base);  //Permet de se connecter à la base
			$con->set_charset("utf8"); //Permet d'éviter les problèmes d'accents

			if(!$retour)
				echo "La connexion à la base n'a pas abouti."; //Message d'erreur s'il y a un problème avec la connexion

			$requete='SELECT nom_jeux, prix, image FROM `reservation`'; //Requête
			$reponse=mysqli_query($con,$requete); //La réponse de la requête

			if (!$reponse) //Message d'erreur au cas où.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			$total=0;
			while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM)) // Tant qu'il y a encore des lignes dans la requête.
			{	echo $donnees[2]." ".$donnees[0]." Prix : ".$donnees[1];
				$total=$total+$donnees[1];
				echo "<br />";
			}
			echo "Votre total est de : ".$total."€";
			?>
    </div> 		
  </body>
</html>