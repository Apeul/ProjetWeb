<?php

if(!isset($_SESSION))
{   session_start();
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
    $_SESSION['n_connect']=0;
}
if(!isset($_SESSION['prix_panier']) || !($_SESSION['prix_panier']) )
{
  $_SESSION['prix_panier']=0;
}
if(!isset($_SESSION['connect']) || !$_SESSION['connect']){
    $_SESSION['connect']=0;
  }
if($_SESSION['connect']==1) // Si on est connecté
{	
	for($i=0;$i<50;$i++) //Faire attention de ne pas utiliser la variable compteur, mais bien une autre.
	{
		if(isset($_POST['ajout_'.$i])) //Si on a cliqué à partir de la page jeux.php
		{
			if($_SESSION['erreur_'.$i]==1) //S'il n'y en a plus en stock.
			{
				include("jeux.php");
				$_SESSION['erreur_'.$i]=0;
			}
			else
			{
			$_SESSION['prix_panier']=$_SESSION['prix_panier']+$_SESSION['prix_jeux'.$i]; //On ajoute au panier le prix.

			$nomjeu=$_SESSION['nom_jeu'.$i];
			$prix=$_SESSION['prix'.$i];
			$image=$_SESSION['image'.$i];


			$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base); //Permet la connexion à la base de données.
			$con->set_charset("utf8"); //Gère l'affichage des accents.
			if(!$retour) //Message d'erreur s'il y a eu un problème avec la connexion.
				echo "La connexion à la base n'a pas abouti.";
			$requete="UPDATE `jeux` SET acheté=acheté+1 WHERE nom_jeux='$nomjeu'"; //Si un joueur achète, on l'implémente dans la base de données
			$reponse=mysqli_query($con,$requete); //Réponse de la base.

			if (!$reponse) //Message s'il y a eu un problème avec la requête.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			$requete="INSERT INTO `reservation` VALUES('$nomjeu','$prix','$image')";
			$reponse=mysqli_query($con,$requete); //Réponse de la base.

			if (!$reponse) //Message s'il y a eu un problème avec la requête.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			include("jeux.php");
			}
		}
		else if(isset($_POST['ajout_a'.$i])) //Si on a cliqué à partir de la page agetri.php
		{
			if($_SESSION['erreur_'.$i]==1)
			{
				include("agetri.php");
				$_SESSION['erreur_'.$i]=0;
			}
			else
			{
			$_SESSION['prix_panier']=$_SESSION['prix_panier']+$_SESSION['prix_jeux'.$i]; //On ajoute au panier le prix.

			$nomjeu=$_SESSION['nom_jeu'.$i];
			$prix=$_SESSION['prix'.$i];
			$image=$_SESSION['image'.$i];

			$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base); //Permet la connexion à la base de données.
			$con->set_charset("utf8"); //Gère l'affichage des accents.
			if(!$retour) //Message d'erreur s'il y a eu un problème avec la connexion.
				echo "La connexion à la base n'a pas abouti.";
			$nomjeu=$_SESSION['nom_jeu'.$i]; //On a besoin d'un renommage, sinon on se perd avec les guillemets.
			$requete="UPDATE `jeux` SET acheté=acheté+1 WHERE nom_jeux='$nomjeu'"; //Si un joueur achète, on l'implémente dans la base de données
			$reponse=mysqli_query($con,$requete); //Réponse de la base.

			if (!$reponse) //Message s'il y a eu un problème avec la requête.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			$requete="INSERT INTO `reservation` VALUES('$nomjeu','$prix','$image')";
			$reponse=mysqli_query($con,$requete); //Réponse de la base.

			if (!$reponse) //Message s'il y a eu un problème avec la requête.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			include("agetri.php");
			}
		}
		else if(isset($_POST['ajout_g'.$i])) //Si on a cliqué à partir de la page genretri.php
		{
			if($_SESSION['erreur_'.$i]==1)
			{
				include("genretri.php");
				$_SESSION['erreur_'.$i]=0;
			}
			else
			{
			$_SESSION['prix_panier']=$_SESSION['prix_panier']+$_SESSION['prix_jeux'.$i]; //On ajoute au panier le prix.

			$nomjeu=$_SESSION['nom_jeu'.$i];
			$prix=$_SESSION['prix'.$i];
			$image=$_SESSION['image'.$i];

			$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base); //Permet la connexion à la base de données.
			$con->set_charset("utf8"); //Gère l'affichage des accents.
			if(!$retour) //Message d'erreur s'il y a eu un problème avec la connexion.
				echo "La connexion à la base n'a pas abouti.";
			$nomjeu=$_SESSION['nom_jeu'.$i];
			$requete="UPDATE `jeux` SET acheté=acheté+1 WHERE nom_jeux='$nomjeu'"; //Si un joueur achète, on l'implémente dans la base de données
			$reponse=mysqli_query($con,$requete); //Réponse de la base.

			if (!$reponse) //Message s'il y a eu un problème avec la requête.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			$requete="INSERT INTO `reservation` VALUES('$nomjeu','$prix','$image')";
			$reponse=mysqli_query($con,$requete); //Réponse de la base.

			if (!$reponse) //Message s'il y a eu un problème avec la requête.
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			include("genretri.php");
			}
		}
	}
}
else //Si on n'est pas connecté
{
	for($i=0;$i<50;$i++) //Faire attention de ne pas utiliser la variable compteur, mais bien une autre.
	{
		if(isset($_POST['ajout_'.$i])) //Si on a cliqué à partir de la page jeux.php
		{
			$_SESSION['n_connect']=1;
			include("jeux.php");
			$_SESSION['n_connect']=0;
		}
		else if(isset($_POST['ajout_a'.$i])) //Si on a cliqué à partir de la page agetri.php
		{ echo"gshgsnrnsdnf";
			$_SESSION['n_connect']=1;
			include("agetri.php");
			$_SESSION['n_connect']=0;
		}
		else if(isset($_POST['ajout_g'.$i])) //Si on a cliqué à partir de la page genretri.php
		{
			$_SESSION['n_connect']=1;
			include("genretri.php");
			$_SESSION['n_connect']=0;
		}
	}
}

?>