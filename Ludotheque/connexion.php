<?php
if(!isset($_SESSION))
{   session_start();
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['connect']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
}?>
<?php
	if(isset($_POST["Connexion"]) || isset($_POST["Connexion_c"]) || isset($_POST["Connexion_j"]) || isset($_POST["Connexion_a"]) || isset($_POST["Connexion_g"]))
	{
		if(empty($_POST["Pseudo"]) || empty($_POST["Mdp"]))
		{
			if(empty($_POST["Pseudo"]))
			{
				$_SESSION['pseudo_vide']=1;
			}
			if(empty($_POST["Mdp"]))	
			{
				$_SESSION['mdp_vide']=1;
			}
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
			$_SESSION['mdp_vide']=0;
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
			$retour=mysqli_select_db($con,$base);
			$con->set_charset("utf8");

			if(!$retour)
				echo "La connexion à la base n'a pas abouti.";

			$requete='SELECT Pseudo, Email FROM `users`';
			$reponse=mysqli_query($con,$requete);

			if (!$reponse)
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			$bp=0;
			$bm=0;

			while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM))
			{
				if($donnees[0]==$pseudo || $donnees[1]==$pseudo)
				{
					$bp++;
				}
			}

			if($bp==0)
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
				$requete='SELECT Mdp FROM `Users`';
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
				else
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
	if(isset($_POST["Deconnexion"]) || isset($_POST["Deconnexion_c"]) || isset($_POST["Deconnexion_j"]) || isset($_POST["Deconnexion_a"]) || isset($_POST["Deconnexion_g"]))
	{
		session_destroy();
		unset($_SESSION);
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
	}
?>