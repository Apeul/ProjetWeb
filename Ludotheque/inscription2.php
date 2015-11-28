<?php
	session_start();
	$_SESSION['mail_erreur']=0;
	$_SESSION['mois_vide']=0;
	$_SESSION['annee_vide']=0;
	$_SESSION['mdp2_vide']=0;
	$_SESSION['mdp_faux']=0;
	if(isset($_POST["Inscription"]))
	{
		if(empty($_POST["Pseudo"]) || empty($_POST["Mail"]) || $_POST["jour_naissance"]=="NULL" || $_POST["mois_naissance"]=="NULL" || $_POST["annee_naissance"]=="NULL" || empty($_POST["Mdp1"]) || empty($_POST["Mdp2"]) || $_POST["Mdp1"]!=$_POST["Mdp2"])
			if(empty($_POST["Pseudo"]))
			{
				$_SESSION['pseudo_vide']=1;
			}
			if(empty($_POST["Mail"]))
			{
				$_SESSION['mail_vide']=1;
			}
			if($_POST["jour_naissance"]=="NULL")
			{
				$_SESSION['jour_vide']=1;
			}
			if($_POST["mois_naissance"]=="NULL")
			{
				$_SESSION['mois_vide']=1;
			}
			if($_POST["annee_naissance"]=="NULL")
			{
				$_SESSION['annee_vide']=1;
			}
			if(empty($_POST["Mdp1"]))
			{
				$_SESSION['mdp1_vide']=1;
			}
			if(empty($_POST["Mdp2"]))
			{
				$_SESSION['mdp2_vide']=1;
			}
			if($_POST["Mdp1"]!=$_POST["Mdp2"])
			{
				$_SESSION['mdp_faux']=1;
			}
			include("inscription.php");
			$_SESSION['pseudo_vide']=0;
			$_SESSION['mail_vide']=0;
			$_SESSION['jour_vide']=0;
			$_SESSION['mois_vide']=0;
			$_SESSION['annee_vide']=0;
			$_SESSION['mdp1_vide']=0;
			$_SESSION['mdp2_vide']=0;
			$_SESSION['mdp_faux']=0;
		}
		else
		{
			$pseudo=$_POST["Pseudo"];
			$mail=$_POST["Mail"];
			$jour_naissance=$_POST["jour_naissance"];
			$mois_naissance=$_POST["mois_naissance"];
			$annee_naissance=$_POST["annee_naissance"];
			$date_naissance=$annee_naissance.'-'.$mois_naissance.'-'.$jour_naissance;
			$date=date('Y-m-d');
			$mdp=$_POST["Mdp1"];
			$mail_choisi=0;
			$pseudo_choisi=0;

			$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base);

			if(!$retour)
				echo "La connexion à la base n'a pas abouti.";

			$requete="SELECT Pseudo FROM `users`";
			$reponse=mysqli_query($con,$requete);

			if (!$reponse)
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}

			while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM))
			{
				if($donnees[0]==$pseudo)
				{
					$pseudo_choisi++;
				}
			}

			if($pseudo_choisi!=0)
			{
				$_SESSION['pseudo_erreur']=1;
				include("inscription.php");
				$_SESSION['pseudo_erreur']=0;			
			}
			else
			{
				$requete="SELECT Email FROM `users`";
				$reponse=mysqli_query($con,$requete);

				if (!$reponse)
				{
	  			  printf("Error: %s\n", mysqli_error($con));
	   			  exit();
				}

				while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM))
				{
					if($donnees[0]==$mail)
					{
						$mail_choisi++;
					}
				}

				if($mail_choisi!=0)
				{
					$_SESSION['mail_erreur']=1;
					include("inscription.php");
					$_SESSION['mail_erreur']=0;			
				}
				else
				{
					$requete="INSERT INTO `users` Values('$pseudo','$mail','$mdp','$date','$date_naissance')";
					$reponse=mysqli_query($con,$requete);

					if (!$reponse)
					{
		  			  printf("Error: %s\n", mysqli_error($con));
		   			  exit();
					}
					echo "<!DOCTYPE html>
							<html>
							  <head>
							    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
							    <meta charset = 'utf-8'>
							    <title> -- Ludothèque -- </title>
							  </head>

							  <body>
							    <div id='bandeau'>
							      <div id= 'logo'>
							        <a href='ludotheque.php'> 
							          <img src='logo.png' alt='Logo' />
							        </a>
							      </div>
							     	<div id='titre'> JEUX </div>
							     	<div id='barre'>
							        <ul class='menu'>
							          <li class='menu-item'><a href='ludotheque.php'>Accueil</a></li>
							          <li class='menu-item'>
							            <a href='ludotheque.php'>Nos Jeux</a>
							            <ul class='menu sous-menu'>
							              <li class='sous-menu-item'><a href='agetri.php'>Trier par age</a></li>
							              <li class='sous-menu-item'><a href='genretri.php'>Trier par genre</a></li>
							            </ul>
							          </li>
							          <li class='menu-item'><a href='contact.php'>Contact</a></li>
							        </ul>
							     	</div>
							    </div>
							    <div id='contenu'>
									Félicitations, vous avez réussi à vous inscrire.
							    </div> 		
									<div id='piedpage'>Ceci est le pied de page</div>
							  </body>
							</html>";
				}			
			}
		}
?>