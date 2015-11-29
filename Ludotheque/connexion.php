<?php
if(!isset($_SESSION)) //Une session est normalement déjà ouverte, mais s'il y a un problème, on initialise les variables.
{   session_start();
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['connect']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
    $_SESSION['n_connect']=0;
}?>
<?php
	if(isset($_POST["Connexion"]) || isset($_POST["Connexion_c"]) || isset($_POST["Connexion_j"]) || isset($_POST["Connexion_a"]) || isset($_POST["Connexion_g"])) //Si on a cliqué sur un des boutons de connexion.
	{
		if(empty($_POST["Pseudo"]) || empty($_POST["Mdp"])) //S'il y a un des deux champs vide.
		{
			if(empty($_POST["Pseudo"]))
			{
				$_SESSION['pseudo_vide']=1; //Ces variables, permet de savoir où se situe le problème.
			}
			if(empty($_POST["Mdp"]))	
			{
				$_SESSION['mdp_vide']=1;
			}
			if(isset($_POST["Connexion"])) //Il y a plusieurs boutons de connexion en fonction de la page où on est.
			{
				include("ludotheque.php"); //En fonction de la page, on redirige l'utilisateur.
			}
			else if(isset($_POST["Connexion_c"]))
			{
				include("contact.php");
			}
			else if(isset($_POST["Connexion_j"]))
			{
				include("jeux.php");
			}
			else if(isset($_POST["Connexion_a"]))
			{
				include("agetri.php");
			}
			else if(isset($_POST["Connexion_g"]))
			{
				include("genretri.php");
			}
			$_SESSION['mdp_vide']=0; //On réinitialise les variables à 0.
			$_SESSION['pseudo_vide']=0;
			$_SESSION['connect']=0;
		}
		else
		{
			$pseudo=$_POST["Pseudo"];
			$mdp=$_POST["Mdp"];

			$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base); //Permet la connexion à la base de données.
			$con->set_charset("utf8"); //Gère l'affichage des accents.

			if(!$retour) //Message d'erreur s'il y a eu un problème avec la connexion.
				echo "La connexion à la base n'a pas abouti.";

			$requete='SELECT Pseudo, Email FROM `users`'; //Requête.
			$reponse=mysqli_query($con,$requete); //Réponse de la base.

			if (!$reponse) //Message s'il y a eu un problème avec la requête.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			$bp=0; //Permet de savoir si le pseudo est dans la base.
			$bm=0; //Pareil pour le mot de passe.

			while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM)) //On regarde si le pseudo est dans la base.
			{
				if($donnees[0]==$pseudo || $donnees[1]==$pseudo)
				{
					$bp++;
				}
			}

			if($bp==0) //Si le pseudo n'est pas dans la base.
			{
				$_SESSION['pseudo_erreur']=1;
				if(isset($_POST["Connexion"]))
				{
					include("ludotheque.php");
				}
				else if(isset($_POST["Connexion_c"]))
				{
					include("contact.php");
				}
				else if(isset($_POST["Connexion_j"]))
				{
					include("jeux.php");
				}
				else if(isset($_POST["Connexion_a"]))
				{
					include("agetri.php");
				}
				else if(isset($_POST["Connexion_g"]))
				{
					include("genretri.php");
				}
				$_SESSION['pseudo_erreur']=0;
				$_SESSION['connect']=0;
			}
			else
			{
				$requete='SELECT Mdp FROM `Users`'; //On fait la même chose pour le mot de passe.
				$reponse=mysqli_query($con,$requete);
				while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM))
				{
					if($donnees[0]==$mdp)
						$bm++;
				}
				if($bm==0)
				{
					$_SESSION['mdp_erreur']=1;
					if(isset($_POST["Connexion"]))
					{
						include("ludotheque.php");
					}
					else if(isset($_POST["Connexion_c"]))
					{
						include("contact.php");
					}
					else if(isset($_POST["Connexion_j"]))
					{
						include("jeux.php");
					}
					else if(isset($_POST["Connexion_a"]))
					{
						include("agetri.php");
					}
					else if(isset($_POST["Connexion_g"]))
					{
						include("genretri.php");
					}
					$_SESSION['mdp_erreur']=0;
					$_SESSION['connect']=0;
				}
				else //Si tout se passe bien, l'utilisateur est connecté!
				{
					$requete='SELECT Pseudo FROM `users` WHERE Pseudo="'.$pseudo.'"OR Email="'.$pseudo.'"';
					$reponse=mysqli_query($con,$requete);
					if (!$reponse)
					{
		  			  printf("Error: %s\n", mysqli_error($con));
		   			  exit();
					}
					$_SESSION['connect']=1;
					$_SESSION['reponse']=mysqli_fetch_array($reponse,MYSQLI_NUM);
					if(isset($_POST["Connexion"]))
					{
						include("ludotheque.php");
					}
					else if(isset($_POST["Connexion_c"]))
					{
						include("contact.php");
					}
					else if(isset($_POST["Connexion_j"]))
					{
						include("jeux.php");
					}
					else if(isset($_POST["Connexion_a"]))
					{
						include("agetri.php");
					}
					else if(isset($_POST["Connexion_g"]))
					{
						include("genretri.php");
					}
				}
			}
		}
	}
	if(isset($_POST["Deconnexion"]) || isset($_POST["Deconnexion_c"]) || isset($_POST["Deconnexion_j"]) || isset($_POST["Deconnexion_a"]) || isset($_POST["Deconnexion_g"])) // Gère les déconnexions.
	{
		session_destroy(); // On ferme la session.
		unset($_SESSION); //On détruit les variables.
		if(isset($_POST["Deconnexion"]))
		{

			include("ludotheque.php");
		}
		else if(isset($_POST["Deconnexion_c"]))
		{
			include("contact.php");
		}
		else if(isset($_POST["Deconnexion_j"]))
		{
			include("jeux.php");
		}
		else if(isset($_POST["Deconnexion_a"]))
		{
			include("agetri.php");
		}
		else if(isset($_POST["Deconnexion_g"]))
		{
			include("genretri.php");
		}

		$user="Modira"; //On supprime la base de données qu'on a crée pour la réservation.
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base);  //Permet de se connecter à la base
			$con->set_charset("utf8"); //Permet d'éviter les problèmes d'accents

			if(!$retour)
				echo "La connexion à la base n'a pas abouti."; //Message d'erreur s'il y a un problème avec la connexion

			$requete='DELETE FROM `reservation`'; //Requête
			$reponse=mysqli_query($con,$requete); //La réponse de la requête

			if (!$reponse) //Message d'erreur au cas où.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
	}
?>