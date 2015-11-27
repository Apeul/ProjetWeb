<?php
	$pseudo_vide=0;
	$mdp_vide=0;
	$connect=0;
	$pseudo_erreur=0;
	$mdp_erreur=0;
	if(isset($_POST["Connexion"]) || isset($_POST["Connexion_c"]))
	{
		if(empty($_POST["Pseudo"]) || empty($_POST["Mdp"]))
		{
			if(empty($_POST["Pseudo"]))
			{
				$pseudo_vide=1;
			}
			if(empty($_POST["Mdp"]))	
			{
				$mdp_vide=1;
			}
			if(isset($_POST["Connexion"]))
			{
				include("ludotheque.php");
			}
			else if(isset($_POST["Connexion_c"]))
			{
				include("contact.php");
			}
			$mdp_vide=0;
			$pseudo_vide=0;
			$connect=0;
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
				$pseudo_erreur=1;
				if(isset($_POST["Connexion"]))
				{
					include("ludotheque.php");
				}
				else if(isset($_POST["Connexion_c"]))
				{
					include("contact.php");
				}
				$pseudo_erreur=0;
				$connect=0;
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
					$mdp_erreur=1;
					if(isset($_POST["Connexion"]))
					{
						include("ludotheque.php");
					}
					else if(isset($_POST["Connexion_c"]))
					{
						include("contact.php");
					}
					$mdp_erreur=0;
					$connect=0;
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
					$connect=1;
					$reponse=mysqli_fetch_array($reponse,MYSQLI_NUM);
					if(isset($_POST["Connexion"]))
					{
						include("ludotheque.php");
					}
					else if(isset($_POST["Connexion_c"]))
					{
						include("contact.php");
					}
				}
			}
		}
	}
	if(isset($_POST["Deconnexion"]) || isset($_POST["Deconnexion_c"]))
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
	}
?>